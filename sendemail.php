
<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
// If you are not using Composer
// require("path/to/sendgrid-php/sendgrid-php.php");

function SendEmail ($user){
    $apiKey = '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';
    $from = new SendGrid\Email("HyperLocal Lead Gen", "delivery@hyperlocalleadgen.com");
    $subject = "Your leads are here!";
    $to = new SendGrid\Email($user['name'], $user['email']);
    $content = new SendGrid\Content("text/html", "Your results are attached!");
    
    $name = $user['request_id'].'.csv';
    $file = 'output/'.$user['request_id'].'.csv';
    $file_encoded = base64_encode(file_get_contents($file));
    $attachment = new SendGrid\Attachment();
    $attachment->setContent($file_encoded);
    $attachment->setType("application/csv");
    $attachment->setDisposition("attachment");
    $attachment->setFilename($name);
    
    
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $mail->addAttachment($attachment);
    
    
    
    //$apiKey = getenv('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);
    $response = $sg->client->mail()->send()->post($mail);
//    echo $response->statusCode();
//    print_r($response->headers());
//    echo $response->body();
    
}


