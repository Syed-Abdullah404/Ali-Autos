<table class="table " >
       
                <tr>
                <td>
                    <div class="col-md-6 bg-dark mx-auto"  >
                        
                    <img src="images/logo1.jpg" alt="" style="width:150px; height:150px; margin-left:0px;  margin-top:-10px;">
                    </div>
                    </td>
                   
                    <td>
                        <?php
                            $query=mysqli_query($conn,"select * from profile");
                            $row=mysqli_fetch_assoc($query);

                        ?>
                        <div class="col-md-6 mx-auto" style="margin-top:-40px;">
                            <h2 class="mt-5 text-center st" style="letter-spacing:0.5px;">" We Believe In Quality "</h2>
                            <h4 class="text-center"></h4>
                            <h6 class="text-center">Mobile No: <?php echo $row['mobile']; ?></h6>                           
                            <h6 class="text-center">Email: <?php echo $row['email']; ?></h6>
                            <h6 class="text-center">Date: ___________________________</h6>
                        </div>
                    </td>
                </tr>
            </table>