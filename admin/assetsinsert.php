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


    if(isset($_REQUEST['psubmit'])){ 
        if( ($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") || ($_REQUEST['pcostprice'] == "") || ($_REQUEST['psellprice'] == "") ){ 
            
            $msg = "<div class='alert alert-warning col-sm-6 mt-4 ml-3'>Please Fill All Fields</div>";
        }else{
            $p_name = $_REQUEST['pname'];
            $p_dop = $_REQUEST['pdop'];
            $p_ava = $_REQUEST['pava'];
            $p_total = $_REQUEST['ptotal'];
            $p_costprice = $_REQUEST['pcostprice'];
            $p_sellprice = $_REQUEST['psellprice'];

            $sql = "INSERT INTO assets_tb (product_name, product_dop, product_avail, product_total, product_cost, sell_price) VALUES ('$p_name', '$p_dop', '$p_ava', '$p_total', '$p_costprice', '$p_sellprice')";

            $result = mysqli_query($connect, $sql);

            if($result == TRUE){
                $msg = "<div class='alert alert-success col-sm-6 mt-4 ml-3'>Product Added Successfully</div>";
            }else{
                $msg = "<div class='alert alert-danger col-sm-6 mt-4 ml-3'>Product Added Successfully</div>";
            }
        }
    }
    
?>





<!-- Add Data Form --  Add Data Form  --  Add Data Form  -->

    <div class="col-sm-6 jumbotron mt-5 mx-5">
        <h3 class="text-center">Add New Product</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label for="pname">Product Name</label>
                <input type="text" class="form-control" name="pname" id="pname" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="pdop">Date of Purchase</label>
                <input type="date" class="form-control" name="pdop" id="pdop" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="pava">Available Products</label>
                <input type="text" class="form-control" name="pava" id="pava" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="ptotal">Total Products</label>
                <input type="text" class="form-control" name="ptotal" id="ptotal" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="pcostprice">Product Cost Price</label>
                <input type="text" class="form-control" name="pcostprice" id="pcostprice" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="psellprice">Product Cost Price</label>
                <input type="text" class="form-control" name="psellprice" id="psellprice" autocomplete="off">
            </div>

            <div class="text-center">
                <button class="btn btn-danger" type="submit" name="psubmit" id="psubmit">Submit</button>
                <a href="assets.php" class="btn btn-secondary">Close</a>
            </div>
            <?php  if(isset($msg)){ echo $msg; } ?>

        </form>
    </div>










<?php
    include('includes/footer.php');
?>