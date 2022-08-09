<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Customer");
define("PAGE","Customer");
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
    label{
        margin-bottom:7px;
        font-weight:500;
        font-size:20px;
    }
</style>

<div class="body-section">
<div class="container">
         <div class="card mm">
              <div class="card-header border-0">
                <h3 class="card-title">Daily Expense</h3>
                <!-- Button trigger modal -->
                 <button type="button" class="btn btn-primary float-end mn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-plus"></i>  Add Daily Expense
                    </button>
               
          <div class="container mt-1">
   
          <div class="container">
                                            <div class="row">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 mb-2">
                                                    <div class="card shadow-sm rounded-lg">
                                                        <div class="card-header"><b>Total Amount</b></div>
                                                        <div class="card-body row">
                                                            <div class="col-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hard-drive" style="width:50px;height:50px;color:green;"><line x1="22" y1="12" x2="2" y2="12"></line><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path><line x1="6" y1="16" x2="6.01" y2="16"></line><line x1="10" y1="16" x2="10.01" y2="16"></line></svg>
                                                            </div>
                                                            <div
                                                                class="col-6 d-flex justify-content-center align-items-center">
                                                                <?php
                                                                    $query=mysqli_query($conn,"select * from daily");
                                                                    $total=0;
                                                                    while($row=mysqli_fetch_assoc($query)){
                                                                        $amount=$row['amount'];
                                                                        $total=$total+$amount;

                                                                    }
                                                                ?>
                                                                <h3><?php echo $total; ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <div class="card shadow-sm rounded-lg">
                                                        <div class="card-header"><b>Payment</b></div>
                                                        <div class="card-body row">
                                                            <div class="col-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-down" style="width:50px;height:50px;color:#0dcaf0;"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6"></polyline><polyline points="17 18 23 18 23 12"></polyline></svg>
                                                            </div>
                                                            <div
                                                                class="col-6 d-flex justify-content-center align-items-center">
                                                                <?php
                                                                    $queryp=mysqli_query($conn,"select * from daily where type='payment'");
                                                                    $totalpayment=0;
                                                                    while($rowp=mysqli_fetch_assoc($queryp)){
                                                                        
                                                                        $amount_payment=$rowp['amount'];
                                                                        $totalpayment=$totalpayment+$amount_payment;

                                                                    }
                                                                ?>
                                                                <h3><?php echo $totalpayment; ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <div class="card shadow-sm rounded-lg">
                                                        <div class="card-header"><b>Receive Payment</b></div>
                                                        <div class="card-body row">
                                                            <div class="col-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up" style="width:50px;height:50px;color:#ffc107;"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                                            </div>
                                                            <div
                                                                class="col-6 d-flex justify-content-center align-items-center">
                                                                <?php
                                                                    $queryr=mysqli_query($conn,"select * from daily where type='recovery'");
                                                                    $totalreceive=0;
                                                                    while($rowr=mysqli_fetch_assoc($queryr)){
                                                                        
                                                                        $amount_payment_rec=$rowr['amount'];
                                                                        $totalreceive=$totalreceive+$amount_payment_rec;

                                                                    }
                                                                ?>
                                                                <h3><?php echo $totalreceive; ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


    <hr>
              <div class="card-body table-responsive">
              <table id="table" class="table table-bordered pt-2">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Description</th>
                                                    <th>Date</th>
                                                    <th>Operation</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-light">
                                            <?php
                                                    include 'connection.php';
                                                    $select="select * from daily";
                                                    $run=mysqli_query($conn,$select);
                                                    while($row=mysqli_fetch_assoc($run)){
                                            ?>
                                                     <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['amount'] ?></td>
                                                    <td><?php echo $row['type'] ?></td>
                                                    <td><?php echo $row['description'] ?></td>
                                                    <td><?php echo $row['date'] ?></td>
                                                    
                                                   
                                                    <td>
                                                    <input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
                                                    <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>

                                                            <button type="button" class="btn btn-success btn-sm editbtn"><i class="fas fa-edit"></i></button>
                                                            
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
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST">
                                        <div class="modal-body ">
                                            <div class="form-group ">
                                                <label for="amount">Amount</label>
                                                <input type="text" class="form-control" name="amount"
                                                    required>
                                            </div>
                                            <div class="form-group ">
                                                <label for="type">Type</label>
                                                <select class="form-control" name="type" required>
                                                    <option value="payment">Payment</option>
                                                    <option value="recovery">Receive Payment</option>
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control"  name="date" required>
                                            </div>
                                            <div class="form-group ">
                                                <label for="description">Description</label>
                                                <textarea class="form-control description"
                                                    name="description"></textarea>
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
<div class="modal fade" id="editDailyModal" tabindex="-1" role="dialog"
                            aria-labelledby="editDexpenseLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editDailyLabel">Edit Daily Expense</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form id="editDexpense" method="POST">
                                        <input type="hidden" name="update_id" id="update_id">
                                        <div class=" modal-body">
                                        <div class="modal-body ">
                                            <div class="form-group ">
                                                <label for="amount">Amount</label>
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                    required>
                                            </div>
                                            <div class="form-group ">
                                                <label for="type">Type</label>
                                                <select id="type" class="form-control" name="type" required>
                                                    <option value="payment">Payment</option>
                                                    <option value="recovery">Receive Payment</option>
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" id="date" name="date" required>
                                            </div>
                                            <div class="form-group ">
                                                <label for="description">Description</label>
                                                <textarea class="form-control description" id="description"
                                                    name="description"></textarea>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
<!-- Edit Modal END -->


 <script>
  $(document).ready(function(){
    $('.editbtn').on('click',function(){
      $('#editDailyModal').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children('td').map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#amount').val(data[1]);
      $('#type').val(data[2]);
      $('#date').val(data[4]);
      $('#description').val(data[3]);
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
                       url: "deleteDailyExpense.php",
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
    $amount=$_POST['amount'];
    $type=$_POST['type'];
    $description=$_POST['description'];
    $date=$_POST['date'];

    $insert_query="insert into daily (amount,type,description,date) values('$amount','$type','$description','$date')";
    $run_query=mysqli_query($conn,$insert_query);
    if($run_query){
     ?>
              <script>
                  window.location = "<?php echo $app_url.'/dailyexpense.php' ?>";
              </script>
     <?php
    }else{
       echo "<script> alert('Not Inserted') </script>";
    }
}
//Edit
if(isset($_POST['update'])){
    $id=$_POST['update_id'];
    $amount=$_POST['amount'];
    $type=$_POST['type'];
    $description=$_POST['description'];
    $date=$_POST['date'];

    $update_query="update daily set amount='$amount', type='$type', description='$description' where id='$id' ";
    $run=mysqli_query($conn,$update_query);
    if($run){
        ?>
        <script>
            window.location = "<?php echo $app_url.'/dailyexpense.php' ?>";
        </script>
<?php
    }else{
       echo "<script> alert('Not Updated') </script>";
    }
}
?>      