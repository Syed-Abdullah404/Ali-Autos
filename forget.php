 <?php
// session_start();
// if(isset($_SESSION['email'])){
//     "</script> window.replace('index.php'); </script>";
//    }
?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Kainat.css">

    <title>Ali Haider Auto Engineering</title>
  </head>
  <body>


                <!-- Demo content-->
                <div class="container">
                    <div class="row mx-auto">
                        <div class="col-md-8">

                       
                        <div class="text-center" >
                         <figure>
                             <img class="logo" src="images/logo.png">
                         </figure>
                            <form action="#" method="POST">
                            <div class="mb-3">
                                
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>

                            <button type="submit" class="btn btn-primary text-white" name="submit">Send Email</button>
                          
                            
                                
                            </form>
                        </div>
                        </div>
                    </div>
                </div><!-- End -->

            




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php

    // include 'connection.php';
    // if(isset($_POST['submit'])){
    //     $email=$_POST['email'];
    //     $password=$_POST['password'];

    //     $select="select * from login where email='$email'";
    //     $run=mysqli_query($conn,$select);
    //     $row=mysqli_num_rows($run);
       
    //     if($row ==1){
    //         $res=mysqli_fetch_array($run);
    //         $db_pass=$res['password'];
    //             if($password === $db_pass){
    //                 // echo "<script>alert('good'); </script>";
    //                 $_SESSION['email']=$_POST['email'];
    //                 header('location:dashboard.php');
    //             }else{
    //                  echo "<script>alert('Wrong Password'); </script>";
    //             }
           
    //     }else{
    //         echo "<script>alert('Email Not exist !!!'); </script>";
    //     }
        
    // }
    

?>

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

$mail->setFrom($to,$name);

$mail->addAddress('abdullahmateen611@gmail.com','Auto');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAILID, 'Auto');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $name;
$mail->Body ='<div><h3>Email:  &nbsp;'.$email.'</h3></div>'.'<div><h3>www.google.com'.'</h3></div>';
// '<div><h3>Name:&nbsp;'.ucwords($name).'<br>Phone:  &nbsp;'.$phone.'<br>Email:  &nbsp;'.$email.'<br>Problem:&nbsp;'.$problem.'<br>Address: &nbsp;'.$address.'</h3></div>';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    // echo ' Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("location:services.html");
}
}
?>