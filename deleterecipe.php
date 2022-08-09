<?php
    include 'connection.php';
    if(isset($_POST['delete']))
    {
        $del_id=$_POST['deleteid'];
        $select="delete from recipe where recipe_name='$del_id'";
        
        // $row=mysqli_fetch_assoc($select);
        // $name=$row['recipe_name'];
        // echo $name;
        // $sql="delete from recipe where recipe_name='$name'";
         mysqli_query($conn,$select);
        ?>
        <script>
             window.location = "<?php echo $app_url.'/recipe.php' ?>";
        </script>
        <?php
    }
    
?>