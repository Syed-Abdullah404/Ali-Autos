<style>
    label{
        margin-bottom:7px;
        font-weight:500;
        font-size:20px;
    }
    </style>
    
  
<div class="container-fluid px-4">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <table>
  <tr>
    <td><a href="cpaymentbill.php?id=<?php    $id=$_GET['idc'];  echo $id; ?>" class="btn btn-sm btn-success mt-3 mb-2">Print </a></td>
  </tr>
  </table>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                        <button type="button" class="btn btn-success float-end mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="fas fa-plus"></i>  Add Payment
                    </button>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="dataTable" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id=$_GET['idc'];
                                    $query=mysqli_query($conn,"select * from customers where id='$id'");
                                    $row=mysqli_fetch_assoc($query);
                                    $profile=$row['picture'];
                                    $name=$row['name'];

                                        $sql=mysqli_query($conn,"select * from customer_remaining_pay where customer='$name'");
                                        $i=0;
                                            while($rows=mysqli_fetch_assoc($sql)){
                                                $i++;

                                            
                                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rows['pay']; ?></td>
                                        <td><?php echo $rows['description']; ?></td>
                                        <td><?php echo $rows['date']; ?></td>
                                        
                                        <td>
                                        <input type="hidden" class="delete_id_value" value="<?php echo $rows['id']; ?>">
                                            <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm btn-danger">Delete</a>
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
                <!-- /.col-md-6 -->
            </div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Transaction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="addpt" method="POST">
                        <div class="modal-body">

                            <div class="form-group">
                                    <label for="name">Customer Name </label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>"
                                       readonly >
                                </div>
                            <div class="form-group">
                                    <label for="due">Due Amount</label>
                                    <input type="text" class="form-control" name="due" value="<?php echo $_SESSION['due']; ?>"
                                       readonly >
                                </div>
                            <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="text" class="form-control" placeholder="Amount" name="amount"
                                        required>
                                </div>

                                
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" placeholder="Date" name="date"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="4" cols="50" name="description" class="form-control"></textarea>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Save</button>
                            </div>
                        </form>
      </div>
      
    </div>
  </div>
</div>


<!-- //edit.. -->
            <div class="modal fade" id="editptModal" tabindex="-1" role="dialog" aria-labelledby="editptLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editptLabel">Edit Payment Transaction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form id="editpt">
                            <div class="modal-body">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Payment</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                        id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Deduction</label>
                                </div>




                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" step="any" class="form-control" id="amount" placeholder="Amount" name="name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" placeholder="Date" name="name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="4" cols="50" name="comment" class="form-control" ></textarea>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


</div>


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
                       url: "deleteSaleRemaining.php",
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

    include 'connection.php';

    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $due=$_POST['due'];
        $amount=$_POST['amount'];
        $date=$_POST['date'];
        $description=$_POST['description'];

        $sql=mysqli_query($conn, "insert into customer_remaining_pay (customer,due,pay,date,description) values('$name','$due','$amount','$date','$description')");
        if($sql){
            echo "<script>alert('Inserted'); </script>";
        }else{
            echo "<script>alert('Not Inserted'); </script>";
        }
    }


?>
