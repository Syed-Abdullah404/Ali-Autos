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
                                                                               
                                      
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                         $query_product=mysqli_query($conn,"select * from product where category='raw'");
                                         while($row_product=mysqli_fetch_assoc($query_product)){
                                           $product=$row_product['name'];
                                      
                                        $sql = "SELECT quantity FROM final_stock WHERE name='$product' ";
                                        $result = $conn->query($sql);
                                        
                                        if($result->num_rows > 0){
                                    
                                          $total=0;
                                          $i=1;
                                            while($row=mysqli_fetch_assoc($result)){
                                              
                                              $quantity=$row['quantity'];
                                              $total=$total+$quantity;
                                          
                                            }
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $product; ?></td>
                                                    <td><?php echo $total; ?></td>
                                                  
                                                    <!-- <td>
                                                       
                                                        <button type="button" class="btn btn-success btn-sm editbtn"><i class="fas fa-edit"></i></button>
                    
                                                        <input type="hidden" class="delete_id_value">

                                                         <a href="javascript:void(0)" type="button" class="delete_btn_ajax btn btn-sm btn-danger">
                                                             <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td> -->
                                                </tr>
                                         
                                        

                                    
                                </tbody>
                                <?php
      
    }
    
}?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>

<div class="container">
<div class="modal fade" id="editRawstockModal" tabindex="-1" role="dialog"
                            aria-labelledby="editRawstockLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editRawstockLabel">Edit Rawstock</h5>
                                        
                                    </div>
                                    <form method="POST" class="p-3">
                                         <input type="hidden" name="update_id" id="update_id">
                                        <div class="mb-3">
                                                    <label for="name" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" name="name"  id="namep">               
                                         </div>
                                         <div class="mb-3">
                                                    <label for="quantity" class="form-label">Quantity</label>
                                                    <input type="text" class="form-control" name="quantity" id="quan">               
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
      $('#editRawstockModal').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children('td').map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#namep').val(data[1]);
      $('#quan').val(data[2]);
     
    });
  });

</script>

<?php

    include 'connection.php';

    if(isset($_POST['edit'])){
        $idp=$_POST['update_id'];
        $name=$_POST['name'];
        $quantity=$_POST['quantity'];
        $updatequery="update stock set product_name='$name' , quantity='$quantity' where id='$idp'";
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