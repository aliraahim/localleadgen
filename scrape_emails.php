<?php

include_once('helpers/simple_html_dom.php');

//getEmails();

function getEmails($url, $searchAll = true, $hygiene = true){

$hygieneWords = file('hygiene.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //retrieves list of hygiene words

//check if searchAll parameter is set, otherwise default value will be used
if (isset($_GET['searchAll']))
{
    if ($_GET['searchAll'] === '1' || $_GET['searchAll'] === '0')
    {
        $searchAll = (bool) $_GET['searchAll'];
    }
}
//check if hygiene parameter is set, otherwise default value will be used
if (isset($_GET['hygiene']))
{
    if ($_GET['hygiene'] === '1' || $_GET['hygiene'] === '0')
    {
        $hygiene = (bool) $_GET['hygiene'];
    }
}

if (isset($_GET['url'])) {
    $url = $_GET['url'];
}else{
    //$url = '';
}

if (!preg_match("/^(http|ftp):/", $url)) {  
   $completeUrl = 'http://'.$url;  //add http:// to URL if it wasn't already present
} else {
    $completeUrl = $url;
    $url = parse_url($url); //trim http:// from URL
    $url = $url['host']; //get domain from URL (for URLs with subdomains)
}

$links[] = $completeUrl; //start with original link only
    
    

if ($searchAll){ //if all the links on the page need to be checked for emails
    echo 'Deep email scraping...';
    $html = @file_get_html($completeUrl);
    if (!is_bool($html)) {
        foreach ($html->find('a') as $link) {
            $checkLink = $link->href;
            if (!stripos($checkLink, 'facebook')){
                if (stripos($checkLink, $url)){ //confirm that the link is on the same domain as the original URL
                    $temp = explode('#',$checkLink); //remove deep linking parts from the link
                    $checkLink = rtrim($temp[0], '/'); //remove / at the end
                    $links[] = $checkLink; //add link to array
            }
            }

        }
    }
}

$links = array_unique($links); //remove duplicate links
var_dump($links);
$emailList = []; //will contain all emails that are found to check for duplicates during parsing
$emails = array();


$emailCount = 0;
foreach ($links as $link){  
    $html = @file_get_html($link);

    $pattern = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';

    // preg_match_all returns an associative array
    preg_match_all($pattern, $html, $matches);

    foreach ($matches[0] as $email){
        $email = strtolower($email); //turn lowercase
        $sameDomain = false;
        if (!in_array($email, $emailList)){
            $found = false;
            $explodedEmail = explode('@',$email);
            $domain = $explodedEmail[1]; //get email domain
            if ((checkdnsrr($domain, 'MX')) && (passesHygiene($email, $hygieneWords, $hygiene))){ //checks for Valid MX records and passes through hygiene list
                if (stripos($url, $domain) !== false) { //domain is part of the original URL
                    $sameDomain = true;
                }
                $emails[] = array('Email' => $email, 'sameDomain' => $sameDomain);
                $emailList[] = $email;
                $emailCount++;
            }
        }
    }
}

$result = ['total_emails' => $emailCount, 'links_searched' => count($links), 'emails' => $emails];
    
//exit(json_encode($result));
return json_encode($result);

}

function passesHygiene($email, $hygieneWords, $hygiene)
{
    if ($hygiene) {    
        foreach($hygieneWords as $hygieneWord) {
            if (stripos($email,$hygieneWord) !== false) return false;
        }
    }
    return true;
}

?>