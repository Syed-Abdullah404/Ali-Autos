<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('location:login.php');
}
include 'connection.php';
define("TITLE", "Recipe");
define("PAGE", "Recipe");
include 'header.php';
?>
<style>
  .mm {
    margin-top: 80px;
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-12 mm">
      <h2 class="ml-3">Recipe</h2>
      <!-- <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-top:-40px;">
                <i class="fas fa-plus"></i> Add Recipe 
            </button> -->
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Recipe</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="cart">
                <input type="hidden" name="update_id" id="update_id">
                <table name="cart table  responsive text-center">
                  <div class="row text-center mx-auto">
                    <div class="col-xl-6 mt-2">
                      <div class="form-group " style="display: inline;">

                        <input type="text" class="form-control" name="unique_id" id="unique" placeholder="Recipe Product Name" required>
                      </div>
                    </div>




                  </div><br>
                  <tr style="margin-bottom: 20px;">
                    <td colspan="99" class="mb-3"><button class="row-add btn btn-primary px-3 float-end">Add </button></td>
                  </tr>
                  <tr class="mt-5">
                    <td>&nbsp;</td>
                    <th><label for=""> Product_Name</label></th>
                    <th><label for="">Quantity</label></th>

                  </tr>
                  <tr class="line_items text-center " style="margin-top:5px;">
                    <td><button class="row-remove btn btn-danger " style=" margin-right:20px">Remove</button></td>
                    <td> <select class="form-control product_name" style="    margin-top: 11px;" required="">
                        <option disabled>Select Product_Name</option>
                        <?php
                        $sql = mysqli_query($conn, "select * from items group by item_name");
                        while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                          <option value="<?php echo $row['item_name']; ?>"><?php echo $row['item_name']; ?></option>
                        <?php
                        }

                        ?>
                      </select></td>

                    <input type="hidden" class="form-control bill_id assign_id" value="">


                    <td><input type="number" step="any" class="form-control quantity_name" style=" margin-left:5px  ; margin-top: 11px;" name="qty" value="" placeholder="Add Quantity" required></td>

                  </tr>
                  <tr>
                    <td colspan="3">&nbsp;</td>

                  </tr>



                  <div class="modal-footer">
                    <tr>
                      <td colspan="99">
                        <button type="button" style="margin-top:16px;" class="btn btn-success p-2">Submit </button>
                      </td>
                    </tr>
                    <div>
                </table>
              </form>
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
            <th>ID</th>
            <th>Recipe Name</th>
            <th>Product Detail</th>
            <th>Operations</th>
          </tr>
        </thead>
        <tbody class="table-light">
          <?php
          $squery = "select * from product where category='ready'";
          $run = mysqli_query($conn, $squery);
          $i = 0;
          while ($row = mysqli_fetch_assoc($run)) {
            $name = $row['name'];
            $id = $row['id'];
          ?>

            <tr>
              <td><?php echo $id; ?></td>
              <td><?php echo $name; ?></td>

              <td>
                <?php
                $sql = mysqli_query($conn, "select * from recipe where recipe_name='$name'");

                while ($rows = mysqli_fetch_assoc($sql)) {
                  $product_name = $rows['item_name'];
                  $quantity = $rows['quantity'];

                ?>
                  <label class="fw-normal text-danger">Product:</label> <?php echo $product_name; ?> <label class="fw-normal text-primary">, Quantity: </label> <?php echo $quantity; ?>
                  <br>

                <?php

                } ?>

              </td>

              <td>
                <button type="button" class="btn btn-success btn-sm mbtn">Add Recipe</button>
                <!-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
                                <i class="fas fa-plus"></i> Add Recipe 
                            </button> -->
                <button class="btn btn-sm btn-danger deletebtn">Delete</button>
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
<!-- //delete Modal/.. -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="deleterecipe.php" method="POST">
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
  $(document).ready(function() {
    $('.deletebtn').on('click', function() {
      $('#deleteModal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      $('#deleteid').val(data[1]);

    });
  });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $(function() {

    function autoCalcSetup() {
      $('form#cart').jAutoCalc('destroy');
      $('form#cart tr.line_items').jAutoCalc({
        keyEventsFire: true,
        decimalPlaces: 2,
        emptyAsZero: true
      });
      $('form#cart').jAutoCalc({
        decimalPlaces: 2
      });
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


    let uniqid = $('#unique').val();
    console.log(uniqid);
    $('.assign_id').val(uniqid);




    var product_name = [];
    var quantity_name = [];
    var bill_id = [];


    $('.product_name').each(function() {

      product_name.push({
        value: this.value
      })
    });
    $('.quantity_name').each(function() {

      quantity_name.push({
        value: this.value
      })
    });

    $('.bill_id').each(function() {

      bill_id.push({
        value: this.value
      })
    });

    $.ajax({
      url: "ajaxrecipe.php?price_form",
      type: "POST",
      data: {
        product_name: product_name,
        quantity_name: quantity_name,
        bill_id: bill_id
      },
      success: function(data) {
        console.log(data);
        let response = JSON.parse(data);
        // $('#cart').trigger("reset");
        if (response.status == "success") {
          swal({
            title: "Success!",
            text: "Good job.",
            type: "success",
            timer: 5000,
            showConfirmButton: true
          }, function() {

            window.location.href = "recipe.php";

          });
        }
      },

    });
  });
</script>


<script>
  $(document).ready(function() {
    $('.mbtn').on('click', function() {
      $('#myModal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children('td').map(function() {
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#unique').val(data[1]);

    });
  });
</script>