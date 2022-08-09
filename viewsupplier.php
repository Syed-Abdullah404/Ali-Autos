<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Supplier");
define("PAGE","Supplier");
include 'connection.php';
include 'header.php';

?>
<style>
    .mm{
        margin:-20px;
       
    }
    .mn{
        margin-top:-40px;
    }
</style>

<div class="body-section">
<div class="container">
         <div class="card mm">
              <div class="card-header border-0">
                <h3 class="card-title">Supplier View</h3>
                <!-- Button trigger modal -->
                 <a href="supplier.php" type="button" class="btn btn-primary float-end mn">
                  <i class="fas fa-eye"></i>  Purchase
                </a>
               
          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive p-2">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-home-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                                    role="tab" aria-controls="pills-home" aria-selected="true">Contact
                                                    Info.</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-ledger-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-ledger" type="button" role="tab"
                                                    aria-controls="pills-ledger" aria-selected="false">Ledger</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-buying-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-buying" type="button" role="tab"
                                                    aria-controls="pills-buying" aria-selected="false">Purchasing</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-payment-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-payment" type="button" role="tab"
                                                    aria-controls="pills-payment" aria-selected="false">Payment</button>
                                            </li>
                                            
                
            </ul>
                    <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab">
                                                <?php include 'Scontactinfo.php'; ?>
                                            </div>

                                            <div class="tab-pane fade" id="pills-ledger" role="tabpanel"
                                                aria-labelledby="pills-ledger-tab">
                                                <?php include 'Sledger.php'; ?>
                                            </div>
                                            <div class="tab-pane fade" id="pills-buying" role="tabpanel"
                                                aria-labelledby="pills-buying-tab">
                                                <?php include 'Spurchasing.php'; ?>
                                            </div>
                                            <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                                aria-labelledby="pills-payment-tab">
                                                <?php include 'Spayment.php'; ?>
                                            </div>
                                           

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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="addSuplier" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="suplierName">Supplier Name</label>
                                                <input type="text" class="form-control" id="suplierName"
                                                    placeholder="Suplier Name" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email Address</label>
                                                <input type="email" class="form-control" 
                                                    placeholder="Email Address" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pic">Image Upload</label>
                                                <input type="file" class="form-control" 
                                                    placeholder="Suplier image" name="pic" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bName">Business name</label>
                                                <input type="text" class="form-control" id="bName"
                                                    placeholder="Bussiness Name" name="bname" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierIdcard">Id Card No</label>
                                                <input type="text" class="form-control" id="suplierIdcard"
                                                    placeholder="Id Card No" name="cnic" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierphone">Phone Number</label>
                                                <input type="phone" class="form-control" id="suplierphone"
                                                    placeholder="phone Number" name="mobile" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierAddress">Current Address</label>
                                                <input type="text" class="form-control" id="suplierAddress"
                                                    placeholder="Current Address" name="address" required>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="add">Add</button>
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
      <form id="editSuplier" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="update_id" id="update_id">
                                        <div class="modal-body">
                                        <div class="form-group">
                                                <label for="suplierName">Supplier Name</label>
                                                <input type="text" class="form-control" id="name"
                                                    placeholder="Suplier Name" name="sname" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="suplierbName">Business name</label>
                                                <input type="text" class="form-control" id="bname"
                                                    placeholder="Bussiness Name" name="bname" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierIdcard">Id Card No</label>
                                                <input type="text" class="form-control" id="card"
                                                    placeholder="Id Card No" name="nic" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierphone">Phone Number</label>
                                                <input type="phone" class="form-control" id="phone"
                                                    placeholder="phone Number" name="cell" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="suplierAddress">Current Address</label>
                                                <input type="text" class="form-control" id="address"
                                                    placeholder="Current Address" name="address" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                        </div>
                                    </form>
      </div>
      
    </div>
  </div>
</div>
<!-- Edit Modal END -->


 
<?php 
include 'footer.php';

?>