<?php 
session_start();
if(!isset($_SESSION['email'])){
  header('location:login.php');
 }
define("TITLE","Sale Report");
define("PAGE","Sale Report");
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
                <h3 class="card-title">Customer Report</h3>
                <!-- Button trigger modal -->
               
          <div class="container mt-1">
            
                    <form action="" method="POST" class="d-print-none">
                       <div class="form-group">
                            <select name="name" id="name" class="form-control">
                                <option>Select Name</option>
                                <?php
                                $query=mysqli_query($conn,"select * from customers");
                                while($rows=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value="<?php echo $rows['name'] ?>"><?php echo $rows['name'] ?></option>
                                    <?php
                                }

                                ?>
                            </select>
                        </div>
                    <span> From </span>
                        <div class="form-group ">
                            <input type="date" class="form-control" id="startdate" name="startdate">
                        </div>
                         <span> To </span>
                        <div class="form-group ">
                            <input type="date" class="form-control" id="enddate" name="enddate">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary mt-2" name="searchsubmit" value="Search">
                        </div>
                        
                    </form>
                    <?php
 if(isset($_REQUEST['searchsubmit'])){
    $name = $_REQUEST['name'];
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    $sql = "SELECT * FROM sale_items WHERE date BETWEEN '$startdate' AND '$enddate' AND customer='$name'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $_SESSION['saleStart']=$startdate;
      $_SESSION['saleEnd']=$enddate;
      $_SESSION['name']=$name;
     echo '
     <table>
  <tr>
    <td><a href="customerbill.php" class="btn btn-danger mt-2">Print </a></td>
  </tr>
  </table>
  <p class=" bg-dark text-white p-2 mt-4">Details</p>
  
      <table class="table">
      <thead>
        <tr>
          <th scope="col"> ID</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Product Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Sale Price</th>
          <th scope="col">Status</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
          <tbody>';
          while($row = $result->fetch_assoc()){
            echo '<tr>
            <th scope="row">'.$row["id"].'</th>
            <td>'.$row["customer"].'</td>
            <td>'.$row["item_name"].'</td>
            <td>'.$row["quantity"].'</td>
            <td>'.$row["price"].'</td>
            <td>'.$row["status"].'</td>
            <td>'.$row["date"].'</td>
              </tr>';
            }
            echo '</tbody>
      </table>';
  } else {
    echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
  }
 }
  ?>
               

    <hr>
              <div class="card-body table-responsive">
                    <table id="table" class="table table-bordered pt-2">
                       
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