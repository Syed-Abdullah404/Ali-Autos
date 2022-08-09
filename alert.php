<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
define("TITLE", "Alert");
define("PAGE", "Alert");
include 'connection.php';
include 'header.php';

?>
<style>
    .mm {
        margin: -20px;

    }

    .mn {
        margin-top: -40px;
    }
</style>

<div class="body-section">
    <div class="container">
        <div class="card mm">
            <div class="card-header border-0">
                <h3 class="card-title">Alert</h3>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-end mn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i> Add Alert
                </button>





                <hr>
                <div class="card-body table-responsive">
                    <table id="table" class="table table-bordered p-2">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Payment</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            <?php
                            $show = "select * from alert";
                            $run_show = mysqli_query($conn, $show);
                            while ($row_show = mysqli_fetch_assoc($run_show)) {
                            ?>
                                <tr>
                                    <td><?php echo $row_show['id']; ?></td>
                                    <td><?php echo $row_show['contact_category']; ?></td>
                                    <td><?php echo $row_show['name']; ?></td>
                                    <td><?php echo $row_show['email']; ?></td>
                                    <td><?php echo $row_show['payment']; ?></td>
                                    <td><?php echo $row_show['time']; ?></td>
                                    <td><?php echo $row_show['date']; ?></td>
                                    <td><?php echo $row_show['status']; ?></td>
                                    <td><?php echo $row_show['description']; ?></td>

                                    <td>
                                        <input type="hidden" class="delete_id_value" value="<?php echo $row_show['id']; ?>">
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
                <form id="addCustomer" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <!--  -->

                        <div class="form-group">
                            <label for="contactCategory">Contact Category:</label>

                            <select class="form-control" name="owner" onchange="cat(this.value)">
                                <option>Contact Category</option>
                                <option value="supplier">Supplier</option>
                                <option value="customer">Customer</option>

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>

                            <select class="form-control" name="name" id="category">
                                <option>Select Name</option>
                                <?php
                                $query = mysqli_query($conn, "select name from customers");
                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?> </option>


                                <?php
                                }

                                $query2 = mysqli_query($conn, "select name from supplier");
                                while ($row2 = mysqli_fetch_assoc($query2)) {
                                ?>

                                    <option value="<?php echo $row2['name']; ?>"><?php echo $row2['name']; ?></option>
                                <?php
                                }
                                ?>



                            </select>

                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <label for="price">Payment</label>
                            <input type="text" class="form-control" placeholder="Product Price" name="payment" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" name="time" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" placeholder="Date" name="date" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="radio" name="status" value="received">Received
                            <input type="radio" name="status" value="payable">Payable
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="4" cols="50" class="form-control" name="comment"></textarea>
                        </div>

                        <!--  -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="submit">Add</button>
                        </div>
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
                <form id="editCustomer" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="update_id" id="update_id">
                    <div class="modal-body">
                        <!--  -->

                        <div class="form-group">
                            <label for="contactCategory">Contact Category:</label>

                            <select class="form-control" name="owner" id="owner" onchange="cate(this.value)">
                                <option>Contact Category</option>
                                <option value="supplier">Supplier</option>
                                <option value="customer">Customer</option>

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>

                            <select class="form-control" name="name" id="catego" class="category">
                                <option>Select Name</option>
                                <?php
                                $query = mysqli_query($conn, "select customers.name from customers");
                                while ($row = mysqli_fetch_assoc($query)) {
                                    $query2 = mysqli_query($conn, "select supplier.name from supplier");
                                    while ($row2 = mysqli_fetch_assoc($query2)) {
                                ?>
                                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                        <option value="<?php echo $row2['name']; ?>"><?php echo $row2['name']; ?></option>
                                <?php
                                    }
                                }
                                ?>

                            </select>

                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address" id="email">
                        </div>
                        <div class="form-group">
                            <label for="price">Payment</label>
                            <input type="text" class="form-control" id="price" placeholder="Product Price" name="payment" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" name="time" id="time" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" placeholder="Date" name="date" required>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="payable">Payable</option>
                                <option value="received">Received</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="des" rows="4" cols="50" class="form-control" name="comment"></textarea>
                        </div>




                        <!--  -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Edit Modal END -->

<!-- //js -->
<script>
    $(document).ready(function() {
        $(".delete_btn_ajax").click(function(e) {
            e.preventDefault();
            var deleteid = $(this).closest('tr').find('.delete_id_value').val();
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
                            url: "deletealert.php",
                            data: {
                                "delete_btn_set": 1,
                                "deleteid": deleteid,
                            },
                            success: function(response) {
                                swal("Deleted!", "Your Data is Deleted", "success", {
                                    button: "Ok!",
                                }).then((result) => {
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
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#myModalEdit').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function() {
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
    });
</script>
<script>
    function cat(data) {
        const ajaxreq = new XMLHttpRequest();
        ajaxreq.open('GET', 'http://localhost/htdocs/ali-haider-new/alertdata.php?selectvalue=' + data, 'TRUE');
        ajaxreq.send();
        ajaxreq.onreadystatechange = function() {
            if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {
                document.getElementById('category').innerHTML = ajaxreq.responseText;
            }
        }

    }

    function cate(data) {
        const ajaxreq = new XMLHttpRequest();
        ajaxreq.open('GET', 'http://localhost/htdocs/ali-haider-new/alertdata.php?selectvalue=' + data, 'TRUE');
        ajaxreq.send();
        ajaxreq.onreadystatechange = function() {
            if (ajaxreq.readyState == 4 && ajaxreq.status == 200) {
                document.getElementById('catego').innerHTML = ajaxreq.responseText;
            }
        }

    }
</script>
<?php
include 'footer.php';

if (isset($_POST['submit'])) {
    $category = $_POST['owner'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $des = $_POST['comment'];

    $alert = "insert into alert (contact_category,name,email,payment,time,date,status,description) values('$category','$name','$email','$payment','$time','$date','$status','$des')";
    $run = mysqli_query($conn, $alert);
    if ($run) {
        $to_email = $email;
        $subject = "Alert";
        $body = "hi, body";
        $header = "From: $email";

        if (mail($to_email, $subject, $body, $header)) {
            echo "Email successfully sent to $to_email...";
        } else {
            echo "Email sending failed...";
        }
?>
        <script>
            window.location = "<?php echo '/idea/alert.php' ?>";
        </script>
    <?php
    } else {
        echo "<script>alert('Failed'); </script>";
    }
}

if (isset($_POST['edit'])) {
    $id = $_POST['update_id'];
    $category = $_POST['owner'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $payment = $_POST['payment'];
    $time = $_POST['time'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $des = $_POST['comment'];
    $updatequery = "update alert set contact_category='$category', name='$name', email='$email',payment='$payment',time='$time',date='$date',status='$status', description='$des' where id='$id'";
    $uquery = mysqli_query($conn, $updatequery);
    if ($uquery) {
    ?>
        <script>
            window.location = "<?php echo '/idea/alert.php' ?>";
        </script>


    <?php

    } else {
    ?>
        <script>
            alert('Update Failed');
        </script>

<?php
    }
}
?>