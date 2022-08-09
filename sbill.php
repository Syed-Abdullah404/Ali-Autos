<?php 
session_start();
include 'connection.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allison&display=swap" rel="stylesheet">
    <title>Bill</title>
    <style>
        img{
            width:400px;
            height:400px;
            margin-top:-20px;
        }
        .st{
            font-family: 'Allison', cursive;
            letter-spacing:1px;
        }
      
    </style>
</head>
<body>
    <div class="container">
    <a href="sale.php" class="btn btn-sm btn-primary d-print-none m-3">Back</a>
    <div class="row">
        <?php include 'billheader.php';?>
    </div>
    </div>
    <div class="container" style="margin-top:-100px;">
        <div class="row mt-5">
            <div class="col-md-10 mt-5">
            <?php
                   
                   $bill_id=$_GET['sid'];
                   
                   $sqli=mysqli_query($conn,"select * from sale_items where bill_id='$bill_id'");
                   $sqli_row=mysqli_fetch_assoc($sqli);
                   $datei=$sqli_row['date'];
                   $query=mysqli_query($conn,"SELECT * FROM sale_product_details WHERE bill_id='$bill_id'");
                   $total=0;
                   $row=mysqli_fetch_assoc($query);
                       $amount=$row["sub_total"];
                       $customer=$row["customer"];
                       $status=$row["status"];
                       $remaining=$row["remaining"];
                       $paid=$row["paid"];
                  
                   ?>
                <h5>Bill No:&nbsp; <?php echo $bill_id?></h5>
                <h5>Customer Name: &nbsp;<?php echo $customer?></h5>
                <h5>Date: &nbsp;<?php echo $datei?></h5>
                <br>
            <table class="table table-bordered">
                    <thead>
                    <tr>                        
                        
                        <th scope="col">Products</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price Per Product</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total</th>
                        
                        
                    </tr>
                    </thead>
                <tbody>
                   <?php
                    $sql=mysqli_query($conn,"select * from sale_items where bill_id='$bill_id'");
                    $total=0;
                    while($rsql=mysqli_fetch_assoc($sql)){
                        $product=$rsql['item_name'];
                        $quantity=$rsql['quantity'];
                        $price=$rsql['price'];
                        $date=$rsql['date'];
                        $total=$quantity*$price;
                   ?>
                    <tr>
                        <td><?php echo $product; ?></td>
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php echo $total; ?></td>
                      
                    
                        
                      
                        
                    </tr>
                <?php
                }
                ?>                    

        <tr></tr>
              
                    
                    
                </tbody>
                

            </table>
            <div class="float-end">
            <h5>Total: <?php echo $amount; ?></h5>
            <h5>Paid: <?php echo $paid; ?></h5>
            <h5>Remaining: <?php echo $remaining; ?></h5>
            </div>
            
            </div>
        </div>
    </div>
       
    
</body>
</html>
<script>
    window.print();
</script>