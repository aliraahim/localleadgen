<?php
require 'vendor/autoload.php';
include 'connect.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection($rabbithost, $rabbitport, $rabbitusername, $rabbitpassword, $rabbitvhost);
$channel = $connection->channel();

$channel->queue_declare('jobs', false, false, false, false);

date_default_timezone_set("Asia/Karachi");
$date = date("D M d, Y G:i");

$msg = new AMQPMessage($date);
$channel->basic_publish($msg, '', 'jobs');

echo "Notified worker on ".$date."\n";

$channel->close();
$connection->close();