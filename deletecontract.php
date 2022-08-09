<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
    include 'connection.php';
    if(isset($_POST['delete_btn_set']))
    {
        $del_id=$_POST['deleteid'];
        $sql="delete from contract where id='$del_id'";
        mysqli_query($conn,$sql);
    }
?>