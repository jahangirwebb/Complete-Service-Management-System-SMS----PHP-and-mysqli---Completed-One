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


if(isset($_REQUEST['reqsubmit'])){
    if( ($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "") || ($_REQUEST['r_password'] == "")){
        $msg = "<div class='alert alert-danger mt-3'>Please fill all fields</div>";
    }else{
        $rname = $_REQUEST['r_name'];
        $remail = $_REQUEST['r_email'];
        $rpassword = $_REQUEST['r_password'];

        $sql = "INSERT INTO userlogin_tb (r_name, r_email, r_password) VALUES ('$rname', '$remail', '$rpassword')";
        $result = mysqli_query($connect, $sql);
        if($result == TRUE){
            $msg = "<div class='alert alert-success mt-3'>New User Added</div>";
        }else{
            $msg = "<div class='alert alert-success mt-3'>Something went wrong</div>";
        }
    }
}

?>

<div class="jumbotron col-sm-6 ml-4 mt-4">
    <h3 class="text-center">Add New Requester</h3>
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" class="form-control" name="r_name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="r_email">
        </div>
        <div class="form-group">
            <label for="name">Password</label>
            <input type="text" class="form-control" name="r_password">
        </div>
        <div class="text-center">
            <button class="btn btn-danger" type="submit" name="reqsubmit">Submit</button>
            <a href="requesters.php" class="btn btn-secondary">Close</a>
        </div>
        <?php  if(isset($msg)){echo $msg;} ?>
    </form>

</div>








<?php include('includes/footer.php'); ?>