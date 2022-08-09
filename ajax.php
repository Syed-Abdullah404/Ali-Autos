<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
include 'connection.php';

if(isset($_REQUEST['price_form'])){

    $sup = json_encode($_POST['sup_name']);
    $product =json_encode($_POST['product_name']);
    $quantity =  json_encode($_POST['quantity_name']);
    $price = json_encode($_POST['price_name']);
    $total = json_encode($_POST['tprice_name']);
    $bill = json_encode($_POST['bill_id']);
    $status = json_encode($_POST['status']);

    $bill_detail=$_POST['name'];
     $suppler_detail=$_POST['uniqid'];
     $status_detail=$_POST['status_bill'];
     $sub_total=$_POST['sub'];
     $discount=$_POST['discount'];
     $finaltotal=$_POST['final'];
     $wht=$_POST['wht'];
     $paid=$_POST['paid_bill'];
     $rem=$_POST['rempay'];
    $conn->query("insert into products_detail set supplier='$bill_detail',bill_id='$suppler_detail',status='$status_detail',sub_total='$sub_total',discount_total='$discount',grand_total='$finaltotal',final_total='$wht',paid='$paid',remaining='$rem'");
    if ($sup == ""|| $product == ""||$quantity == ""||$price =="" ) {
        echo json_encode([
            "status" => "all_required"
        ]);
        exit();
    }

   else{
    $sup = json_decode($sup);
    $product =json_decode($product);
    $quantity =  json_decode($quantity);
    $price = json_decode($price);
    $total = json_decode($total);
    $bill = json_decode($bill);
    $status = json_decode($status);

    $end = count($product);
    for($i=0; $i<$end; $i++){

        $product_name = $product[$i]->value;

        $sup_name =$sup[$i]->value;
        $quantity_name = $quantity[$i]->value;
        $price_name = $price[$i]->value;
        $total_name = $total[$i]->value;
        $bill_name = $bill[$i]->value;
        $status_name = $status[$i]->value;
    
           
   
    $sql=$conn->query("insert into items set supplier ='$sup_name',bill_id='$bill_name',status='$status_name', item_name = '$product_name', quantity = '$quantity_name', price = '$price_name',  total = '$total_name',date=NOW()");
    //for stock
    $total=0;
    $select=$conn->query("select * from final_stock where name='$product_name'");
        $row=mysqli_fetch_assoc($select);
        $quantity=$row['quantity'];
        $total=$quantity + $quantity_name;
    $sqli=$conn->query("update final_stock set quantity ='$total' where name='$product_name'");

  $ii = ($i+1);
    if($ii == $end){
    echo json_encode([
          "status" => "success"
      ]);
      }

}
        
   }
}



?>