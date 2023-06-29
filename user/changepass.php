<?php
define('TITLE', 'Change Password');
include('../connection.php');
include('includes/header.php');
session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script>location.href='userlogin.php';</script>";
}

if(isset($_REQUEST['changepass'])){
    if($_REQUEST['rpassword'] == ""){
        $msg = "<div class='alert alert-danger col-sm-6 mt-3'>please fill require field.</div>";
    }else{
        $rpass = $_REQUEST['rpassword'];
        $sql = "UPDATE userlogin_tb SET r_password = '$rpass' WHERE r_email = '$rEmail'";

        $result = mysqli_query($connect, $sql);
        if($result == TRUE){
            $msg = "<div class='alert alert-success col-sm-6 mt-3'>Password Updated Successfully</div>";
        }else{
            $msg = "<div class='alert alert-danger col-sm-6 mt-3'>Unable to Update Password</div>";
        }
    }
}



?>


<div class="col-sm-4 col-md-5 mt-5 ml-5">
    <form action="" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" value="<?php echo $rEmail; ?>" name="email" readonly>
        </div>
        <div class="form-group">
            <label for="email">Password</label>
            <input type="password" class="form-control" name="rpassword" value>
        </div>
        <button class="btn btn-danger" name="changepass">Update</button>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>
















<?php
include('includes/footer.php');

?>