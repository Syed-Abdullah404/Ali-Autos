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
        <?php 
            include 'header.php';
            include 'connection.php';
        include 'billheader.php'; ?>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                       
                        <div class="card-body table-responsive">
                            <table id="dataTable" class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id=$_GET['id'];
                                    $query=mysqli_query($conn,"select * from supplier where id='$id'");
                                    $row=mysqli_fetch_assoc($query);
                                    $profile=$row['picture'];
                                    $name=$row['name'];

                                        $sql=mysqli_query($conn,"select * from supplier_remaining_pay where supplier='$name'");
                                        $i=0;
                                            while($rows=mysqli_fetch_assoc($sql)){
                                                $i++;

                                            
                                        ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $rows['pay']; ?></td>
                                        <td><?php echo $rows['description']; ?></td>
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

   <script>
       window.print();
   </script>



  