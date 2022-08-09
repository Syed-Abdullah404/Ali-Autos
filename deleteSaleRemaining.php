<?php
    include 'connection.php';
    if(isset($_POST['delete_btn_set']))
    {
        $del_id=$_POST['deleteid'];
        $sql="delete from customer_remaining_pay where id='$del_id'";
        mysqli_query($conn,$sql);
    }
?>