<?php

include 'connection.php';

$sql=mysqli_query($conn,"select * from product");
while($row=mysqli_fetch_assoc($sql)){
    $product=$row['name'];

    $query=mysqli_query($conn,"select * from items where item_name='$product'");
    if($query){
        $total=0;
        while($rows=mysqli_fetch_assoc($query)){
            $quantity=$rows['quantity'];
            $total=$total + $quantity;
        }
        $insert=mysqli_query($conn,"update final_stock set quantity='$total' where name='p7'");
    }
}

?>