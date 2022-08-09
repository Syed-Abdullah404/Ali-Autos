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
                <h3 class="card-title">Stock Report</h3>
                <!-- Button trigger modal -->
               
          <div class="container mt-1">
            
                    <form action="" method="POST" class="d-print-none">
                        <h4 class="mt-2 text-primary">Check Stock Through Category</h4>
                        <table class="table">
                            <tr>
                                <td>
                                <div class="form-group">
                            <select name="name" id="name" class="form-control">
                                <option>Select Category</option>
                                <?php
                                $query=mysqli_query($conn,"select * from categories");
                                while($rows=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value="<?php echo $rows['name'] ?>"><?php echo $rows['name'] ?></option>
                                    <?php
                                }

                                ?>
                            </select>
                        </div>
                                </td>

                                <td>
                                    <select name="status" class="form-control">
                                        <option>Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </td>
                                
                                <td>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="searchsubmit" value="Search">
                                </div>
                                </td>
                            </tr>
                        </table>
                                                                                     
                    </form>

                    <!-- //check stock through product name.. -->

                    <form action="" method="POST" class="d-print-none">
                        <h4 class="mt-2 text-primary">Check Stock Through Product Name</h4>
                        <table class="table">
                            <tr>
                                <td>
                                <div class="form-group">
                            <select name="name" id="name" class="form-control">
                                <option>Select Category</option>
                                <?php
                                $query=mysqli_query($conn,"select * from product");
                                while($rows=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                                    <?php
                                }

                                ?>
                            </select>
                        </div>
                                </td>

                                
                                
                                <td>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="searchStock" value="Search">
                                </div>
                                </td>
                            </tr>
                        </table>
                                                                                     
                    </form>
                    <!-- //check stock through product name.. -->
 <?php
 if(isset($_REQUEST['searchsubmit'])){
    $name = $_REQUEST['name'];
    $status = $_REQUEST['status'];
    $sql = "SELECT * FROM product WHERE category='$name' AND status='$status'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $_SESSION['status']=$status;
      $_SESSION['name']=$name;
     echo '
     <table>
  <tr>
    <td><a href="stockbill.php" class="btn btn-danger mt-2">Print </a></td>
  </tr>
  </table>
  <p class=" bg-dark text-white p-2 mt-4">Details</p>
  
      <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
          <tbody>';
          while($row = $result->fetch_assoc()){
            echo '<tr>
            <th scope="row">'.$row["id"].'</th>
            <td>'.$row["name"].'</td>
            <td>'.$row["status"].'</td>
              </tr>';
            }
            echo '</tbody>
      </table>';
  } else {
    echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
  }
 }

 //through product name

 if(isset($_REQUEST['searchStock'])){
    $name = $_REQUEST['name'];
    $sql = "SELECT * FROM final_stock WHERE name='$name'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $_SESSION['name']=$name;
     echo '
     <table>
  <tr>
    <td><a href="stockProductbill.php" class="btn btn-danger mt-2">Print </a></td>
  </tr>
  </table>
  <p class=" bg-dark text-white p-2 mt-4">Details</p>
  
      <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Quantity</th>
        </tr>
      </thead>
          <tbody>';
          $total=0;
          $i=0;
          while($row = $result->fetch_assoc()){
              $i++;
            $quantity=$row['quantity'];
            $total=$total+$quantity;
            $_SESSION['total']=$total;
          }
            echo '<tr>
            <th scope="row">'.$i.'</th>
            <td>'.$name.'</td>
            <td>'.$total.'</td>
              </tr>';
            
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