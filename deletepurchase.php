<?php
    include 'connection.php';
    if(isset($_POST['delete']))
    {
        $del_id=$_POST['deleteid'];
        $select=mysqli_query($conn,"select * from items where bill_id='$del_id'");
        $row=mysqli_fetch_assoc($select);
        $product_name=$row['item_name'];
        $quantity=$row['quantity'];
        $stock_select=mysqli_query($conn,"select * from final_stock where name='$product_name'");
        $rows=mysqli_fetch_assoc($stock_select);
        $quantity_stock=$rows['quantity'];
        $final_quantity=$quantity_stock - $quantity;
        $sqls="update final_stock set quantity='$final_quantity' where name='$product_name'";
        mysqli_query($conn,$sqls);
        $sqli="delete from products_detail where bill_id='$del_id'";
        mysqli_query($conn,$sqli);
        $sql="delete from items where bill_id='$del_id'";
        mysqli_query($conn,$sql);
        ?>
        <script>
            window.location="purchase.php";
        </script>
        <?php
    }
    
?>