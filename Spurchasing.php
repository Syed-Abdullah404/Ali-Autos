
<div class="container-fluid px-4">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <table>
  <tr>
  <?php

$id=$_GET['idsupplier']; ?>
    <td><a href="spurchasingbill.php?id=<?php echo $id; ?>" class="btn btn-sm btn-success mt-3 mb-2">Print </a></td>
  </tr>
  </table>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">

                        </div>
                        <div class="card-body table-responsive">
                            <table id="dataTable" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bill Number</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>cost per Product</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $id=$_GET['idsupplier'];
                                        $sql=mysqli_query($conn,"select * from supplier where id='$id'");
                                        $row=mysqli_fetch_assoc($sql);
                                        $name=$row['name'];


                                        $select=mysqli_query($conn,"select * from items where supplier='$name'");
                                        $i=0;
                                        while($rows=mysqli_fetch_assoc($select)){
                                            
                                       $i++;

                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rows['bill_id']; ?></td>
                                        <td><?php echo $rows['quantity']; ?></td>
                                        <td><?php echo $rows['quantity']; ?></td>
                                        <td><?php echo $rows['price']; ?></td>
                                        <td><?php echo $rows['date']; ?></td>
                                       

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








            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


</div>