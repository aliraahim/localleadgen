<?php
require 'vendor/autoload.php';
require_once 'helpers/meekrodb.2.3.class.php';
include 'connect.php';
include 'radarsearch.php';
include 'makecsv.php';
include 'sendemail.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;


$connection = new AMQPStreamConnection($rabbithost, $rabbitport, $rabbitusername, $rabbitpassword, $rabbitvhost);
$channel = $connection->channel();

$channel->queue_declare('jobs', false, false, false, false);

echo ' [*] Waiting for messages. To exit press CTRL+C', "\n";


$callback = function($msg) {
    try {
        echo "Starting work...\n";
        $request = @DB::queryFirstRow("SELECT * FROM requests WHERE status=%s", 'pending');
        $user = @DB::queryFirstRow("SELECT * FROM users WHERE request_id=%s", $request['id']);

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
            MakeCSV ($data, $path);

            if ($GLOBALS['send_email']){
                SendEmail ($user);
            }
            DB::update('requests', array(
               'status' => 'completed'
               ), "id=%d", $request['id']); 

            //echo "All done! Please check '" . $path . "' for the output file\n";
            if ($GLOBALS['send_email'])
                echo "All done! Email sent to " . $user['email'] . " for request ID: " . $request['id'] . ".\n";
            else
                echo "All done! No email sent" . " for request ID: " . $request['id'] . ".\n";
        } else {   
          echo "Nothing to work on\n";
        }
    }
    catch (Exception $e) {
        echo 'Worker had to exit because: ' .$e->getMessage();
    }
};

$channel->basic_consume('jobs', '', false, true, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}


?>