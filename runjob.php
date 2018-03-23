<?php
require 'vendor/autoload.php';
require_once 'helpers/meekrodb.2.3.class.php';
include 'connect.php';
include 'radarsearch.php';
include 'makecsv.php';
include 'sendemail.php';

//Load Composer's autoloader

$request = DB::queryFirstRow("SELECT * FROM requests WHERE status=%s", 'pending');
$user = DB::queryFirstRow("SELECT * FROM users WHERE request_id=%s", $request['id']);

if ($request != NULL){
    
    $path = "output/" . $request['id'] . ".csv";

 DB::update('requests', array(
   'status' => 'started'
   ), "id=%d", $request['id']);

$categories = '["gym"]';
$radius = "1500";
$lat = "25.07406229";
$lng = "55.19377312";
$want_emails = "0";

$categories = $request['categories'];
$radius = $request['radius'];
$lat = $request['lat'];
$lng = $request['lng'];
$want_emails = $request['want_emails'];
//$want_emails = 0; //test mode

$data = GetNearbyBusinesses($categories, $radius, $lat, $lng, $want_emails);
echo $data;
MakeCSV ($data, $path);
//SendEmail ($user);
    

 DB::update('requests', array(
   'status' => 'completed'
   ), "id=%d", $request['id']); 

    echo 'All done! Please check "' . $path . '" for the output file';
  
} else {
  echo 'Nothing to work on';
}


?>