<?php

require_once 'helpers/meekrodb.2.3.class.php';

$prod = true;

if (!$prod)
{
    DB::$host = 'localhost';
    DB::$user = 'marspace';
    DB::$password = '';
    DB::$dbName = 'LocalLeadGen';  
} else {
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    DB::$host = $url["host"];
    DB::$user = $url["user"];
    DB::$password = $url["pass"];
    DB::$dbName = substr($url["path"], 1);
}


?>