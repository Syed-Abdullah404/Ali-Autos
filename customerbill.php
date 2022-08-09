<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Sale Bill");
define("PAGE","Sale Bill");
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
        
<a href="customerReport.php" class="btn btn-sm btn-primary d-print-none mt-3">Back</a>
    <div class="row">
         <?php include 'billheader.php'; ?>
     
    </div>

        <div class="row">
            <div class="col-md-12">

           
              <div class="card-body table-responsive ">
                    <table id="table" class="table pt-2" >
                        <thead>

                        <tr>                        
                            <th scope="col">Supplier </th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Sale Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                    $startdate=$_SESSION['saleStart'];
                    $enddate=$_SESSION['saleEnd'];
                    $name=$_SESSION['name'];
                    
    
                    $query=mysqli_query($conn,"SELECT * FROM sale_items WHERE date BETWEEN '$startdate' AND '$enddate' AND customer='$name'");
                    $total=0;
                    while($row =mysqli_fetch_assoc($query)){
                        $amount=$row["price"];
                        $total=$total+$amount;
                    ?>
                    <tr>
                        <td><?php echo $row["customer"]?></td>
                        <td><?php echo $row["item_name"]; ?></td>
                        <td><?php echo $row["quantity"];?></td>
                        <td><?php echo $row["price"];?></td>
                        <td><?php echo $row["status"];?></td>
                        <td><?php echo $row["date"];?></td>
                    </tr>
                    <?php
                    }
                
?>
        <tr></tr>
                
                        </tbody>
                    </table>
                    <h6 class="mt-5">
                    Total Sale Price: <?php echo $total; ?>
                    </h6>
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



<script>
    window.print();
</script>

<?php 
include 'footer.php';

?>