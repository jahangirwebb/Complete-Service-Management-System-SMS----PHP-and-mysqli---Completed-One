<?php
define('TITLE', 'Sell Product');
include('includes/header.php');
include('../connection.php');

session_start();
if(isset($_SESSION["is_adminlogin"])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header('location:login.php');
}


if(isset($_REQUEST['f-submit'])){
    if( ($_REQUEST['customer_name'] == "") || ($_REQUEST['customer_add'] == "") || ($_REQUEST['pname'] == "") || ($_REQUEST['pava'] == "") || ($_REQUEST['quantity'] == "") || ($_REQUEST['priceeach'] == "") || ($_REQUEST['totalprice'] == "")|| ($_REQUEST['selldate'] == "")){
        $msg = "<div class='alert alert-warning mt-3 ml-3'>please fill all fields</div>";
    }else{
        $pid = $_REQUEST['pid'];
        $pava = $_REQUEST['pava'] - $_REQUEST['quantity'];

        $customer_name = $_REQUEST['customer_name'];
        $customer_add = $_REQUEST['customer_add'];
        $pname = $_REQUEST['pname'];
        $quantity = $_REQUEST['quantity'];
        $price_each = $_REQUEST['priceeach'];
        $total_price = $_REQUEST['totalprice'];
        $selldate = $_REQUEST['selldate'];

        $sell_query = "INSERT INTO customer_tb(customer_name, customer_add, product_name, quantity, price_each, price_total, sell_date) VALUE ('$customer_name', '$customer_add', '$pname', '$quantity', '$price_each', '$total_price', '$selldate'
        )";
        
        if(mysqli_query($connect, $sell_query) == TRUE){
            $genid = mysqli_insert_id($connect);
            session_start();
            $_SESSION['myid'] = $genid;
            echo "<script>location.href='assetssellsuccess.php';</script>";
        }

        $sql_update = "UPDATE assets_tb SET product_avail = '$pava' WHERE product_id = '$pid'";
        $update_result = mysqli_query($connect, $sql_update);
    }
}
?>

<div class="col-sm-6 jumbotron mt-5 mx-5">
    <h3>Selling Product / Sales Bill</h3>
    <?php if(isset($_REQUEST['issue'])){
        $query = "SELECT * FROM assets_tb WHERE product_id = {$_REQUEST['id']}";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
    }  ?>
        <form action="" method="POST">
            <div class="form-group">
                    <label for="pid">Product ID</label>
                    <input type="text" class="form-control" name="pid" autocomplete="off" value="<?php if(isset($row['product_id'])) {echo $row['product_id'];} ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="pname">Customer Name</label>
                    <input type="text" class="form-control" name="customer_name" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="pname">Customer Address</label>
                    <input type="text" class="form-control" name="customer_add" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="pname">Product Name</label>
                    <input type="text" class="form-control" name="pname" autocomplete="off" value="<?php if(isset($row['product_name'])) {echo $row['product_name'];} ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label for="pava">Product Available</label>
                    <input type="text" class="form-control" name="pava" autocomplete="off" value="<?php if(isset($row['product_avail'])) {echo $row['product_avail'];} ?>">
                </div>
                <div class="form-group">
                    <label for="ptotal">Quantity</label>
                    <input type="text" class="form-control" name="quantity" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="pcostprice">Price Each</label>
                    <input type="text" class="form-control" name="priceeach" autocomplete="off" value="<?php if(isset($row['product_cost'])) {echo $row['product_cost'];} ?>">
                </div>
                <div class="form-group">
                    <label for="sellprice">Total Price</label>
                    <input type="text" class="form-control" name="totalprice" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="sellprice">Date</label>
                    <input type="date"  name="selldate" autocomplete="off">
                </div>

                <div class="text-center">
                    <button class="btn btn-danger" type="submit" name="f-submit">Submit</button>
                    <a href="assets.php" class="btn btn-secondary">Close</a>
                </div>
         </form>        
</div>











<?php
    include('includes/footer.php');
?>