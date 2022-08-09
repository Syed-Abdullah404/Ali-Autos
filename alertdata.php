<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
include 'connection.php';
$val= $_GET['selectvalue'];

if($val=='customer'){
    $select_owner="select * from customers";
    $run_select_owner=mysqli_query($conn,$select_owner);
    while($row=mysqli_fetch_assoc($run_select_owner)){
        echo " <option>".$row['name']."</option>";
    }

}else if($val=='supplier'){
    $select_owner="select * from supplier";
    $run_select_owner=mysqli_query($conn,$select_owner);
    while($row=mysqli_fetch_assoc($run_select_owner)){
        echo " <option>".$row['name']."</option>";
    }
}

?>