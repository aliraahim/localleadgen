<?php
header('Content-type: application/json');
require_once 'helpers/meekrodb.2.3.class.php';
include 'connect.php';
include 'radarsearch.php';


if ($_POST['units'] == 'kilometers') 
    $radius = $_POST['radius'] * 1000;
else 
    $radius = $_POST['radius'] * 1000 / 0.621371;

$categories = $_POST['categories'];

$coordinates = $_POST['coordinates'];
$coordinates = json_decode($coordinates, true);

$lat = $coordinates['lat'];
$lng = $coordinates['lng'];

$user = $_POST['user'];
$user = json_decode($user, true);

$name = $user['name'];

$email = $user['email'];
$company = $user['company'];

$wantEmails = filter_var($_POST['wantEmails'], FILTER_VALIDATE_BOOLEAN);

$time = time();

//$radius = 2;
//$lat = 1;
//$lng = 1;
//$categories = "a";
//$wantEmails = "1";
//$name = "Ali";
//$time = "1520537700";
//$email = "some@email.com";
//$company = "ABS";



DB::insert('requests', array(
    'radius' => $radius
    , 'lat' => $lat
    , 'lng' => $lng
    , 'categories' => $categories
    , 'want_emails' => $wantEmails
    , 'requested' => $time
    , 'status' => 'pending'
));

$id = DB::insertId();

DB::insert('users', array(
    'request_id' => $id
    , 'name' => $name
    , 'email' => $email
    , 'company' => $company
));

$responseArray = array();
    
$responseArray['status'] = true;
//if (!$wantEmails){
//    $responseArray['results'] = GetNearbyBusinesses($categories, $radius, $lat, $lng, $want_emails);
//}

echo json_encode($responseArray);

?>