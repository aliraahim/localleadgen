<?php
require 'vendor/autoload.php';
include 'connect.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection($rabbithost, $rabbitport, $rabbitusername, $rabbitpassword, $rabbitvhost);
$channel = $connection->channel();

$channel->queue_declare('jobs', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'jobs');

echo " [x] Notified worker'\n";

$channel->close();
$connection->close();