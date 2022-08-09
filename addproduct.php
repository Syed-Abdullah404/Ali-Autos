<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Products");
define("PAGE","Products");

include 'header.php';

?>


<div class="body-section">
<div class="container ">
         <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title">Products</h3>
                <hr>
      <div class="container mt-1">
      <form id="contact-form" class="studentform" method="POST">
                        <div class="row">
                            <div class="col-md-6 ">
                                <label for="exampleInputProduct" class="form-label">Product Name:</label>
                                <input type="text" class="form-control  " id="exampleInputProduct "
                                    name="product" placeholder="Product Name">
                            </div>
                            <div class="col-md-6 ">
                                <label for="exampleInputSKU" class="form-label">SKU:</label>
                                <input type="text" class="form-control  " id="exampleInputSKU "
                                    name="SKU" placeholder="SKU">
                            </div>
                            
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4 ">
                            
                            <label for="exampleInputBarcode" class="form-label">Barcode Type:</label>
                            <div class="input-group">
                            <select id="exampleInputBarcode" class="form-select" aria-describedby="button-addon2">
                                <option selected>Select Barcode Type</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                               
                               
                            </div>
                            </div>
                            <div class="col-md-4 ">
                            
                            <label for="exampleInputUnit" class="form-label">Unit:</label>
                            <div class="input-group">
                            <select id="exampleInputUnit" class="form-select" aria-describedby="button-addon2">
                                <option selected>Unit</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                               
                               <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#unitModal"><i class="fas fa-plus-circle"></i></button>
                            </div>
                                      <!-- Modal -->
                    <div class="modal fade" id="unitModal" tabindex="-1" aria-labelledby="unitModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                        <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="unitModalLabel">Add Unit</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                      <div class="modal-body">
                      <label for="exampleInputuname" class="form-label">Unit Name:</label>
                    <input type="text" class="form-control  " id="exampleInputuname "
                                    name="uname" placeholder="Unit Name">
                         
                        <label for="exampleInputsname" class="form-label">Short Name:</label>
                                <input type="text" class="form-control  " id="exampleInputsname "
                                    name="sname" placeholder="Short Name">

                        <label for="exampleInputdecimal" class="form-label">Allow Decimal:</label>
                            <select id="exampleInputdecimal" class="form-select">
                                <option selected>Select </option>
                                <option value="">Yes</option>
                                <option value="">No</option>
                                
                            </select>
                      </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                      </div>
                     </div>
                </div>
             </div>
    
                          
                            </div>
                            <div class="col-md-4 ">
                            
                            <label for="exampleInputBrand" class="form-label">Brand:</label>
                            <div class="input-group">
                            <select id="exampleInputBrand" class="form-select" aria-describedby="button-addon2">
                                <option selected>Brand</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                               
                               <button class="btn  btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#BrandModal"><i class="fas fa-plus-circle"></i></button>
                            </div>
                                      <!-- Modal -->
                    <div class="modal fade" id="BrandModal" tabindex="-1" aria-labelledby="BrandModalLabel" aria-hidden="true">
                       <div class="modal-dialog">
                        <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="BrandModalLabel">Add Brand</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                      <div class="modal-body">
                      <label for="exampleInputbname" class="form-label">Brand Name:</label>
                    <input type="text" class="form-control  " id="exampleInputbname "
                                    name="bname" placeholder="Brand Name">
                         
                        <label for="exampleInputsdes" class="form-label">Short Description:</label>
                                <input type="text" class="form-control  " id="exampleInputsdes "
                                    name="sdes" placeholder="Short Description">

                        
                      </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                      </div>
                     </div>
                </div>
             </div>
    
                          
                            
                            
                        </div>
    </div>
                        <div class="row mt-3">
                        <div class="col-md-4 ">
                            
                            <label for="exampleInputCatagories" class="form-label">Catagories:</label>

                            <select id="exampleInputCatagories" class="form-select">
                                <option selected>Catagories</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                               
                              
                            </div>
                            <div class="col-md-4 ">
                            
                            <label for="exampleInputSub-Catagories" class="form-label">Sub-Catagories:</label>

                            <select id="exampleInputSub-Catagories" class="form-select">
                                <option selected>Sub-Catagories</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                               
                              
                            </div>
                            <div class="col-md-4 ">
                                <label for="exampleInputAlter" class="form-label">Alter Quantity:</label>
                                <input type="text" class="form-control  " id="exampleInputAlter "
                                    name="alter" placeholder="Alter Quantity">
                            </div>

                        </div>
                        

                        <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="exampleInputpdes" class="form-label">Product Description:</label>
                            <div>
                            <textarea class="form-control"  id="exampleInputpdes" name="exampleInputpdes"
                              ></textarea>
                              <script>
                                  CKEDITOR.replace('exampleInputpdes');
                              </script>

                              </div>
                        </div>
                        </div>

                        <hr>
                        <div class="row mt-3">
                        <div class="col-md-4 ">
                            
                            <label for="exampleInputProduct " class="form-label">Product Type:</label>

                            <select id="exampleInputProduct " class="form-select">
                                <option selected>Single</option>
                                <option value="">Variable</option>
                                <option value="">Combo</option>
                             
                            </select>
                               
                              
                            </div>

                        </div>
                        <div class="row mt-3">
                        <div class="col-md-12 ">
                            
                        <table class="table table-bordered">
                            <tr class="th">
                                <th>Default Selling Price</th>
                                <th>x Margin(%)</th>
                                <th>Default Purchase Price</th>
                                <th>Product image</th>
                            </tr>
                            <tr>
                                <td>
                                <label for="exampleInputExc" class="form-label">Exc. Tax:</label>
                                <input type="text" class="form-control  " id="exampleInputExc "
                                    name="alter" placeholder="Exc. Tax">
                                </td>
                                <td>
                               
                                <input type="text" class="form-control mt-4"
                                    name="margin">
                                </td>
                                <td>
                                <label for="exampleInputExct" class="form-label">Exc. tax:</label>
                                <input type="text" class="form-control  " id="exampleInputExct "
                                    name="alter" placeholder="Exc. tax:">
                                    <label for="exampleInputInc" class="form-label">Inc. tax::</label>
                                <input type="text" class="form-control  " id="exampleInputInc "
                                    name="alter" placeholder="Inc. tax:">
                                </td>
                                <td>
                                <label for="formFileSm" class="form-label">Small file input example</label>
                                 <input class="form-control " id="formFileSm" type="file" />

                                 <p>Max File size: 5MB <br>
Aspect ratio should be 1:1</p>
                                 
                                </td>
                            </tr>

                        </table>
                            

                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-4">
                            <input type="submit" id="btn1" class="form-control  "
                                    name="saveandop" value="Save & Add Opening Stock">
                            </div>
                            <div class="col-lg-4">
                            <input type="submit" id="btn2" class="form-control  "
                                    name="saveandadd" value="Save & Add Another">
                            </div>
                            <div class="col-lg-4 ">
                            <input type="submit" id="btn3" class="form-control  " 
                                    name="save" value="Save">
                            </div>

                        </div>



    </div>

</from>


  
              <div class="card-body table-responsive p-0">
                
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






<?php 


include 'footer.php';

?>