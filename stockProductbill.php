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
        
<a href="stockReport.php" class="btn btn-sm btn-primary d-print-none mt-3">Back</a>
    <div class="row">
    <table class="table ">
        <tr>
        <td>
                    <div class="col-md-6 bg-dark mx-auto">
                        
                    <img src="images/logo1.jpg" alt="" style="width:230px; height:210px; margin-left:200px; margin-top:-100px;">
                    </div>
                    </td>
        </tr>
                <tr>
                   
                    <td>
                        <?php
                            $query=mysqli_query($conn,"select * from profile");
                            $row=mysqli_fetch_assoc($query);

                        ?>
                        <div class="col-md-6 mx-auto" style="margin-top:-40px;">
                            <h2 class="mt-5 text-center st" style="letter-spacing:0.5px;">" We Believe In Quality "</h2>
                            <h4 class="text-center"></h4>
                            <h6 class="text-center">Mobile No: <?php echo $row['mobile']; ?></h6>                           
                            <h6 class="text-center">Email: <?php echo $row['email']; ?></h6>
                            <h6 class="text-center">Date: ___________________________</h6>
                        </div>
                    </td>
                </tr>
            </table>
    </div>

        <div class="row">
            <div class="col-md-12">

           
              <div class="card-body table-responsive ">
                    <table  class="table pt-2" >
                        <thead>

                        <tr>                        
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                         
                         $name=$_SESSION['name'];
                         $sql=mysqli_query($conn,"select * from stock where product_name='$name'");
                         $quantity=0;
                         while($row=mysqli_fetch_assoc($sql)){
                             $total=$row['quantity'];
                             $quantity=$quantity+$total;
                         }
                    
    ?>
                         <tr>
                             <td><?php echo '1'; ?></td>
                             <td><?php echo $name; ?></td>
                             <td><?php echo $quantity; ?></td>
                         </tr>
                    </table>
                   
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