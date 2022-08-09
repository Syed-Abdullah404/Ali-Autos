<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
    include 'connection.php';
    if(isset($_POST['delete'])){
        $del_id=$_SESSION['employee_id'];
        echo "<script>console.log($del_id); </script>";
   
           $sql=mysqli_query($conn,"select * from employee where id='$del_id'");
           // echo "<script>console.log($sql) </script>";
           $row=mysqli_fetch_assoc($sql);
           $term=$row['paying_term'];
           $name=$row['emp_name'];
           if($term == 'monthly'){
               mysqli_query($conn,"delete from salary where emp_id='$del_id'");
               mysqli_query($conn,"delete from bonus where emp_id='$del_id'");
               mysqli_query($conn,"delete from deduction where emp_id='$del_id'");

           }else{
               mysqli_query($conn,"delete from contract where name='$name'");
           }
   
           mysqli_query($conn,"delete from employeework where emp_id='$del_id'");
           mysqli_query($conn,"delete from employee where id='$del_id'");
    }
    
       
      
      
   
    
?>