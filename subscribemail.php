
<?php
 error_reporting(0);
require 'PHPMailer/PHPMailerAutoload.php';
require 'file.php';


// use PHPMailer\PHPMailerAutoload;

if(isset($_POST['submit'])){
   
    $email = $_POST['email'];
    



$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAILID;                 // SMTP username
$mail->Password = PASSWORD;                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

//$mail->setFrom($to,$name);

//$mail->addAddress('Alihaiderautoengineeringco@gmail.com','Auto');     // Add a recipient
$mail->addAddress('burjalnoor2021@gmail.com','Auto');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAILID, 'Auto');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $name;
$mail->Body ='<div><br>Email:  &nbsp;'.$email.'<br>If you want to recover your password click on this link:  &nbsp;http://localhost/htdocs/ali-haider-new/recoverEmail.php <br> </h3></div>';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    // echo ' Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("location:login.php");
}
}
?>