<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Dashboard");
define("PAGE","Dashboard");
include 'connection.php';
include 'header.php';

?>
<style>
    .mm{
        margin-top:150px;
    }
    .mn{
        margin-top:-40px;
    }
</style>


<div class="body-section">
    
<div class="container ">
         <div class="card mm">
              <div class="card-header border-0">
                <h3 class="card-title">Stock</h3>
                <!-- Button trigger modal -->
               
                 
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive ">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-readystock-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-readystock"
                                                    type="button" role="tab" aria-controls="pills-readystock"
                                                    aria-selected="true">Ready Stock</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-rawstock-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-rawstock" type="button" role="tab"
                                                    aria-controls="pills-rawstock" aria-selected="false">Raw
                                                    Stock</button>
                                            </li>



                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-readystock" role="tabpanel"
                                                aria-labelledby="pills-readystock-tab">
                                                <?php include 'readystock.php'; ?>
                                            </div>

                                            <div class="tab-pane fade" id="pills-rawstock" role="tabpanel"
                                                aria-labelledby="pills-rawstock-tab">
                                                <?php include 'rawstock.php'; ?>
                                            </div>


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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Recipe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="cart" >
      <input type="hidden" name="update_id" id="update_id">
	<table name="cart table  responsive text-center">
		<div class="row text-center mx-auto" >
		<div class="col-xl-6 mt-2">
		<div class="form-group " style="display: inline;">
        
    <input type="text" class="form-control" name="unique_id" id="unique" placeholder="Recipe Product Name" required >
</div>
</div>




</div><br>
<tr style="margin-bottom: 20px;">
			<td colspan="99" class="mb-3"><button class="row-add btn btn-primary px-3 float-end">Add  </button></td>
		</tr>
		<tr class="mt-5"> 
			<td>&nbsp;</td>
			<th><label for=""> Product_Name</label></th>
			<th><label for="">Quantity</label></th>
		
		</tr>
	<tr class="line_items text-center " style="margin-top:5px;">
			<td><button class="row-remove btn btn-danger " style=" margin-right:20px">Remove</button></td>
			 <td> <select class="form-control product_name" style="    margin-top: 11px;"   required="">
				<option value="">Select Product_Name</option>  
                <?php
          $sql=mysqli_query($conn,"select * from items");
          while($row=mysqli_fetch_assoc($sql)){
           ?>
            <option value="<?php echo $row['item_name']; ?>"><?php echo $row['item_name']; ?></option>
           <?php
          }

          ?>
			  </select></td>
			 
			  <input type="hidden" class="form-control bill_id assign_id"  value="">
			 
			 
			<td><input type="number" class="form-control quantity_name" style=" margin-left:5px  ; margin-top: 11px;" name="qty" value="" placeholder="Add Quantity" required></td>
			
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			
		</tr>
       
	
	
		
	<tr>
			<td colspan="99">
                <button type="submit" style="margin-top:16px;" class="btn btn-success p-2">Submit </button>
            </td>
		</tr>
	</table>
</form>
      </div>
      
    </div>
  </div>
</div>
       >



<?php 
include 'footer.php';

    if(isset($_POST['add'])){
        $name=$_POST['pname'];
        $quantity=$_POST['quantity'];

        $query=mysqli_query($conn,"update final_stock set quantity='$quantity' where name='$name'");
        if($query){
            ?>
            <script>
                window.location = "<?php echo $app_url.'/stock.php' ?>";
            </script>
          
            <?php
        }
    }
?>