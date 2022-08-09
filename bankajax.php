<?php

   $username="root";
   $password="";
   $server="localhost";
   $database="kainat";
   
   $conn=mysqli_connect($server,$username,$password,$database);
   $app_url="http://localhost/htdocs/ali-haider-new";

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
     $paid=$_POST['paid_bill'];
     $rem=$_POST['rempay'];
     $payment_method=$_POST['payment_method'];
     $bank=$_POST['bank'];
    $conn->query("insert into sale_product_details set customer='$bill_detail',bill_id='$suppler_detail',status='$status_detail',sub_total='$sub_total',paid='$paid',remaining='$rem',payment_method='$payment_method',bank='$bank'");
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
    
           
   
    $sql=$conn->query("insert into sale_items set customer ='$sup_name',bill_id='$bill_name',status='$status_name', item_name = '$product_name', quantity = '$quantity_name', price = '$price_name',  total = '$total_name',date=NOW()");

    

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