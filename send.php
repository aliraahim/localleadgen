<?php
require 'vendor/autoload.php';
include 'connect.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

echo $rabbithost ."\n";
echo $rabbitport ."\n";
echo $rabbitusername ."\n";
echo $rabbitpassword ."\n";
$connection = new AMQPStreamConnection($rabbithost, $rabbitport, $rabbitusername, $rabbitpassword);
$channel = $connection->channel();

$channel->queue_declare('jobs', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'jobs');

echo " [x] Sent 'Hello World!'\n";

$channel->close();
$connection->close();