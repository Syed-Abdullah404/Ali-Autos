<?php 
session_start();
if(!isset($_SESSION['email'])){
  header('location:login.php');
 }
define("TITLE","Loss");
define("PAGE","Loss");
include 'connection.php';
include 'header.php';

?>
<style>
    .mm{
        margin-top:150px
        ;
    }
    .mn{
        margin-top:-40px;
    }
</style>

<div class="body-section">
<div class="container ">
         <div class="card mm">
              <div class="card-header border-0">
                <h3 class="card-title">Loss</h3>
                <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary float-end mn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-plus"></i>  Add Loss
                    </button>
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive">
                    <table id="table" class="table table-bordered pt-2">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>No.of Product loss</th>
                                <th>Description</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        <?php
                        $squery="select * from loss";
                        $run=mysqli_query($conn,$squery);
                        while($row=mysqli_fetch_assoc($run)){
                          
                           
                        ?>
                      <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['product']; ?></td>
                        <td><?php echo $row['amount']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                       
                        <td>

                    <button type="button" class="btn btn-success btn-sm editbtn"><i class="fas fa-edit"></i></button>
                    
                 
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
        <h5 class="modal-title" id="exampleModalLabel">Add loss Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
            <div class="mb-3">

                <label for="cat" class="form-label">Category Name</label>
                <select name="cat" class="form-control" onchange="cate(this.value)" required>
                    <option disabled>Select Category</option>
                    <?php
                        $query=mysqli_query($conn,"select * from categories");
                        while($row=mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                        }
                    ?>
                </select>               
            </div>
            
            <label for="pname" class="form-label">Product Name</label>
                <select name="pname" class="form-control"  id="pname" required>
                <option disabled>Select Product</option>
                <?php
                  
                  $query=mysqli_query($conn,"select * from product ");
                  while($row=mysqli_fetch_assoc($query)){
                      ?>
                      <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                      <?php
                  }
                
                  
              ?>
                </select>
               
            
                <div class="mb-3">
                <label class="form-label">Stock Amount</label>
                <input type="number" name="stock" class="form-control" placeholder="Loss">               
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" cols="10" rows="5" class="form-control"></textarea>               
            </div>

             
           
            <button type="submit" class="btn btn-primary mt-1 float-end" name="add">Submit</button>
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
      <form method="POST">
          <input type="hidden" name="update_id" id="update_id">
  
            <div class="mb-3">

                <label for="cat" class="form-label">Category Name</label>
                <select name="cat" class="form-control" id="cat">
                    <option disabled>Select Category</option>
                    <?php
                        $query=mysqli_query($conn,"select * from categories");
                        while($row=mysqli_fetch_assoc($query)){
                          $category_name = $row['name'];
                            ?>
                            <option value="<?php echo  $category_name; ?>"><?php echo  $category_name; ?></option>
                            <?php
                        }
                    ?>
                </select>               
            </div>
         <div class="mb-3">

            <label  class="form-label">Select Product</label>
                <select name="pname" class="form-control" id="pnamee">
                    <option disabled>Select Product</option>
                    <?php
                  
                        $query=mysqli_query($conn,"select * from product ");
                        while($row=mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                            <?php
                        }
                      
                        
                    ?>
                </select>               
        </div>
        <div class="mb-3">
                <label class="form-label">Stock Amount</label>
                <input type="number" name="stock" class="form-control" placeholder="Loss" id="stock">               
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" cols="10" rows="5" class="form-control" id="description"></textarea>               
            </div>

         
           
            <button type="submit" class="btn btn-primary mt-1 float-end" name="edit">Submit</button>
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
      $('#cat').val(data[1]);
      $('#pnamee').val(data[2]);
      $('#stock').val(data[3]);
      $('#description').val(data[4]);
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
                       url: "deleteproduct.php",
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
        $cat=$_POST['cat'];;
        $product=$_POST['pname'];
        $description=$_POST['description'];
        $amount=$_POST['stock'];
        
        $result=mysqli_query($conn,"insert into loss (category,product,amount,description) values('$cat','$product','$amount','$description')");
        if($result){

            $stock_query=mysqli_query($conn,"select * from final_stock where name='$product'");
            $quantity_total=0;
            while($row=mysqli_fetch_assoc($stock_query)){
                $quantity=$row['quantity'];
                $quantity_total=$quantity_total + $quantity;           
            }
            $final= $quantity_total - $amount;
            mysqli_query($conn,"update final_stock set quantity ='$final' where name='$product'");
            ?>
          <script>
              window.location = "<?php echo $app_url.'/loss.php' ?>";
          </script>
        
          <?php
        }
    }

    if(isset($_POST['edit'])){
        $idp=$_POST['update_id'];
        $cat=$_POST['cat'];;
        $product=$_POST['pname'];
        $description=$_POST['description'];
        $amount=$_POST['stock'];
        $updatequery="UPDATE `loss` SET `category`='$cat',`product`='$product',`amount`='$amount',`description`='$description' WHERE id='$idp'";
        $uquery=mysqli_query($conn,$updatequery);
        if($uquery){
          ?>
          <script>
              window.location = "<?php echo $app_url.'/loss.php' ?>";
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

function cate(data){
  const ajaxreq= new XMLHttpRequest();
 
  ajaxreq.open('GET','http://aliauto.cte.com.pk/productdata.php?selectvalue='+data,'TRUE');
  ajaxreq.send();
  ajaxreq.onreadystatechange =function(){
    if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
      document.getElementById('pname').innerHTML=ajaxreq.responseText;
    }
  }
} 

</script>