<?php
$id=$_GET['idc'];
$query=mysqli_query($conn,"select * from customers where id='$id'");
$row=mysqli_fetch_assoc($query);
$profile=$row['picture'];
$name=$row['name'];
$business_name=$row['business_name'];
$mobile=$row['mobile'];
$cnic=$row['cnic'];
$address=$row['address'];

$sale=mysqli_query($conn,"select * from sale_product_details where customer='$name'");
$saling=0.0; $remaining=0.0; $paid=0.0;
while($rows=mysqli_fetch_assoc($sale)){
    $total= is_numeric($rows['final_total']) ? $rows['final_total'] : 0;
    $saling=$saling+$total;
    $total_remaining= is_numeric($rows['remaining']) ? $rows['remaining'] : 0;
    $remaining=$remaining+$total_remaining;
    $total_paid=is_numeric($rows['paid']) ? $rows['paid'] : 0;
    $paid=$paid+$total_paid;
   
}


?>
<div class="container">
<table>
  <tr>
    <td><a href="cledgerbill.php?id=<?php echo $id; ?>" class="btn btn-sm btn-success mt-3">Print </a></td>
  </tr>
  </table>
        <div class="row mt-4">
            <div class="col-md-6">
                <p><b>Name:</b><?php echo $name; ?></p>
                <p><b>Business Name:</b> <?php echo $business_name; ?> </p>
                <p><b>NIC No:</b> <?php echo $cnic; ?> </p>
                <p><b>Contact Number:</b> <?php echo $mobile; ?> </p>
                <p><b>Current Address:</b> <?php echo $address; ?> </p>
            </div>
            <div class="col-md-6">
                <h3 class="text-center mb-3 fw-bold">Account Summary</h3>
                <table class="w-100">
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex justify-content-evenly my-1">
                                    <span><b>Total Saling:</b></span>
                                    <span><?php echo $saling; ?></span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex justify-content-evenly my-1">
                                    <span><b>Total Payment:</b></span>
                                    <span><?php echo $paid;  ?></span>
                                 
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                
                                <div class="d-flex justify-content-evenly my-1">
                                    <span><b>Due:</b></span>
                                  <span><?php echo $remaining;
                                    ?></span>
                                   <?php 
                                        $_SESSION['due']=$remaining;
                                    ?>
                                    
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
