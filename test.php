<?php

//include('scrape_emails.php');

//GetEmails("business.referrizer.com", true, true);

$url = "mysql://u83tjpeh66scfmyb:twtz13gf0f92f1xc@gp96xszpzlqupw4k.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/lffnb70px4i8yl68";
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['user'];
$password = $dbparts['pass'];
$database = ltrim($dbparts['path'],'/');

echo $hostname;
echo "\n";
echo $username;
echo "\n";
echo $password;
echo "\n";
echo $database;