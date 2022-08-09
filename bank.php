<?php


$username="root";
$password="";
$server="localhost";
$database="kainat";

$conn=mysqli_connect($server,$username,$password,$database);
$app_url="http://localhost/htdocs/ali-haider-new";
// if($conn){
//     echo "<script>alert('connection') </script> ";
// }

define("TITLE","Sale");
define("PAGE","Sale");
include 'header.php';
?>

<div class="body-section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mm">
              <h2 class="ml-3">Sale</h2>
            <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-top:-40px;">
                <i class="fas fa-plus"></i> Add Sale 
            </button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Sale</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="cart">
	<table name="cart table  responsive text-center">
		<div class="row text-center mx-auto" >
		<div class="col-xl-3 mt-2">
		<div class="form-group " style="display: inline;">
        <?php

      $query=mysqli_query($conn,"select * from sale_items");
      while($row=mysqli_fetch_assoc($query)){
        $ids=$row['bill_id'];
        $ids++;
      }

?>
    <input type="text" class="form-control" name="unique_id" id="unique" placeholder="Bill No" value="<?php 
      if($ids){
        echo $ids;  
      }else{
        echo '0001';
      }
     ?>" readonly>
</div>
</div>
<div class="col-xl-3 mt-2">
		<div class="form-group mx-3" >
			<select class="form-control " name="sup_name" id="name_suppler"  required="">
			  <option value="">Select</option>  
			  <?php
          $sqls=mysqli_query($conn,"select * from customers");
          while($rows=mysqli_fetch_assoc($sqls)){
           ?>
            <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
           <?php
          }

          ?>
          </select>
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
			<th>Price</th>
			<th></th>
			<th style=" margin-left:20px"><label for=""> Total_Price</label></th>
		</tr>
		<tr class="line_items text-center " style="margin-top:5px;">
			<td><button class="row-remove btn btn-danger " style=" margin-right:20px">Remove</button></td>
			 <td> <select class="form-control product_name" style="    margin-top: 11px;"   required="">
				<option value="">Select Product_Name</option>  
                <?php
                                       $sql=mysqli_query($conn,"select * from products");
                                       while($row=mysqli_fetch_assoc($sql)){
                                        ?>
                                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                    <?php
                                       }
                                       
                                       ?>
			  </select></td>
			  <input type="hidden" class="form-control sup_name assign"  value="">
			  <input type="hidden" class="form-control bill_id assign_id"  value="">
			  <input type="hidden" class="form-control status assign_status"  value="">
			  <input type="hidden" class="form-control grand assign_grand"  value="">
        <input type="hidden" class="form-control final assign_final"  value="">
        <input type="hidden" class="form-control wht assign_wht"  value="">
        <input type="hidden" class="form-control method assign_method"  value="">
        <input type="hidden" class="form-control bank assign_bank"  value="">

			<td><input type="number" step="any" class="form-control quantity_name" style="    margin-top: 11px;" name="qty" value=""></td>
			<td><input type="number" step="any" class="form-control price_name" style="    margin-top: 11px;" name="price" value=""></td>
			<td>&nbsp;</td>
			<td><input type="text"  class="form-control tprice_name" style="    margin-top: 11px;" name="item_total" value="" jAutoCalc="{qty} * {price}"></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<th><label for="">Total</label></th>
			<td>&nbsp;</td>
			<td><input type="text"  class="form-control" id="sub" name="sub_total" value="" jAutoCalc="SUM({item_total})"></td>
		</tr>
       
    
    <tr>
    <td colspan="3">&nbsp;</td>
			<th><label for="">Remaining</label></th>
			<td>&nbsp;</td>
			<td>  <input type="text" name="rempay" id="rempay" class="form-control" value="" jAutoCalc="({sub_total} - {paid_unpaid})" readonly></td>
    </tr>

    

    <tr>
      <td>  
        <br>
      <label class="fw-bold">&nbsp;&nbsp;&nbsp;&nbsp; Payment </label>   
          <select class="form-control mx-auto" name="status" id="status_id"  required="">           
            <option value="paid">Paid</option>
            <option value="unpaid" selected>UnPaid</option>

          </select>    
      </td>
      
      <td>  
        <br>
      <label class="fw-bold">&nbsp;&nbsp;&nbsp;&nbsp; Payment Method </label>   
          <select class="form-control mx-auto" name="payment" id="payment_method"  required="">           
            <option value="cash">Cash</option>
            <option value="bank">Bank</option>

          </select>    
      </td>

      <td><br>
      <label class="fw-bold">&nbsp;&nbsp;&nbsp;&nbsp; Bank </label> 
                                 <select class="form-control  mx-auto" name="bank" id="bank">
                                    <option value="">If Bank</option>
                                    <option value="ubl">UBL</option>
                                    <option value="hbl">HBL</option>
                                 </select>
                              </td>

      <td>
      <br>
      <label class="fw-bold">&nbsp;&nbsp; if paid</label> 
      <input type="number" step="any" class="form-control mx-2" name="paid_unpaid" id="paid_id" placeholder="Enter Amount if paid" value="0">
      </td>
      
    </tr>
	
		
	<tr>
			<td colspan="99"><button type="submit"  style=" margin-top: 16px;" class="btn btn-success p-2">Submit </button></td>
		</tr>
	</table>
</form>
      </div>
      
    </div>
  </div>
  </div>
</div>
            </div>
        </div>
    </div>
    <div class="container">
                <div class="row">
                    <div class="col-md-12 p-5">
                  <table id="example" class="table table-bordered">
                    
                    <thead class="table-dark">

                      <tr>
                        
                        <th>Bill No</th>
                        <th>Customer</th>
                        <th>Product Detail</th>
                        <th>Paid</th>
                        <th>Remaining</th>
                        <th>GST Tax Total</th>
                        <th>WHT Tax Total</th>
                        <th>Status</th>
                        <th>Total</th>                        
                        <th>Delete</th>
                      </tr>
                      </thead>
                      <tbody class="table-light">
                      

                        
                </tbody>
                </table>
                </div>
</div>

  </div>
<!-- //delete Modal/.. -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="deletesale.php" method="POST">
          <input type="hidden" name="deleteid" id="deleteid">
        <img src="https://media.istockphoto.com/vectors/danger-warning-exclamation-point-sign-icon-vector-id613052742?k=20&m=613052742&s=612x612&w=0&h=fuyR_B8kaU0q2nh9R7jd36aDLXMyK9jICgLElu2qdck=" alt="" style="width:150px; height:150px; margin-left:150px;">
        <h4 class="mt-3">Are You Sure To delete This Data !!!</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> No </button>
        <button type="submit" name="delete" class="btn btn-danger">Yes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
  include 'footer.php';
?>


 

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jautocalc@1.3.1/dist/jautocalc.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<script>
  //  function getAmount(){
  //   var value = $('#sub').val();
  //   var percent = $('#discount').val();
  //   var discount=value - ((value * percent)/100);
  //   $('#grand').val(discount);
  // }

  // function getTotal(){
  //   var value = $('#grand').val();
  //   var vg=parseFloat(value);
  //   var percent = $('#gst').val();
  //   var vp=parseFloat(percent);
  //   var discountg=vg + ((vg * vp)/100);
  //   $('#final').val(discountg);
  // }
</script>
<script>
  $(document).ready(function(){
    $('.deletebtn').on('click',function(){
      $('#deleteModal').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children('td').map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      $('#deleteid').val(data[0]);
      
    });
  });

</script>
<script type="text/javascript">


	$(function() {

		function autoCalcSetup() {
			$('form#cart').jAutoCalc('destroy');
			$('form#cart tr.line_items').jAutoCalc({keyEventsFire: true, decimalPlaces: 2, emptyAsZero: true});
			$('form#cart').jAutoCalc({decimalPlaces: 2});
		}
		autoCalcSetup();
		$('button.row-remove').on("click", function(e) {
			e.preventDefault();

			var form = $(this).parents('form')
			$(this).parents('tr').remove();
			autoCalcSetup();

		});

		$('button.row-add').on("click", function(e) {
			e.preventDefault();

			var $table = $(this).parents('table');
			var $top = $table.find('tr.line_items').first();
			var $new = $top.clone(true);

			$new.jAutoCalc('destroy');
			$new.insertBefore($top);
			$new.find('input[type=text]').val('');
			autoCalcSetup();

		});

	});
	//-->


	$("#cart").on("submit", function(e) {
				e.preventDefault();
				let name=$('#name_suppler').val();
                    console.log(name);
              $('.assign').val(name);

			  let uniqid=$('#unique').val();
			  console.log(uniqid);
			  $('.assign_id').val(uniqid);

			  let status_bill=$("#status_id").val();
			  console.log(status_bill);
			  $('.assign_status').val(status_bill);
      
       
			  

			  let sub=$('#sub').val();
               console.log(sub);

			  let paid_bill=$('#paid_id').val();
			  console.log(paid_bill);

        let rempay=$('#rempay').val();
			  console.log(rempay);

              let payment_method=('#payment_method').val();
              console.log(payment_method);
              $('.assign_method').val(payment_method);

              let bank=('#bank').val();
              console.log(bank);
              $('.assign_bank').val(bank);


			  let n= sub - paid_bill;
			  console.log(n);

        var sup_name = [];
  var product_name = [];
  var quantity_name = [];
  var price_name = [];
  var tprice_name = [];
  var bill_id=[];
  var status=[];
  $('.sup_name').each(function(){
    sup_name.push({value: this.value});
  });
  $('.product_name').each(function(){
 
    product_name.push({value: this.value})
  });
  $('.quantity_name').each(function(){

    quantity_name.push({value: this.value})
  });
  $('.price_name').each(function(){
  
    price_name.push({value: this.value})
  });
  $('.tprice_name').each(function(){
 
    tprice_name.push({value: this.value})
  });
  $('.bill_id').each(function(){
 
	bill_id.push({value: this.value})
});
$('.status').each(function(){
 
 status.push({value: this.value})
});
				$.ajax({
					url: "bankajax.php?price_form",
					type: "POST",
					data: {sup_name:sup_name, product_name:product_name, quantity_name:quantity_name, price_name:price_name,tprice_name:tprice_name,bill_id:bill_id,status:status,name:name,uniqid:uniqid,status_bill:status_bill,sub:sub,paid_bill:paid_bill,rempay:rempay,payment_method:payment_method,bank:bank},
					success: function(data) {
						console.log(data);
							let response = JSON.parse(data);
							// $('#cart').trigger("reset");
            if(response.status=="success")
            {
              swal({
                    title: "Success!",
                    text: "Good job.",
                    type: "success",
                    timer: 50,
                    showConfirmButton: true
                  }, function(){
            window.location.href = "sale.php";
      });
            }
					},
        
				});
			});
</script>


