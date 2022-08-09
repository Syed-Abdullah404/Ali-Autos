<?php
define("TITLE","Employee");
define("PAGE","Employee");
include 'connection.php';
include 'header.php';
    
    $id=$_GET['ids'];
    $select="select * from employee where id='$id'";
    $run=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($run);

?>
<style>
    label{
        font-size:18px;
        font-weight:500;
    }
</style>

                    <div class="container" style="margin-top:140px;">
                        <h3>Employee Edit</h3>
                        <div class="row">
                        <div class="col-md-8">
                            <table class="table">
                               
                            <form action="" method="post">
                                <tr>
                                    <td>
                                       
                                        <label    >Name</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $row['emp_name']; ?>">
                                    </div>
                                    </td>
                                    <td>
                                    <div class="mb-3">
                                        <label    >CNIC</label>
                                        <input type="number" name="cnic" class="form-control" value="<?php echo $row['cnic']; ?>">
                                    </div>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="mb-3">
                                        <label    >Phone No</label>
                                        <input type="number" name="phone" class="form-control" value="<?php echo $row['mobile']; ?>">
                                    </div>
                                    </td>
                                    <td>
                                    <div class="mb-3">
                                        <label    >Current Address</label>
                                        <textarea name="address"  class="form-control"> <?php echo $row['address']; ?> </textarea>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="mb-3">
                                        <label    >Contract</label>
                                        <input type="text" name="contract" class="form-control" value="<?php echo $row['contract']; ?>">
                                    </div>
                                    </td>
                                    <td>
                                    <div class="mb-3">
                                        <label    >Contract Type</label>
                                        <input type="text" name="ctype" class="form-control" value="<?php echo $row['paying_term']; ?>">
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <div class="mb-3">
                                        <label    >Joining Date</label>
                                        <input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>">
                                    </div>
                                    </td>
                                </tr>
                               
                            </table>
                            <button type="submit" class="btn btn-primary mx-5" name="submit">Edit</button>
                            <a href="employee.php" type="button" class="btn btn-success mx-5" name="submit"> Back </a>
                        </form>
                        </div>  
                            
                           
                            

                            
                            

                           
                            
                            

                            
                           


                            
                           
                            <!-- /.col-md-6 -->
                        </div>


                      <!-- /.container-fluid -->
                </div>
                <!-- /.content -->


            </div>
        

<?php
    if(isset($_POST['submit'])){
        $idy=$_GET['ids'];
        $name=$_POST['name'];
       
        $cnic=$_POST['cnic'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $contract=$_POST['contract'];
        $type=$_POST['ctype'];
        $date=$_POST['date'];

        $sql="update employee set emp_name='$name',cnic='$cnic',mobile='$phone',address='$address',contract='$contract',paying_term='$type',date='$date' where id='$idy' ";
        $run=mysqli_query($conn,$sql);
        if($run){
           ?>
           <script>
               window.location = "<?php echo $app_url.'/employee.php' ?>";
           </script>
           
           <?php    
        }else{
            echo "no";
        }

    }
?>
