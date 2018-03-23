<?php

require_once 'helpers/meekrodb.2.3.class.php';

if (!(getenv("DATABASE_URL")))
{
    DB::$host = 'localhost';
    DB::$user = 'root';
    DB::$password = 'confidential';
    DB::$dbName = 'LocalLeadGen';  
} else {
    $url = parse_url(getenv("DATABASE_URL"));
    DB::$host = $url["host"];
    DB::$user = $url["user"];
    DB::$password = $url["pass"];
    DB::$dbName = substr($url["path"], 1);
}

if (!(getenv("RABBITMQ_BIGWIG_URL")))
{
    $rabbithost = 'localhost';
    $rabbitusername = 'guest';
    $rabbitpassword = 'guest';
    $rabbitport = 5672;  
} else {
    $rabbitmq = parse_url(getenv('RABBITMQ_BIGWIG_URL'));
    $rabbithost = $rabbitmq['host'];
    $rabbitport = isset($rabbitmq['port']) ? $rabbitmq['port'] : 5672;
    $rabbitusername = $rabbitmq['user'];
    $rabbitpassword = $rabbitmq['pass'];
    $rabbitvhost = substr($rabbitmq['path'], 1) ?: '/';
}




?>