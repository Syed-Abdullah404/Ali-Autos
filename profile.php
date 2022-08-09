<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Profile");
define("PAGE","Profile");
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
                <h3 class="card-title">Profile</h3>
                <!-- Button trigger modal -->
             
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive p-0">
                  <?php

                        $sql=mysqli_query($conn,"select * from profile");
                        $row=mysqli_fetch_assoc($sql);
                        $email=$row['email'];
                        $address=$row['address'];
                        $mobile=$row['mobile'];

                        ?>
                   <form action="profile.php" method="POST">
                   <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">                 
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" cols="20" rows="5" class="form-control"><?php echo $address; ?></textarea>                 
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Office No</label>
                        <input type="text" class="form-control" name="mobile" value="<?php echo $mobile; ?>">                 
                    </div>

                    <button type="submit" name="edit" class="btn btn-primary">Change</button>
                   </form>
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

  

    if(isset($_POST['edit'])){
       
        $name=$_POST['email'];
        $address=$_POST['address'];
        $mobile=$_POST['mobile'];
        $updatequery="update profile set email='$email',address='$address', mobile='$mobile'";
        $uquery=mysqli_query($conn,$updatequery);
        if($uquery){
          ?>
          <script>
              window.location = "<?php echo $app_url.'/profile.php' ?>";
          </script>
        
          <?php
        }else{
          ?>
          <script>
              alert('Update Failed');
          </script>
        
          <?php
        }
        
      }
?>