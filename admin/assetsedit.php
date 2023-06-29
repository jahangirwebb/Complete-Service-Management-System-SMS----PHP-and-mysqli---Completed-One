<?php
    define('TITLE', 'Add Product');
    include('includes/header.php');
    include('../connection.php');

    session_start();
    if(isset($_SESSION["is_adminlogin"])){
        $aEmail = $_SESSION['aEmail'];
    }else{
        header('location:login.php');
    }

if(isset($_REQUEST['id'])){
    $sql = "SELECT * FROM assets_tb WHERE product_id = {$_REQUEST['id']}";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
}
    

        // UPDATE CODE   | Updating Form Details

        if(isset($_REQUEST['f-update'])){ 
            if( ($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['pcostprice'] == "") || ($_REQUEST['psellprice'] == "") ){
    
                $msg = "<div class='alert alert-warning mt-4 ml-3'>Please Fill All Fields</div>";
            }else{
                $pid = $_REQUEST['pid'];
                $pname = $_REQUEST['pname'];
                $pdop = $_REQUEST['pdop'];
                $pava = $_REQUEST['pava'];
                $ptotal = $_REQUEST['ptotal'];
                $costprice = $_REQUEST['pcostprice'];
                $sellprice = $_REQUEST['psellprice'];

                $query = "UPDATE assets_tb SET product_name = '$pname', product_dop = '$pdop', product_avail = '$pava', product_total = '$ptotal', product_cost = '$costprice', sell_price = '$sellprice' WHERE product_id = '$pid'";

                $result = mysqli_query($connect, $query);
                if($result == TRUE){
                    $msg = "<div class='alert alert-success mt-4 ml-3'>Updated Successfully</div>";
                }else{
                    $msg = "<div class='alert alert-danger mt-4 ml-3'>Something went wrong</div>";
                }
            }
        }

  ?>

  <div class="jumbotron col-sm-6 mt-5 mx-5">
        <h3 class="text-center">Update Details</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label for="pid">Product ID</label>
                <input type="text" class="form-control" name="pid" autocomplete="off" value="<?php if(isset($row['product_id'])) {echo $row['product_id'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" class="form-control" name="pname" autocomplete="off" value="<?php if(isset($row['product_name'])) {echo $row['product_name'];} ?>">
            </div>
            <div class="form-group">
                <label for="pdop">Product DOP</label>
                <input type="text" class="form-control" name="pdop" autocomplete="off" value="<?php if(isset($row['product_dop'])) {echo $row['product_dop'];} ?>">
            </div>
            <div class="form-group">
                <label for="pava">Product Available</label>
                <input type="text" class="form-control" name="pava" autocomplete="off" value="<?php if(isset($row['product_avail'])) {echo $row['product_avail'];} ?>">
            </div>
            <div class="form-group">
                <label for="ptotal">Total Products</label>
                <input type="text" class="form-control" name="ptotal" autocomplete="off" value="<?php if(isset($row['product_total'])) {echo $row['product_total'];} ?>">
            </div>
            <div class="form-group">
                <label for="pcostprice">Product Cost Price</label>
                <input type="text" class="form-control" name="pcostprice" autocomplete="off" value="<?php if(isset($row['product_cost'])) {echo $row['product_cost'];} ?>">
            </div>
            <div class="form-group">
                <label for="sellprice">Product Sell Price</label>
                <input type="text" class="form-control" name="psellprice" autocomplete="off" value="<?php if(isset($row['sell_price'])) {echo $row['sell_price'];} ?>">
            </div>

            <div class="text-center">
                <button class="btn btn-danger" type="submit" name="f-update">Update</button>
                <a href="assets.php" class="btn btn-secondary">Close</a>
            </div>
            
            <?php if(isset($msg)){echo $msg;} ?>
        </form>
  
  </div>











  <?php
    include('includes/footer.php');
  ?>  