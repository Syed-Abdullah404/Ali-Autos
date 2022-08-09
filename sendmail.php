<?php

require 'PHPMailer/PHPMailerAutoload.php';
require 'file.php';


// use PHPMailer\PHPMailerAutoload;


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mastm2744@gmail.com';                 // SMTP username
$mail->Password = '@!!!27354453';                           // SMTP password
$mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mastm2744@gmail.com','Notification');
$mail->addAddress('mastm2744@gmail.com');
$mail->addReplyTo('mastm2744@gmail.com');
$mail->isHTML(true);
$mail->Subject="Testing HA yr";
$mail->Body="CHl Nikal kaka";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    // echo ' Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("location:login.php");
}


