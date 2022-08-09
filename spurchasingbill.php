
<div class="container-fluid px-4">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <?php 
            include 'header.php';
            include 'connection.php';
        include 'billheader.php'; ?>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">

                        </div>
                        <div class="card-body table-responsive">
                            <table id="dataTable" class="table">
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

                                        $id=$_GET['id'];
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
<script>
    window.print();
</script>