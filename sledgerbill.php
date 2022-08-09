<?php
include 'connection.php';
include 'header.php';
$id=$_GET['id'];
$query=mysqli_query($conn,"select * from supplier where id='$id'");
$row=mysqli_fetch_assoc($query);
$profile=$row['picture'];
$name=$row['name'];
$business_name=$row['business_name'];
$mobile=$row['mobile'];
$cnic=$row['cnic'];
$address=$row['address'];

$purchase=mysqli_query($conn,"select * from products_detail where supplier='$name'");
$buying=0; $remaining=0; $paid=0;
while($rows=mysqli_fetch_assoc($purchase)){
    $total=$rows['final_total'];
    $buying=$buying+$total;
    $total_remaining=$rows['remaining'];
    $remaining=$remaining+$total_remaining;
    $total_paid=$rows['paid'];
    $paid=$paid+$total_paid;
   
}
?>
<div class="container">
<div class="row">
         <?php include 'billheader.php'; ?>
     
</div>
<table class="w-100">
 <tbody>
                        <tr>
                            <td>
                            <div class="row mt-4">
            <div class="col-md-6">
                <p><b>Name:</b><?php echo $name; ?></p>
                <p><b>Business Name:</b> <?php echo $business_name; ?> </p>
                <p><b>NIC No:</b> <?php echo $cnic; ?> </p>
                <p><b>Contact Number:</b> <?php echo $mobile; ?> </p>
                <p><b>Current Address:</b> <?php echo $address; ?> </p>
            </div>
            </td>

            <td>
            <div class="col-md-6">
                <h3 class="text-center mb-3 fw-bold">Account Summary</h3>
                                <div class="d-flex justify-content-evenly my-1">
                                    <span><b>Total Buying:</b></span>
                                    <span><?php echo $buying; ?></span>
                                </div>
                      
                                <div class="d-flex justify-content-evenly my-1">
                                    <span><b>Total Payment:</b></span>
                                    <span><?php 
                                    if(isset($total_paid)){
                                        echo $total_paid;
                                    }
                                    ?></span>
                                </div>
                         
                            <?php
                                    $select_customer_pay=mysqli_query($conn,"select * from supplier_remaining_pay where supplier='$name'");
                                    $pay_due=0; $final_rem=0;
                                    while($row_customer=mysqli_fetch_assoc($select_customer_pay)){
                                        $remaining_pay=$row_customer['pay'];
                                        $pay_due=$pay_due+$remaining_pay;
                                        
                                    }
                                    if($pay_due){
                                        $final_rem=$pay_due - $remaining;
                                    }else{
                                        $final_rem= $remaining;
                                    }
                                ?>
                                <div class="d-flex justify-content-evenly my-1">
                                    <span><b>Due:</b></span>
                                    <span><?php echo abs($final_rem); 
                                        $_SESSION['remaining']=abs($final_rem);
                                    ?></span>
                                    
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>