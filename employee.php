<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Employee");
define("PAGE","Employee");
include 'connection.php';
include 'header.php';
$select="select * from employee";
    $run=mysqli_query($conn,$select);
    $count=mysqli_num_rows($run);
?>
<style>
     label{
        margin-bottom:7px;
        font-weight:500;
        font-size:20px;
    }
    input{
        margin-bottom:5px;
    }
    .mm{
        margin:-20px;
       
    }
    .mn{
        margin-top:-35px;
    }
  

</style>


<div class="body-section">
<div class="container">
         <div class="card mm">
              <div class="card-header border-0">
                <h3 class="card-title">Employee</h3>
                <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary float-end mn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-plus"></i>  Add Employee
                    </button>
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive p-2">
              <div class="card-body ">
                                        <!--crdbody  -->
                                        <form action="" method="POST">
                                        <div class="row col-lg-12  ">
                                            
                                        <?php
                                                    while($row=mysqli_fetch_assoc($run)){
                                                        
                                                        ?>
                                                        <div class="col-12 col-sm-6 d-flex align-items-stretch mb-4">
                                                
                                                <div class="card bg-light">
        
                                                    <h4 class="card-header text-muted border-bottom-0 py-2 bold">
                                                        <?php echo $row['emp_name'] ?>
                                                    </h4>
                                                    <div class="card-body  pt-0">
                                                        <div class="row">
                                                            <div class="col-5 text-center pt-5">
                                                                <tr>
                                                                    <td>
                                                                    <img src="<?php echo $row['profile'] ?>" alt=""
                                                                    class="rounded-circle img-fluid" width='120px;' height='120px;'>
                                                                    </td>
                                                                </tr>
                                                               
                                                            </div>
                                                            <div class="col-7 py-1">
                                                                <tr>
                                                                    <td>
                                                                    <p class="text-primary text-sm mb-1"><b
                                                                        class="text-dark">Name:</b>
                                                                        <span><?php echo $row['emp_name'] ?></span>
                                                                </p>
                                                                    </td>
                                                                </tr>
                                                               
                                                               
                                                                <p class="text-primary text-sm mb-1"><b
                                                                        class="text-dark">CNIC NO:</b>
                                                                        <?php echo $row['cnic'] ?>
                                                                </p>
                                                                <p class="text-primary text-sm mb-1"><b
                                                                        class="text-dark">Phone No:</b>
                                                                        <?php echo $row['mobile'] ?>
                                                                </p>
                                                                <p class="text-primary text-sm mb-1"><b
                                                                        class="text-dark">Current
                                                                        Address:</b>
                                                                        <?php echo $row['address'] ?>
                                                                </p>
                                                                <p class="text-primary text-sm mb-1"><b
                                                                        class="text-dark">Contract:</b>
                                                                        <?php echo $row['contract'] ?> 
                                                                </p>
                                                                <p class="text-primary text-sm mb-1"><b
                                                                        class="text-dark">Contract Type:</b>
                                                                        <?php echo $row['paying_term'] ?>
                                                                </p>
                                                                <p class="text-primary text-sm mb-1"><b
                                                                        class="text-dark">Joining Date:</b>
                                                                        <?php echo $row['date'] ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="text-right">
                                                            <a href="employeeEdit.php?ids=<?php echo $row['id']; ?>" type="button" class="btn btn-primary">Edit</button>
                                                                <?php
                                                                    $contract=$row['paying_term'];
                                                                    if($contract == 'contract'){
                                                                        ?>
                                                                    <a href="contract.php?idy=<?php echo $row['id'];?>">
                                                                <button type="button"
                                                                    class="btn btn-warning text-white">Contract</button></a>
                                                                        <?php
                                                                    }

                                                                ?>
                                                            <?php
                                                                    $contract=$row['paying_term'];
                                                                    if($contract == 'monthly'){
                                                                        ?>
                                                                    <a href="salary.php?ids=<?php echo $row['id']; ?>"><button type="button" class="btn"
                                                                    style="background-color:purple;color:white; margin-left:5px;"> Salary</button></a>
                                                                        <?php
                                                                    }
                                                                ?>

                                                            
                                                            <a href="employeework.php?ide=<?php echo $row['id']; ?>"><button type="button"
                                                                    class="btn btn-danger text-white">Work</button></a>

                                                                   <!-- <button type="button" class="btn btn-success btnn"  onclick="myFunction()">Active</button> -->

                                                                      
                                                                    
                                            
                                                                    <!-- <button type="button" class="btn btn-danger delbtn">Delete</button> -->

                                                        
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                                        <?php
                                                    }
                                                ?>
                                            
                                            </form>


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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="addEmployee" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="employeeName">Employee Name</label>
                                                <input type="text" class="form-control" 
                                                    placeholder="Employee Name" name="ename" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="cnicno">CNIC No.</label>
                                                <input type="text" class="form-control" 
                                                    placeholder="CNIC No." name="cnic" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phoneno">Phone No.</label>
                                                <input type="text" class="form-control" 
                                                    placeholder="Phone Number" name="mobile" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="currentaddress">Current Address</label>
                                                <input type="text" class="form-control" id="currentaddress"
                                                    placeholder="Current Address" name="address" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="contract">Contract</label>
                                                <input type="text" class="form-control" 
                                                    placeholder="Contract" name="contract" required>
                                            </div>
                                           
                                          
                                            <div class="form-group">
                                                <label for="payingterm">Paying Terms:</label>

                                                <select class="form-control"  name="type">
                                                   
                                                    <option value='monthly'>Monthly</option>
                                                    <option value='contract'>Contract</option>

                                                </select>

                                            </div>

                                            <div class="form-group" id="salary_wrapper" style="display:block;">
                                                <label for="salary">Salary</label>
                                                <input type="text" class="form-control" placeholder="Salary"
                                                    name="salary" required>
                                            </div>


                                            <div class="form-group">
                                                <label for="contract">Joining Date</label>
                                                <input type="date" class="form-control" 
                                                    placeholder="Contract" name="date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="customerImage">Image Upload</label>
                                                <input type="file" class="form-control" 
                                                    placeholder="Customer image" name="profile" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="add">Add</button>
                                        </div>
                                    </form>
  </div>
      
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="myModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="editEmployee" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="update_id" id="update_id">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="employeeName">Employee Name</label>
                                                <input type="text" class="form-control" id="employeeName"
                                                    placeholder="Employee Name" name="ename" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fatherName">Father Name</label>
                                                <input type="text" class="form-control" id="fatherName"
                                                    placeholder="Father Name" name="fname" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cnicno">CNIC No.</label>
                                                <input type="text" class="form-control" id="cnicno"
                                                    placeholder="CNIC No." name="cnic" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phoneno">Phone No.</label>
                                                <input type="text" class="form-control" id="phoneno"
                                                    placeholder="Phone Number" name="cell" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="currentaddress">Current Address</label>
                                                <input type="text" class="form-control" id="currentaddress"
                                                    placeholder="Current Address" name="address" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="contract">Contract</label>
                                                <input type="text" class="form-control" id="contract"
                                                    placeholder="Contract" name="contract" required>
                                            </div>





                                            <div class="form-group">
                                                <label for="payingterm">Paying Terms:</label>

                                                <select class="form-control" id="salary_type1" name="term">
                                                    <option>Paying Terms</option>
                                                    <option>Monthly</option>
                                                    <option>Contract</option>

                                                </select>

                                            </div>

                                            <div class="form-group" id="salary_wrapper1" style="display:block;">
                                                <label for="salary">Salary</label>
                                                <input type="text" class="form-control" id="salary" placeholder="Salary"
                                                    name="salary" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="contract">Joining Date</label>
                                                <input type="date" class="form-control" id="date"
                                                    placeholder="Contract" name="date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="customerImage">Image Upload</label>
                                                <input type="file" class="form-control" id="customerImage"
                                                    placeholder="Customer image" name="image" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
                                        </div>
                                    </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Edit Modal END -->
<!-- //delete Modal/.. -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          
        <img src="https://media.istockphoto.com/vectors/danger-warning-exclamation-point-sign-icon-vector-id613052742?k=20&m=613052742&s=612x612&w=0&h=fuyR_B8kaU0q2nh9R7jd36aDLXMyK9jICgLElu2qdck=" alt="" style="width:150px; height:150px; margin-left:150px;">
        <h4 class="mt-3">Are You Sure To delete This Data !!!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="submit" name="delete" class="btn btn-danger">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end Delet Modal. -->

<script>
        var click=false;
        function myFunction() {
            if(!click){
                click=true;
                
                document.querySelector('.btnn').innerHTML="Deactive";
                
                
               
            }else{
                click=false;
                document.querySelector('.btnn').innerHTML="Active";
            
            }                      
        }
    </script>

 <script>
  $(document).ready(function(){
    $('.editbtn').on('click',function(){
      $('#myModalEdit').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children('td').map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
            $('#owner').val(data[1]);
            $('#catego').val(data[2]);
            $('#email').val(data[3]);
            $('#price').val(data[4]);
            $('#time').val(data[5]);
            $('#date').val(data[6]);
            $('#status').val(data[7]);
            $('#des').val(data[8]);
    });


    $('.delbtn').on('click',function(){
      $('#deleteModal').modal('show');
    });
  });

</script>

<?php 
include 'footer.php';

if(isset($_POST['add'])){
    $employe=$_POST['ename'];
   
    $cnic=$_POST['cnic'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $contract=$_POST['contract'];
    $type=$_POST['type'];
    $salary=$_POST['salary'];
    $jDate=$_POST['date'];
    $file=($_FILES['profile']);
    //   print_r($file);
      $file_name=$file['name'];
      $file_path=$file['tmp_name'];
      $file_error=$file['error'];
        if($file_error == 0){
            $destinaton='employee/'.$file_name;
            move_uploaded_file($file_path,$destinaton);
         if($type == 'monthly'){
             $insert="INSERT INTO `employee`(`emp_name`, `cnic`, `mobile`, `address`, `contract`, `paying_term`, `salary`, `date`,`profile`) VALUES ('$employe','$cnic','$mobile','$address','$contract','$type','$salary','$jDate','$destinaton')";
             //echo $insert;
             $query=mysqli_query($conn,$insert);
             echo $query;
         }else{
             $insert="INSERT INTO `employee`(`emp_name`, `cnic`, `mobile`, `address`, `contract`, `paying_term`, `salary`, `date`,`profile`) VALUES ('$employe','$cnic','$mobile','$address','$contract','$type','0','$jDate','$destinaton')";
             //echo $insert;
             $query=mysqli_query($conn,$insert);
         }
 
    
             

     if($query){
        ?>
            <script>
              window.location = "<?php echo $app_url.'/employee.php' ?>";
          </script>
        <?php
     }else{
         echo "<script>alert('Not Inserted') </script>";
     }
 }else{
     echo "<script>alert('Profile Error') </script>";
 }
 }

?>