<?php
define('TITLE', 'User Profile');
include('../connection.php');
include('includes/header.php');
session_start();

if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    header('location:userlogin.php');
}

$sql = "SELECT r_name, r_email FROM userlogin_tb WHERE r_email = '$rEmail'";
$result = mysqli_query($connect, $sql);
$row = mysqli_num_rows($result);

if($row == 1){
    $line = mysqli_fetch_assoc($result);
    $rName = $line['r_name'];
}


// Updating User Name Code

if(isset($_REQUEST['nameupdate'])){
    if($_REQUEST['rName'] == ""){
        $msg = '<div class="alert alert-warning mt-2">please fill the required field</div>';
    }else{
        $rName = $_REQUEST['rName'];
        $query = "UPDATE userlogin_tb SET r_name = '$rName' WHERE r_email = '$rEmail'";
        $result = mysqli_query($connect, $query);

        if($result == TRUE){
            $msg = "<div class='alert alert-success mt-2'>Updated Successfully</div>";
        }else{
            $msg = "<div class='alert alert-danger mt-2'>Unable to update</div>";
        }
    }
}


?>






            <div class="col-sm-6 mt-5">       <!-- User Right Side Area -->
                <form action="" method="POST" class="mx-5">

                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" name="rEmail" id="rEmail" autocomplete="off" readonly value="<?php echo $rEmail;?>">
                    </div>

                    <div class="form-group">
                        <label for="Email">Name</label>
                        <input type="text" class="form-control" name="rName" id="rName" autocomplete="off" value="<?php echo $rName;?>">
                    </div>

                    <button type="submit" class="btn btn-danger" name="nameupdate">Update</button>
                    <?php if(isset($msg)) {echo $msg; } ?>

                </form>
            </div>









<?php
include('includes/footer.php');
?>