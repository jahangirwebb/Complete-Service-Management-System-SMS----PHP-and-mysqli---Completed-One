<?php
session_start();
define('TITLE', 'Success');
include('includes/header.php');
include('../connection.php');


if(isset($_SESSION["is_adminlogin"])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header('location:login.php');
}

$sql = "SELECT * FROM customer_tb WHERE customer_id = {$_SESSION['myid']}";
$result = mysqli_query($connect, $sql);
$rows = mysqli_num_rows($result);
if($rows == 1){
    $row = mysqli_fetch_assoc($result);
?>

<div class="mx-5 mt-3 jumbotron">
    <h3 class="text-center">Customer Bill</h3>
    <table class="table">
        <tbody>
            <tr>
                <th>Customer ID</th>
                <td><?php echo $row['customer_id']; ?></td>
            </tr>
            <tr>
                <th>Customer namespace</th>
                <td><?php echo $row['customer_name']; ?></td>
            </tr>
            <tr>
                <th>Customer Address</th>
                <td><?php echo $row['customer_add']; ?></td>
            </tr>
            <tr>
                <th>Product Name</th>
                <td><?php echo $row['product_name']; ?></td>
            </tr>
            <tr>
                <th>Product Quantity</th>
                <td><?php echo $row['quantity']; ?></td>
            </tr>
            <tr>
                <th>Price Each</th>
                <td><?php echo $row['price_each']; ?></td>
            </tr>
            <tr>
                <th>Total Price</th>
                <td><?php echo $row['price_total']; ?></td>
            </tr>
            <tr>
                <th>Selling Date</th>
                <td><?php echo $row['sell_date']; ?></td>
            </tr>
            <tr>
                <!-- Customer Bill Print Button -->
                <td>
                    <form class="d-print-none mt-3">
                        <input type="submit" class="btn btn-danger" value="print" onClick='window.print()'>
                        <a href="assets.php" class="btn btn-secondary ml-3">Close</a>
                    </form>
                </td>
                <!-- Close Button to Assets Sell Dashboard -->
                <!-- <td>
                    <a href="assets.php" class="btn btn-secondary">Close</a>
                </td> -->
            </tr>
        </tbody>
    </table>
</div>



<?php  } ?>