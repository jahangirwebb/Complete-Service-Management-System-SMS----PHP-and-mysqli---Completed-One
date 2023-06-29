<?php
define('TITLE', 'Requesters');
include('includes/header.php');
include('../connection.php');

session_start();
if(isset($_SESSION["is_adminlogin"])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header('location:login.php');
}
?>

<div class="col-sm-6 jumbotron mt-4 ml-4">
    <h3 class="text-center">Update Details</h3>
    <?php  if(isset($_REQUEST['edit'])){
        $query = "SELECT * FROM userlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
        $result = mysqli_query($connect, $query);
        $row = mysqli_fetch_assoc($result);
    }

    if(isset($_REQUEST['update'])){
        if(($_REQUEST['r_login_id'] == "") || ($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == ""))
        {
            $msg = '<div class="alert alert-warning col-sm-5">Please fill required Fields</div>';}
        else{
            $rid = $_REQUEST['r_login_id'];
            $rname = $_REQUEST['r_name'];
            $remail = $_REQUEST['r_email'];

            $sql = "UPDATE userlogin_tb SET r_login_id = '$rid', r_name = '$rname', r_email = '$remail' WHERE r_login_id = '$rid'";
            $update_result = mysqli_query($connect, $sql);
            if($update_result == TRUE){
                $msg = '<div class="alert alert-success col-sm-5">Updated Successfully</div>';} 
            }
    
    }
     
    ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="">Requester ID</label>
            <input type="text" class="form-control" name="r_login_id" value='<?php if(isset($row["r_login_id"])){echo $row["r_login_id"];} ?>' readonly>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="r_name" value="<?php if(isset($row['r_name'])){echo $row['r_name'];} ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="r_email" value="<?php if(isset($row['r_email'])){ echo $row['r_email'];} ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="update">Update</button>
            <a href="requesters.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
    <?php if(isset($msg)){echo $msg;}  ?>
</div>




<?php include('includes/footer.php'); ?>