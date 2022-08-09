<?php
    include 'connection.php';

        //echo "hello";

    $id=$_GET['idd'];

    // $sql="DELETE FROM `employee` WHERE id='$id'";
    // $check=mysqli_query($conn,$sql);

    $sql=mysqli_query($conn,"select * from employee where id='$id'");
    $row=mysqli_fetch_assoc($sql);
    $name=$row['emp_name'];
    $type=$row['paying_term'];

    // $del_contract="delete from contract where name='$name'";
    // mysqli_query($conn,$del_contract);

    // $del_work="delete from employeework where emp_id='$id'";
    // mysqli_query($conn,$del_work);

    // $del_emp="delete from employee where id='$id'";
    // mysqli_query($conn,$del_emp);

    // if($check){
    //     echo "<script>alert('del') </script>";
    // }else{
    //     echo "<script>alert('not del') </script>";
    //  }

    // echo $type ;
    // echo $name ;
     if($type == 'monthly'){
        mysqli_query($conn,"delete from salary where emp_id='$id'");
        mysqli_query($conn,"delete from bonus where emp_id='$id'");
        mysqli_query($conn,"delete from deduction where emp_id='$id'");
         mysqli_query($conn,"delete from employeework where emp_id='$id'");
         mysqli_query($conn,"delete from employee where id='$id'");
    }else{
        mysqli_query($conn,"delete from contract where name='$name'");
        mysqli_query($conn,"delete from employeework where emp_id='$id'");
        mysqli_query($conn,"delete from employee where id='$id'");
    }    
    ?>
            <script>
              window.location = "<?php echo $app_url.'/employee.php' ?>";
          </script>
        <?php

    

?>