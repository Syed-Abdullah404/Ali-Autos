<?php 
session_start();
if(!isset($_SESSION['email'])){
    header('location:login.php');
   }
define("TITLE","Employee");
define("PAGE","Employee");
include 'connection.php';
include 'header.php';

?>
<style>
     label{
        margin-bottom:7px;
        font-weight:500;
        font-size:20px;
    }
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
                <h3 class="card-title mb-5 ">Account</h3>
                <!-- Button trigger modal -->
               
               <button type="button" class="btn btn-outline-success  mn" data-bs-toggle="modal" data-bs-target="#exampleModal" >
                  <i class="fas fa-plus"></i>  Pay Salary
                    </button>
                    <button type="button" class="btn btn-outline-primary  mn" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                  <i class="fas fa-gift"></i>  Bonus
                    </button>
                    <button type="button" class="btn btn-outline-danger  mn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                  <i class="fas fa-minus"></i>  Deduction
                    </button>
               
                 

          <div class="container mt-1">
   


    <hr>
              <div class="card-body table-responsive p-0">
              <div class="row py-3">
                                            <div class="col-md-8 d-flex justify-content-between">
                                                
                                                <div class="text-success">
                                                <?php
                                                       $id=$_GET['ids'];
                                                        $select="select * from salary where emp_id='$id'";
                                                        $runs=mysqli_query($conn,$select);
                                                        $rows=mysqli_fetch_assoc($runs);
                                                    ?>
                                                    <h5>PayAble Salary</h5>
                                                    <?php if(isset($rows['salary'])){
                                                            echo $rows['salary'];
                                                     }else{
                                                         echo '0';
                                                     }  ?>
                                                </div>
                                                <div class="text-danger">
                                                <?php
                                                    $id=$_GET['ids'];
                                                    $sql="select * from employee where id='$id'";
                                                    $res=mysqli_query($conn,$sql);
                                                    $data=mysqli_fetch_assoc($res);

                                                    //bonus
                                                    $sqli="select * from bonus where emp_id='$id'";
                                                    $resi=mysqli_query($conn,$sqli);
                                                    $data1=mysqli_fetch_assoc($resi);
                                                    if($data1){
                                                        $bonus=$data1['bonus'];
                                                    }
                                                    //deduction
                                                    $sqlde="select * from deduction where emp_id='$id'";
                                                    $resde=mysqli_query($conn,$sqlde);
                                                    $datade=mysqli_fetch_assoc($resde);
                                                    if($datade){
                                                        $deduct=$datade['deduction'];
                                                    }
                                                    


                                                    $salary=$data['salary'];
                                                    if(isset($rows['salary'])){
                                                        $pay=$rows['salary'];
                                                        $due=$salary - $pay;
                                                        if(isset($bonus)){
                                                            $bonus=$data1['bonus'];
                                                        }
                                                        
                                                        if(isset($deduct)){
                                                            if($bonus || $deduct){
                                                                $due1=($due+$bonus)-$deduct;
                                                            }else{
                                                                $due1=$due;
                                                            }
                                                        }
                                                        
                                                        
                                                    }else{
                                                        $due1=$salary;
                                                    }
                                                   
                                                    
                                                     ?>
                                                    <h5>DueAble</h5>
                                                    <?php 
                                                    if(isset($due1))
                                                    {
                                                      echo $due1 ;
                                                     }else{
                                                         echo '';
                                                     }
                                                       ?>
                                                    
                                                </div>
                                                <div style="color:purple;">
                                                <?php
                                                    $id=$_GET['ids'];
                                                    $sql="select * from bonus where emp_id='$id'";
                                                    $res=mysqli_query($conn,$sql);
                                                    $data=mysqli_fetch_assoc($res);
                                                    if($data){
                                                        $bonus=$data['bonus'];
                                                    }
                                                    
                                                    
                                                     ?>
                                                    <h5>Bonus</h5>
                                                    <?php 
                                                    if(isset($bonus))
                                                    {
                                                      echo $bonus ;
                                                     }else{
                                                         echo '';
                                                     }
                                                       ?>
                                                </div>
                                                <div class="text-primary">
                                                <?php
                                                    $id=$_GET['ids'];
                                                    $sqld="select * from deduction where emp_id='$id'";
                                                    $resd=mysqli_query($conn,$sqld);
                                                    $datad=mysqli_fetch_assoc($resd);
                                                    if($datad){
                                                        $deduction=$datad['deduction'];
                                                    }
                                                    
                                                    
                                                     ?>
                                                    <h5>Deduction</h5>
                                                    <?php 
                                                    if(isset($deduction))
                                                    {
                                                      echo $deduction ;
                                                     }else{
                                                         echo '';
                                                     }
                                                       ?>
                                                </div>
                                                <div>
                                               
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4 justify-content-between">
                                                <input type="date" class="form-control">
                                            </div> -->
                                        </div>
                    <table id="table" class="table table-bordered pt-2">
                    <thead class="table-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Salary</th>
                                                    <th>Type</th>
                                                    <th>Date</th>

                                                </tr>
                                            </thead>
                                            <tbody class="table-light">
                                            <?php
                                                    
                                                    $id=$_GET['ids'];
                                                    $selectq="select * from employee where id='$id'";
                                                    $runq=mysqli_query($conn,$selectq);
                                                    while($rowq=mysqli_fetch_assoc($runq)){
                                                ?>
                                                     <tr>
                                                    <td><?php echo $rowq['id'] ?></td>
                                                    <td><?php echo $rowq['salary'] ?></td>
                                                    <td><?php echo $rowq['paying_term'] ?></td>
                                                    <td><?php echo $rowq['date'] ?></td>
                                                    
                                                    
                                                    
                                                </tr>
                                                <?php
                                                    }

                                                    ?>
                                            </tbody>
                    </table>
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


<!-- Modal salry-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Salary</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="addPaysalary" method="POST">
                                        <div class="modal-body">
                                                
                                        

                                        <div class="form-group">
                                                <label for="salary">Salary</label>
                                                <input type="text" class="form-control" placeholder="Salary"
                                                    name="salary" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" placeholder="Date"
                                                    name="date" required>
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
      
    </div>
  </div>
</div>


<!--  Modal  bonus-->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModal1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal1Label">Add Bonus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="addBonus" method="POST">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" placeholder="Date"
                                                    name="bdate" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="bonus">Bonus</label>
                                                <input type="number" class="form-control" placeholder="Bonus"
                                                    name="bonus" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="addBonus">Add</button>
                                        </div>
                                    </form>
          
       </div>
                            </div>
                        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- bonus Modal END -->

<!--  Modal  deduction-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal2Label">Deduction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="addDeduction" method="POST">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" placeholder="Date"
                                                    name="ddate" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="deduction">Deduction Amount</label>
                                                <input type="number" class="form-control"  placeholder="Salary"
                                                    name="deduction" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="adddeduction">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- deduction Modal END -->


 <script>
  $(document).ready(function(){
    $('.editbtn').on('click',function(){
      $('#myModalEdit').modal('show');

      $tr=$(this).closest('tr');

      var data=$tr.children('td').map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      $('#update_id').val(data[0]);
      $('#name').val(data[1]);
      $('#short').val(data[2]);
      $('#status').val(data[3]);
    });
  });

</script>
<?php 
include 'footer.php';
//pay salary

if(isset($_POST['add'])){
    $sid=$_GET['ids'];
    $date=$_POST['date'];
    $salary=$_POST['salary'];

    $sql="insert into salary (salary,date,emp_id) values('$salary','$date','$sid')";
    $run=mysqli_query($conn,$sql);

    if($run){
        ?>
            <script>
              window.location = "<?php echo $app_url.'/salary.php?ids='."$sid" ?>";
          </script>
        <?php
    }else{
        echo "<script>alert('Not Inserted'); </script>";
    }
}

    
//bonus
if(isset($_POST['addBonus'])){
    $sid=$_GET['ids'];
    $date=$_POST['bdate'];
    $bonus=$_POST['bonus'];

    $sqlb="insert into bonus (date,bonus,emp_id) values('$date','$bonus','$sid')";
    $runb=mysqli_query($conn,$sqlb);

    if($runb){
        ?>
        <script>
          window.location = "<?php echo $app_url.'/salary.php?ids='."$sid" ?>";
      </script>
    <?php
    }else{
        echo "<script>alert('Not Inserted'); </script>";
    }
}

//deduction
if(isset($_POST['adddeduction'])){
    $sid=$_GET['ids'];
    $date=$_POST['ddate'];
    $deduction=$_POST['deduction'];

    $sqld="insert into deduction (deduction,date,emp_id) values('$deduction','$date','$sid')";
    $rund=mysqli_query($conn,$sqld);

    if($rund){
        ?>
        <script>
          window.location = "<?php echo $app_url.'/salary.php?ids='."$sid" ?>";
      </script>
    <?php
    }else{
        echo "<script>alert('Not Inserted'); </script>";
    }
}

?>