<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Cost Price List");
define("PAGE","Cost Price List");
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
                <h3 class="card-title">Cost Price List</h3>
                <!-- Button trigger modal -->
               
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive ">
                    <table id="table" class="table table-bordered pt-2" >
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Purchase Product Name </th>
                                <th>Cost Price</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query=mysqli_query($conn,"select * from items");
                            while($row=mysqli_fetch_assoc($query)){
                                ?>
                                <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['item_name']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                        </tbody>
                    </table>
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