<?php
    include 'connection.php';
    if(isset($_POST['delete']))
    {
        $del_id=$_POST['deleteid'];
        $sqli="delete from sale_product_details where bill_id='$del_id'";
        mysqli_query($conn,$sqli);
        $sql="delete from sale_items where bill_id='$del_id'";
        mysqli_query($conn,$sql);
        ?>
        <script>
            window.location="sale.php";
        </script>
        <?php
    }
    
?>