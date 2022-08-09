<?php
session_start();

if(isset($_SESSION['email'])){
    header('location:index.php');
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Ali Haider Auto Engineering</title>
  </head>
  <body style="background:black;">


                <!-- Demo content-->
                <div class="container">
                    <div class="row ">
                        <div class="col-md-6 mx-auto">

                       
                        <div class="text-center" >
                         <figure>
                             <img class="logo mt-2" src="images/logo1.jpg" style="width:350px; height:350px;">
                         </figure>
                            <form method="POST" >
                            <div class="mb-3">
                                
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <div class="mb-3">
                                
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                            </div>

                            <button type="submit" class="btn btn-primary text-white" name="submit">Login</button>
                            <a href="forget.php">Forget Password</a>
                            
                                
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

    include 'connection.php';
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        $select="select * from login where email='$email'";
        $run=mysqli_query($conn,$select);
        $row=mysqli_num_rows($run);
       
        if($row >0){
            $res=mysqli_fetch_array($run);
            $db_pass=$res['password'];
                if($password === $db_pass){
                    // echo "<script>alert('good'); </script>";
                    $_SESSION['email']=$_POST['email'];
                    header('location:index.php');
                }else{
                     echo "<script>alert('Wrong Password'); </script>";
                }
           
        }else{
            echo "<script>alert('Email Not exist !!!'); </script>";
        }
        
    }
    

?>