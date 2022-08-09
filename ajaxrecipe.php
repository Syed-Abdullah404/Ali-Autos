<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
include 'connection.php';

if(isset($_REQUEST['price_form'])){

  
    $product =json_encode($_POST['product_name']);
    $quantity =  json_encode($_POST['quantity_name']);
    $bill = json_encode($_POST['bill_id']);

     $bill_detail=$_POST['name'];
     $suppler_detail=$_POST['uniqid'];
     $status_detail=$_POST['status_bill'];
  
   
    if ( $product == ""||$quantity == "" ) {
        echo json_encode([
            "status" => "all_required"
        ]);
        exit();
    }

   else{
    $product =json_decode($product);
    $quantity =  json_decode($quantity); 
    $bill = json_decode($bill);
   

    $end = count($product);
    for($i=0; $i<$end; $i++){

        $product_name = $product[$i]->value;
        $quantity_name = $quantity[$i]->value;     
        $bill_name = $bill[$i]->value;
       
    
           
   
        $sql=$conn->query("insert into recipe set recipe_name='$bill_name',item_name = '$product_name', quantity = '$quantity_name'");
        $sql_select=$conn->query("select * from final_stock where name = '$product_name'");
      	$fetch_data=mysqli_fetch_assoc($sql_select);
        $product_quantity=$fetch_data['quantity'];
        $f_quantity=$product_quantity - $quantity_name;
       $sqli_update=$conn->query("update final_stock set quantity='$f_quantity' where name='$product_name'");
        
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




