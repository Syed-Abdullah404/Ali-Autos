<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Employee");
define("PAGE","Employee");
include 'connection.php';
include 'header.php';
$select_query="select * from categories";
    $run=mysqli_query($conn,$select_query);
?>
<style>
      label{
        margin-bottom:7px;
        font-weight:500;
        font-size:20px;
    }
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
                <h3 class="card-title">Employee Work</h3>
                <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary float-end mn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-plus"></i>  Add work
                    </button>
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive">
                    <table id="table" class="table table-bordered pt-2">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                        <?php
                                                   $id=$_GET['ide'];
                                                    $selectq="select * from employeework where emp_id='$id'";
                                                    $runs=mysqli_query($conn,$selectq);
                                                    while($rows=mysqli_fetch_assoc($runs)){
?>
                                                     <tr id="record-4">
                                                    <td><?php echo $rows['id'] ?></td>
                                                    <td><?php echo $rows['category'] ?></td>
                                                    <td><?php echo $rows['product'] ?></td>
                                                    <td><?php echo $rows['quantity'] ?></td>
                                                    <td><?php echo $rows['total'] ?></td>
                                                    <td><?php echo $rows['date'] ?></td>
                                                    
                                                    
                                                    <td>
                                                    <input type="hidden" class="delete_id_value" value="<?php echo $rows['id']; ?>">
                                                     <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm btn-danger">Delete</a>

                                                            <!-- <button type="button" class="btn btn-success btn-sm editbtn">Edit</button> -->
                                                    </td>
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="addWork" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label for="cat">Select Category:</label>
                                            <select name="cat" class="form-select" > 
                                                  <option value="ready">Ready </option>
                                                    </select>
                                               

                                            </div>
                                            <div class="form-group">
                                                <label for="product">Select Product:</label>
                                                <select name="product" class="form-select">
                                                        
                                                        <?php
                                                        $select="select name from product";
                                                        $run=mysqli_query($conn,$select);

                                                        while($rows=mysqli_fetch_assoc($run)){
                                                            ?>
                                                                <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" class="form-control" 
                                                    placeholder="Quantity" name="quantity" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" placeholder="Date"
                                                    name="date" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="submit">Add</button>
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
      <form id="addWork" method="POST">
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label for="cat">Select Category:</label>
                                            <input type="text" name="cat" id="ecat" class="form-control">                                             

                                            </div>
                                            <div class="form-group">
                                                <label for="product">Select Product:</label>
                                                <select name="product" class="form-select" id="product">
                                                <option>Select Product</option>
                                                        <?php
                                                        $select="select name from product";
                                                        $run=mysqli_query($conn,$select);

                                                        while($rows=mysqli_fetch_assoc($run)){
                                                            ?>
                                                                <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="text" class="form-control" 
                                                    placeholder="Quantity" name="quantity" id="quantity">
                                            </div>
                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" placeholder="Date"
                                                    name="date" id="date">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                        </div>
                                    </form>
      
    </div>
  </div>
</div>
<!-- Edit Modal END -->

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
                       url: "deleteEmployeeWork.php",
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
      $('#ecat').val(data[1]);
      $('#product').val(data[2]);
      $('#quantity').val(data[3]);
      $('#date').val(data[4]);
    });
  });

</script>
<?php 
include 'footer.php';

if(isset($_POST['submit'])){
    $idemp=$_GET['ide'];
    $cat=$_POST['cat'];
    $product=$_POST['product'];
    $quantity=$_POST['quantity'];
    $date=$_POST['date'];

    $sql=mysqli_query($conn,"select * from employee where id='$idemp'");
    $row=mysqli_fetch_assoc($sql);
    $name=$row['emp_name'];

    $sqli=mysqli_query($conn,"select * from contract where name='$name'");
    $rows=mysqli_fetch_assoc($sqli);
    $price=$rows['price'];
    $total=$quantity * $price;

    $insert="insert into employeework (`category`,`product`, `quantity`,`total`, `date`, `emp_id`) values('$cat','$product','$quantity','$total','$date','$idemp')";
    $runq=mysqli_query($conn,$insert);

    if($runq){
    ?>
           <script>
                window.location = "<?php echo $app_url.'/employeework.php?ide='."$idemp" ?>";
           </script>
      
    <?php
    }else{
        echo "<script>alert('Not Added'); </script>";
    }
}


    
?>