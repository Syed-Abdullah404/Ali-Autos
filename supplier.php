<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Supplier");
define("PAGE","Supplier");
include 'connection.php';
include 'header.php';

?>
<style>
    .mm{
        margin:-20px;
       
    }
    .mn{
        margin-top:-40px;
    }
</style>

<div class="body-section">
<div class="container">
         <div class="card mm">
              <div class="card-header border-0">
                <h3 class="card-title">Supplier</h3>
                <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary float-end mn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-plus"></i>  Add Supplier
                    </button>
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive ">
                    <table id="table" class="table table-bordered pt-2">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name.</th>
                              
                                <th>Business Name.</th>
                                <th>CNIC.</th>
                                <th>Phone No.</th>
                                <th>Current Address</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        <?php
                        $squery="select * from supplier";
                        $run=mysqli_query($conn,$squery);
                        while($row=mysqli_fetch_assoc($run)){

                        ?>
                      <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['business_name'] ?></td>
                        <td><?php echo $row['cnic'] ?></td>
                        <td><?php echo $row['mobile'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        
                        
                        <td>

                    <button type="button" class="btn btn-success btn-sm editbtn"><i class="fas fa-edit"></i></button>
                    
                    <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                    <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    <a href="viewsupplier.php?idsupplier=<?php echo $row['id']; ?>" type="button" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                    </td>
                        </tr><?php
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="addSuplier" method="POST" >
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="suplierName">Supplier Name</label>
                                                <input type="text" class="form-control" id="suplierName"
                                                    placeholder="Suplier Name" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control" 
                                                    placeholder="Email Address" name="email" required>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label for="bName">Business name</label>
                                                <input type="text" class="form-control" id="bName"
                                                    placeholder="Bussiness Name" name="bname" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierIdcard">Id Card No (optional)</label>
                                                <input type="text" class="form-control" id="suplierIdcard"
                                                    placeholder="Id Card No" name="cnic" >
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierphone">Phone Number (optional)</label>
                                                <input type="phone" class="form-control" id="suplierphone"
                                                    placeholder="phone Number" name="mobile" >
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierAddress">Current Address</label>
                                                <input type="text" class="form-control" id="suplierAddress"
                                                    placeholder="Current Address" name="address" required>
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
      <form id="editSuplier" method="POST" >
                                    <input type="hidden" name="update_id" id="update_id">
                                        <div class="modal-body">
                                        <div class="form-group">
                                                <label for="suplierName">Supplier Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Suplier Name" name="sname" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="suplierbName">Business name</label>
                                                <input type="text" class="form-control" id="bname"
                                                    placeholder="Bussiness Name" name="bname" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierIdcard">Id Card No (optional)</label>
                                                <input type="text" class="form-control" id="card"
                                                    placeholder="Id Card No" name="nic" >
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierphone">Phone Number (optional)</label>
                                                <input type="phone" class="form-control" id="phone"
                                                    placeholder="phone Number" name="cell" >
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierAddress">Current Address</label>
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="Current Address" name="address" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                        </div>
                                    </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Edit Modal END -->


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
      $('#name').val(data[1]);
      $('#bname').val(data[2]);
      $('#card').val(data[3]);
      $('#phone').val(data[4]);
      $('#address').val(data[5]);
    });
  });

</script>
<script>
    $(document).ready(function () {
        $(".delete_btn_ajax").click(function (e) { 
            e.preventDefault();
            var deleteid=$(this).closest('tr').find('.delete_id_value').val();
           // alert(deleteid);
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                   $.ajax({
                       type: "POST",
                       url: "deletesupplier.php",
                       data: {
                           "delete_btn_set":1,
                           "deleteid":deleteid,
                       },                      
                       success: function (response) {
                        swal("Deleted!", "Your Data is Deleted", "success", {
                            button: "Ok!",
                            }).then((result)=>{
                              location.reload();
                            });
                            
                       }
                   });
                } 
                });
            
        });
    });
</script>
<?php 
include 'footer.php';

if(isset($_POST['add'])){
    $name=$_POST['name'];

    $file_error=$file['error'];
    $business_name=$_POST['bname'];
    $cnic=$_POST['cnic'];
    $mobile=$_POST['mobile'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $sql="select * from supplier where email='$email'";
    $sql_run=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($sql_run);
    if($count>0){
       echo "<script>alert('Email Already Exist') </script>";
    }else{

     
              
          $insert="insert into supplier (name,email,business_name,cnic, mobile, address) values('$name','$email','$business_name','$cnic','$mobile','$address')";
          $res=mysqli_query($conn,$insert);
          if($res){
              ?>
              <script>
              window.location = "<?php echo $app_url.'/supplier.php' ?>";
            </script>
              <?php
          }else{
              ?>
              <script>
                  alert("Failed");
              </script>
              <?php
          }

    ?>
    <script>
        alert("Profile Pic Error");
    </script>
    <?php
}
}

//Edit
if(isset($_POST['update'])){
    $id=$_POST['update_id'];
    $name=$_POST['sname'];
    $business_name=$_POST['bname'];
    $cnic=$_POST['nic'];
    $mobile=$_POST['cell'];
    $address=$_POST['address'];
    $updatequery="update supplier set name='$name', business_name='$business_name', cnic='$cnic',mobile='$mobile',address='$address' where id='$id'";
    $uquery=mysqli_query($conn,$updatequery);
    if($uquery){
      ?>
      <script>
              window.location = "<?php echo $app_url.'/supplier.php' ?>";
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