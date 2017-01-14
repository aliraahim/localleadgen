<?php

$target_url = 'http://127.0.0.1/Test/searchNearby.php';
        //This needs to be the full path to the file you want to send.
        /* curl will accept an array here too.
         * Many examples I found showed a url-encoded string instead.
         * Take note that the 'key' in the array will be the key that shows up in the
         * $_FILES array of the accept script. and the at sign '@' is required before the
         * file name.
         */
$post = array('latitude' => '31.47639329', 'longitude' => '74.42633271', 'categories'=> array('atm', 'airport'));
//$post = JSON.stringify($post);
 
//        $ch = curl_init();
//	curl_setopt($ch, CURLOPT_URL,$target_url);
//	curl_setopt($ch, CURLOPT_POST,1);
//	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//	$result=curl_exec ($ch);
//	curl_close ($ch);
//	echo $result;
              
              echo $post;










//require_once 'helpers/meekrodb.2.3.class.php';
//
//
//DB::$user = 'root';
//DB::$password = 'confidential';
//DB::$dbName = 'LocalLeadGen';
//
//DB::insert('requests', array(
//    'radius' => '123'
//    , 'lat' => '75'
//    , 'lng' => '75'
//    , 'categories' => "something_new"
//));

?>