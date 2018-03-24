<?php 
include_once('scrape_emails.php');
include('connect.php');

function GetNearbyBusinesses ($categories, $radius, $lat, $lng, $want_emails)
{
$want_emails = filter_var($want_emails, FILTER_VALIDATE_BOOLEAN);
$categories = json_decode($categories);

$coordinates = $lat.",".$lng;
$nearbyPlaces = array();
foreach($categories as $category)
{
    $nearbyPlaces[$category] = array();
    $resp = RadarSearch($coordinates,$category,$radius);
    $radar_resp = json_decode($resp);
    $results = $radar_resp->{'results'};
    foreach($results as $key=>$result){
         $nearbyPlaces[$category][] = array();
         $details = json_decode(PlaceDetails($result->place_id));
         
         if( isset( $details->result->name ) )
            $nearbyPlaces[$category][$key]['Name'] = $details->result->name; 
         else
            $nearbyPlaces[$category][$key]['Name'] = ""; 
        //not getting categories to make CSV creation easier
         if( isset( $details->result->types ) )
            $nearbyPlaces[$category][$key]['Categories'] = $details->result->types; 
         else
            $nearbyPlaces[$category][$key]['Categories'] = ""; 
         if( isset( $details->result->rating ) )
            $nearbyPlaces[$category][$key]['Google Rating'] = $details->result->rating; 
         else
            $nearbyPlaces[$category][$key]['Google Rating'] = "";  
         if( isset( $details->result->price_level ) )
            $nearbyPlaces[$category][$key]['Price Level'] = $details->result->price_level; 
         else
            $nearbyPlaces[$category][$key]['Price Level'] = "";
         if( isset( $details->result->user_ratings_total ) )
            $nearbyPlaces[$category][$key]['User Rating'] = $details->result->user_ratings_total;
         else
            $nearbyPlaces[$category][$key]['User Rating'] = "";
         if( isset( $details->result->formatted_address ) )
            $nearbyPlaces[$category][$key]['Address'] = $details->result->formatted_address;
         else
            $nearbyPlaces[$category][$key]['Address'] = "";
         if( isset( $details->result->formatted_phone_number ) )
            $nearbyPlaces[$category][$key]['Phone Number'] = $details->result->formatted_phone_number;
         else
            $nearbyPlaces[$category][$key]['Phone Number'] = "";
         if( isset( $details->result->utc_offset ) )
            $nearbyPlaces[$category][$key]['UTC Offset'] = $details->result->utc_offset;
         else
            $nearbyPlaces[$category][$key]['UTC Offset'] = "";
        if( isset( $details->result->website ) )
            $nearbyPlaces[$category][$key]['Website'] = $details->result->website;
         else
            $nearbyPlaces[$category][$key]['Website'] = "";
         
         if ($want_emails){
             if( isset( $details->result->website ) ) {
                 $emailData = json_decode(getEmails($details->result->website, false));
                 //$emailData = json_decode(getEmails("http://business.referrizer.com", false)); //for testing only
                 $emails = $emailData->emails;
                 foreach($emails as $emailKey=>$email){
                     $nearbyPlaces[$category][$key]['Emails'][$emailKey] = $emails[$emailKey]->Email;
                 }
             }
             else
                $nearbyPlaces[$category][$key]['Emails'] = "";
         }
        if( isset( $details->result->place_id ) )
            $nearbyPlaces[$category][$key]['Google Place ID'] = $details->result->place_id;
         else
            $nearbyPlaces[$category][$key]['Google Place ID'] = "";
    
}
}

return json_encode($nearbyPlaces, 128);

}

function RadarSearch ($coordinates, $category, $radius) {
    $key = $GLOBALS['google_key'];
    $url = "https://maps.googleapis.com/maps/api/place/radarsearch/json";
    $param= "?location=".$coordinates."&radius=".$radius."&types=".$category."&key=".$key;
    $response = makeCurl($url,$param);
    return $response;
}

function PlaceDetails ($place_id) {
    $key = $GLOBALS['google_key'];
    $url = "https://maps.googleapis.com/maps/api/place/details/json";
    $param= "?placeid=".$place_id."&key=".$key;
    $response = makeCurl($url,$param);
    return $response;
}


function makeCurl ($url,$param)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url.$param);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}





?>