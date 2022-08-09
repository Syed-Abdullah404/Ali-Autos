<?php

    $id=$_GET['idc'];
    $query=mysqli_query($conn,"select * from customers where id='$id'");
    $row=mysqli_fetch_assoc($query);
    $profile=$row['picture'];
    $name=$row['name'];
    $business_name=$row['business_name'];
    $mobile=$row['mobile'];
    $cnic=$row['cnic'];
    $address=$row['address'];


?>
<div class="container">
    <div class="row my-5">
        <div class="col-md-4">
            <img src="<?php echo $profile; ?>" class="w-50 rounded-circle" />
        </div>
        <div class="col-md-4 text-center">
            <div class="my-2">
                <h5>Name</h5>
                <p><?php echo $name; ?></p>
            </div>
            <div class="my-2">
                <h5>Business Name</h5>
                <p><?php echo $business_name; ?></p>
            </div>
            <div class="my-2">
                <h5>NIC NO.</h5>
                <p><?php echo $cnic; ?></p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="my-2">
                <h5>Contact Number</h5>
                <p><?php echo $mobile; ?></p>
            </div>
            <div class="my-2">
                <h5>Current Address</h5>
                <p><?php echo $address; ?></p>
            </div>
        </div>
    </div>
</div>