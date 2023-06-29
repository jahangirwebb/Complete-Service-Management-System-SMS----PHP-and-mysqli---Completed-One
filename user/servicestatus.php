<?php
define('TITLE', 'Service Status');
include('../connection.php');
include('includes/header.php');

session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script>location.href='userlogin.php';</script>";
}
?>

<div class="col-sm-6 mx-5">
    <form action="" method="POST" class="form-inline d-print-none">
        <div class="form-group mr-3 mt-5">
            <label for="checkid">Enter Request ID:  </label>
            <input type="text" class="form-control ml-2" name="checkid" autocomplete="off">
        </div>
        <button type="submit" name="submit-btn" class="btn btn-success mt-5">Search</button>
    </form>
    <?php
        if(isset($_REQUEST['checkid'])){
        $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        if(($_REQUEST['checkid'] == $row['request_id'])){ 
    ?>
    <h3 class="mt-5 mb-3 text-center">Assigned Work Details</h3>
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
        <form action="" class="mb-5 d-print-none">
            <input type="submit" class="btn btn-danger mr-2" value="Print" onclick="window.print()">
            <input type="submit" class="btn btn-secondary" value="Close">
        </form>
    </div>
    <?php } else{
        echo '<div class="alert alert-warning mt-5">Your ID is Wrong</div>';
    } } ?>
</div>

















<?php
include('includes/footer.php');

?>