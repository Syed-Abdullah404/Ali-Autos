<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Product");
define("PAGE","Product");
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
                <h3 class="card-title">Products</h3>
                <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary float-end mn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-plus"></i>  Add Product
                    </button>
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive">
                    <table id="table" class="table table-bordered pt-2">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Units</th>
                                <th>Purchase Price</th>
                                <th>Sale Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                        <?php
                        $squery="select * from product";
                        $run=mysqli_query($conn,$squery);
                        while($row=mysqli_fetch_assoc($run)){
                            $name=$row['name'];
                            $sql=mysqli_query($conn,"select * from items where item_name='$name'");
                            $rows=mysqli_fetch_assoc($sql);
                            if($rows){
                                $purchase_price=$rows['price'];
                            }
                            

                            $sql_sale=mysqli_query($conn,"select * from sale_items where item_name='$name'");
                            $sale_row=mysqli_fetch_assoc($sql_sale);
                            if($sale_row){
                                $sale_price=$sale_row['price'];
                            }
                            

                            $sql_stock=mysqli_query($conn,"select * from final_stock where name='$name'");
                            $quantity=0;
                            while($row_stock=mysqli_fetch_assoc($sql_stock)){
                                $quantity_stock=$row_stock['quantity'];
                                $quantity=$quantity+$quantity_stock;
                            }
                        ?>
                      <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td><?php echo $row['subcategory']; ?></td>
                        <td><?php echo $row['unit']; ?></td>
                        <td>
                            <?php 
                            if(isset($purchase_price)){
                                echo $purchase_price;
                            }else{
                                echo '0';
                            }
                         ?>
                         </td>
                         <td>
                         <?php 
                            if(isset($sale_price)){
                                echo $sale_price;
                            }else{
                                echo '0';
                            }
                         ?>
                         </td>
                       
                        <td><?php echo $quantity; ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td>

                    <button type="button" class="btn btn-success btn-sm editbtn"><i class="fas fa-edit"></i></button>
                    
                    <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                    <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
      <form method="POST">
      <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Product Name" required>               
            </div>
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
            
            <label for="subcat" class="form-label">Sub Category Name</label>
                <select name="subcat" class="form-control"  id="subcat" required>
                <option disabled>Select Sub Category</option>
                <?php
                        $query=mysqli_query($conn,"SELECT * FROM `subcategories`");
                        while($row=mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $row['sub']; ?>"><?php echo $row['sub']; ?></option>
                            <?php
                        }
                    ?>
                </select>
               
            
            <div class="mb-3">
                <label for="unit" class="form-label">Unit </label>
                <select name="unit" class="form-control" required>
                    <option>Select Unit</option>
                    <?php
                        $queryu=mysqli_query($conn,"select * from units");
                        while($rowu=mysqli_fetch_assoc($queryu)){
                            ?>
                            <option value="<?php echo $rowu['unit']; ?>"><?php echo $rowu['unit']; ?></option>
                            <?php
                        }
                    ?>
                </select>               
            </div>

            <div class="form-group">
            <label class="form-label">Status</label><br>
                <input type="radio" name="status" value="active" checked>Active
                <input type="radio" name="status" value="deactive">Dective

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
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Product Name" id="pname">               
            </div>
            <div class="mb-3">

                <label for="cat" class="form-label">Category Name</label>
                <select name="cat" class="form-control" id="cat">
                    <option>Select Category</option>
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
         <div class="mb-3">

            <label  class="form-label">Sub Category Name</label>
                <select name="subcat" class="form-control" id="subcate">
                    <option>Select Category</option>
                    <?php
                        $query=mysqli_query($conn,"select * from subcategories");
                        while($row=mysqli_fetch_assoc($query)){
                            ?>
                            <option value="<?php echo $row['sub']; ?>"><?php echo $row['sub']; ?></option>
                            <?php
                        }
                    ?>
                </select>               
        </div>
            <div class="mb-3">
                <label class="form-label">Unit </label>
                <select name="unit" class="form-control" id="unit">
                    <option>Select Unit</option>
                    <?php
                        $queryu=mysqli_query($conn,"select * from units");
                        while($rowu=mysqli_fetch_assoc($queryu)){
                            ?>
                            <option value="<?php echo $rowu['unit']; ?>"><?php echo $rowu['unit']; ?></option>
                            <?php
                        }
                    ?>
                </select>               
            </div>

            <div class="form-group">
            <label class="form-label">Status</label><br>
            <select name="status" id="status" class="form-control">
                  <option value="active">Active</option>
                  <option value="deactive">Deactive</option>
                </select>
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
      $('#pname').val(data[1]);
      $('#cat').val(data[2]);
      $('#subcate').val(data[3]);
      $('#unit').val(data[4]);
      $('#status').val(data[8]);
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
        $name=$_POST['name'];
        $cat=$_POST['cat'];
        $subcat=$_POST['subcat'];
        $unit=$_POST['unit'];
        $status=$_POST['status'];
        
        $result=mysqli_query($conn,"insert into product (name,category,subcategory,unit,status) values('$name','$cat','$subcat','$unit','$status')");
        if($result){
            mysqli_query($conn,"insert into final_stock (name,quantity,category) values('$name','0','$cat')");
            ?>
          <script>
              window.location = "<?php echo $app_url.'/products.php' ?>";
          </script>
        
          <?php
        }
    }

    if(isset($_POST['edit'])){
        $idp=$_POST['update_id'];
        $name=$_POST['name'];
        $cat=$_POST['cat'];
        $subcat=$_POST['subcat'];
        $unit=$_POST['unit'];
        $status=$_POST['status'];
        $updatequery="UPDATE `product` SET `name`='$name',`category`='$cat',`subcategory`='$subcat',`unit`='$unit',`status`='$status' WHERE id='$idp'";
        $uquery=mysqli_query($conn,$updatequery);
        if($uquery){
          ?>
          <script>
              window.location = "<?php echo $app_url.'/products.php' ?>";
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
 
  ajaxreq.open('GET','http://aliauto.cte.com.pk/subcatdata.php?selectvalue='+data,'TRUE');
  ajaxreq.send();
  ajaxreq.onreadystatechange =function(){
    if(ajaxreq.readyState == 4 && ajaxreq.status == 200){
      document.getElementById('subcat').innerHTML=ajaxreq.responseText;
    }
  }
} 

</script>