<?php
define('TITLE', 'Work Order');
include('includes/header.php');
include('../connection.php');

session_start();
if(isset($_SESSION["is_adminlogin"])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header('location:login.php');
}
?>

<!-- SECOND COLUMN START -->

<div class="col-sm-6 mx-5 mt-3">
    <h3 class="text-center mb-3">Assigned Work Details</h3>
    <?php
        if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result); ?>

<table class="table table-bordered ">
        <tbody>
            <tr>
                <td>Request ID</td>
                <td><?php if(isset($row['request_id'])) { echo $row['request_id']; } ?></td>
            </tr>
            <tr>
                <td>Request Info</td>
                <td><?php if(isset($row['request_info'])) { echo $row['request_info']; } ?></td>
            </tr>
            <tr>
                <td>Request Desc</td>
                <td><?php if(isset($row['request_desc'])) { echo $row['request_desc']; } ?></td>
            </tr>
            <tr>
                <td>Request Name</td>
                <td><?php if(isset($row['request_name'])) { echo $row['request_name']; } ?></td>
            </tr>
            <tr>
                <td>Address 1</td>
                <td><?php if(isset($row['addressline1'])) { echo $row['addressline1']; } ?></td>
            </tr>
            <tr>
                <td>Address 2</td>
                <td><?php if(isset($row['addressline2'])) { echo $row['addressline2']; } ?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php if(isset($row['city'])) { echo $row['city']; } ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php if(isset($row['state'])) { echo $row['state']; } ?></td>
            </tr>
            <tr>
                <td>Zip</td>
                <td><?php if(isset($row['zip'])) { echo $row['zip']; } ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php if(isset($row['email'])) { echo $row['email']; } ?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><?php if(isset($row['mobile'])) { echo $row['mobile']; } ?></td>
            </tr>
            <tr>
                <td>Assign Technician</td>
                <td><?php if(isset($row['assigntechnician'])) { echo $row['assigntechnician']; } ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?php if(isset($row['date'])) { echo $row['date']; } ?></td>
            </tr>
        </tbody>
    </table>
            
    <div class="text-center">
        <form action="" class="mb-5 d-print-none d-inline">
            <input type="submit" class="btn btn-danger mr-2" value="Print" onclick="window.print()">
        </form>
        <form action="workorder.php" class="d-inline">
            <input type="submit" class="btn btn-secondary" value="Close">
        </form>
    </div>

     <?php   } ?>
    
</div>

<!-- SECOND COLUMN START -->




<?php
include('includes/footer.php');
?>