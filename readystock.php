<div class="container-fluid px-4">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
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
                                        <th> Operation</th>
                                                                               
                                      
                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                        $squery="select * from product where category='ready'";
                        $run=mysqli_query($conn,$squery);  
                        $i=0;                     
                        while($row=mysqli_fetch_assoc($run)){                          
                            $name=$row['name'];
                            $id=$row['id'];                                                      
                        ?>
     
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $name; ?></td>
                                
                                <td>
                                <?php
                                $sql=mysqli_query($conn,"select * from final_stock where name='$name'");
                                
                                while($rows=mysqli_fetch_assoc($sql)){   
                                  $product_name=$rows['name'];
                                  $quantity=$rows['quantity'];
                              
                                  ?>
                                   <?php echo $quantity; ?> 
                                   <br>
                                  
                                  <?php
                             
                     }?>
                              
                                </td>
                              
                                <td>
                                <button type="button" class="btn btn-success btn-sm editbtn">Edit Stock</button>
                              
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

<div class="container">
<div class="modal fade" id="editReadystockModal" tabindex="-1" role="dialog"
                            aria-labelledby="editReadystockLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editReadystockLabel">Edit Readystock</h5>
                                        
                                    </div>
                                    <form method="POST" class="p-3">
                                         <input type="hidden" name="update_id" id="update_id">
                                        <div class="mb-3">
                                                    <label for="namep" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" name="namep"  id="pname" readonly>               
                                         </div>
                                         <div class="mb-3">
                                                    <label for="quantity" class="form-label">Quantity</label>
                                                    <input type="text" class="form-control" name="quantity" id="quantity">               
                                         </div>
                  
                                         <a href="stock.php" type="button" class="btn btn-secondary " style="margin-left:310px; margin-top:5px;">Close</a>
                                        <button type="submit" class="btn btn-primary mt-1 float-end" name="edit">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>


</div>
            







            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


</div>

<script>
  $(document).ready(function(){
    $('.editbtn').on('click',function(){
      $('#editReadystockModal').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children('td').map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#pname').val(data[1]);
      $('#quantity').val(data[2]);
     
    });
  });

</script>

<?php

    include 'connection.php';

    if(isset($_POST['edit'])){
        $idp=$_POST['update_id'];
        $name=$_POST['namep'];
        $quantity=$_POST['quantity'];
        $updatequery="UPDATE `final_stock` SET `quantity`='$quantity' WHERE name='$name'";
        $uquery=mysqli_query($conn,$updatequery);
        if($uquery){
          ?>
          <script>
              window.location = "<?php echo $app_url.'/stock.php' ?>";
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