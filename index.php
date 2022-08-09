<?php 
session_start();
if(!isset($_SESSION['email'])){
  header('location:login.php');
 }
define("TITLE","Dashboard");
define("PAGE","Dashboard");
include 'connection.php';
include 'header.php';

?>
<style>
    .mm{
        margin-top:150px;
    }
    .mn{
        margin-top:-40px;
    }
</style>


<div class="body-section">
<div class="container ">
         <div class="card mm">
              <div class="card-header border-0">
                <h3 class="card-title">Dashboard</h3>
                <!-- Button trigger modal -->
                 
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive ">
                    <div class="row">

                    <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#FF5200">
                                <div>
                                    <?php
                                        $date=date('y-m-d');
                                        $query=mysqli_query($conn,"select * from sale_items where date='$date'");
                                        $totalSale=0;
                                        while($row=mysqli_fetch_assoc($query)){
                                            $quantity=$row['quantity'];
                                            $sale=$row['price'];
                                            $sale_final=$sale * $quantity;
                                            $totalSale=$totalSale+$sale_final;
                                        }
                    
                                    ?>
                                    <h3 class="fs-2"><?php if($totalSale){ echo $totalSale;}else{echo '0';} ?></h3>
                                    <p class="fs-5">Daily Sale</p>
                                </div>
                                <i class="fas fa-dollar-sign fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#FF5200">
                                <div>
                                    <?php
                                        $date=date('y-m-d');
                                        $queryp=mysqli_query($conn,"select * from items where date='$date'");
                                        $totalPurchase=0;
                                        while($rowp=mysqli_fetch_assoc($queryp)){
                                            $quantity=$rowp['quantity'];
                                            $purchase=$rowp['price'];
                                            $purchase_final=$purchase * $quantity;
                                            $totalPurchase=$totalPurchase+$purchase_final;
                                        }
                    
                                    ?>
                                    <h3 class="fs-2"><?php if($totalPurchase){ echo $totalPurchase;}else{echo '0';} ?></h3>
                                    <p class="fs-5">Daily Purchase</p>
                                </div>
                                <i class="fas fa-search-dollar fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#FF5200">
                                <div>
                                    <?php
                                       $profit=$totalSale -$totalPurchase;
                    
                                    ?>
                                    <h3 class="fs-2"><?php if($profit){ echo $profit;}else{echo '0';} ?></h3>
                                    <p class="fs-5">Daily Profit</p>
                                </div>
                                <i class="fas fa-hand-holding-usd fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#FF5200">
                                <div>
                                    <?php
                                        $select_p="select * from supplier";
                                        $run=mysqli_query($conn,$select_p);
                                        $i=0;
                                        while($row=mysqli_fetch_assoc($run)){
                                            
                                            $i++;
                                        }
                    
                                    ?>
                                    <h3 class="fs-2"><?php echo $i;?></h3>
                                    <p class="fs-5">Suppliers</p>
                                </div>
                                <i class="fas fa-user-friends fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#FF5200">
                                <div>
                                <?php
                                    $select_p="select * from customers";
                                    $run=mysqli_query($conn,$select_p);
                                    $i=0;
                                    while($row=mysqli_fetch_assoc($run)){
                                        
                                        $i++;
                                    }
                  
                                ?>
                                    <h3 class="fs-2"><?php echo $i;?></h3>
                                    <p class="fs-5">Customers</p>
                                </div>
                                <i class="fas fa-user-shield fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#FF5200">
                                <div>
                                <?php
                                    $select_p="select * from categories";
                                    $run=mysqli_query($conn,$select_p);
                                    $i=0;
                                    while($row=mysqli_fetch_assoc($run)){
                                        
                                        $i++;
                                    }
                  
                                ?>
                                    <h3 class="fs-2"><?php echo $i;?></h3>
                                    <p class="fs-5">Categories</p>
                                </div>
                                <i class="fas fa-code-branch fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4  mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#FF5200">
                                <div>
                                <?php
                                    $select_p="select * from units";
                                    $run=mysqli_query($conn,$select_p);
                                    $i=0;
                                    while($row=mysqli_fetch_assoc($run)){
                                        
                                        $i++;
                                    }
                  
                                ?>
                                    <h3 class="fs-2"><?php echo $i;?></h3>
                                    <p class="fs-5">Units</p>
                                </div>
                                <i class="fas fa-gift fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>

                        <div class="col-md-4 mt-2">
                            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded" style="color:#FF5200">
                                <div>
                                <?php
                                    $select_p="select * from product";
                                    $run=mysqli_query($conn,$select_p);
                                    $i=0;
                                    while($row=mysqli_fetch_assoc($run)){
                                        
                                        $i++;
                                    }
                  
                                ?>
                                    <h3 class="fs-2"><?php echo $i;?></h3>
                                    <p class="fs-5">Products</p>
                                </div>
                                <i class="fab fa-product-hunt fs-1  border-rounded-full p-3"></i>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
            



            </div>
            <!-- flex-item -->
        </div>
        <!-- /flex-container -->
    </div>
            </div>
            <!-- flex-item -->
        </div>
        <!-- /flex-container -->
    </div>
</div>
        
        </div>
      
    </div>




    </div>




<?php 
include 'footer.php';
?>