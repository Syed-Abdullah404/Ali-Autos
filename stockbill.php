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
    <?php include 'billheader.php'; ?>
    </div>

        <div class="row">
            <div class="col-md-12">

           
              <div class="card-body table-responsive ">
                    <table id="table" class="table pt-2" >
                        <thead>

                        <tr>                        
                        <th scope="col">ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                         $status=$_SESSION['status'];
                         $name=$_SESSION['name'];
                    
    
                         $query=mysqli_query($conn,"SELECT * FROM product WHERE category='$name' AND status='$status'");
                        
                         while($row =mysqli_fetch_assoc($query)){
                            
                         ?>
                         <tr>
                             <td><?php echo $row["id"]?></td>                             
                             <td><?php echo $row["name"]?></td>                             
                             <td><?php echo $row["status"];?></td>
                            
                         </tr>
                         <?php
                         }
                     
     ?>
                   
        <tr></tr>
                
                        </tbody>
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