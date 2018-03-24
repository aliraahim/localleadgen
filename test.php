<?php

if (!(getenv("EMAIL_SENDING"))){
    $send_email = false;
    
} else {
    if (getenv("EMAIL_SENDING")=='0')
        $send_email = false;
    else
        $send_email = true;
}

var_dump($send_email);