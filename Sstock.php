<div class="container-fluid px-4">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
<table>
  <tr>
    <?php
        $id=$_GET['idsupplier']; ?>
        <td><a href="sStockbill.php?id=<?php echo $id; ?>" class="btn btn-sm btn-success mt-3 mb-2">Print </a></td>
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
                                         <th>Product Name</th>
                                         <th>Quantity</th>
                              
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $id=$_GET['idsupplier'];
                                        $query=mysqli_query($conn,"select * from supplier where id='$id'");
                                        $row=mysqli_fetch_assoc($query);
                                        $name=$row['name'];

                                        $sql=mysqli_query($conn,"select * from stock where supplier_name='$name'");
                                        $i=0;
                                       while($row=mysqli_fetch_assoc($sql)){
                                           $i++;
                                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['quantity']; ?></td>                     

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