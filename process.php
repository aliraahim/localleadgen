<?php
header('Content-type: application/json');
require_once 'helpers/meekrodb.2.3.class.php';
include 'connect.php';


if ($_POST['units'] == 'kilometers') 
    $radius = $_POST['radius'] * 1000;
else 
    $radius = $_POST['radius'] * 1000 / 0.621371;

$categories = $_POST['categories'];

$coordinates = $_POST['coordinates'];
$coordinates = json_decode($coordinates, true);

$lat = $coordinates['lat'];
$lng = $coordinates['lng'];

//$categories = 'hello';

DB::insert('requests', array(
    'user_id' => 1
    , 'radius' => $radius
    , 'lat' => $lat
    , 'lng' => $lng
    , 'categories' => $categories
));

$responseArray = array();
    
$responseArray['status'] = true;
echo json_encode($responseArray);


?>