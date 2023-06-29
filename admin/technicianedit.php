<?php
define('TITLE', 'Technicians');
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
        <?php
            if(isset($_REQUEST['edit'])){
            $sql = "SELECT * FROM technician_tb WHERE t_id = {$_REQUEST['id']}";
                $result = mysqli_query($connect,$sql);
                $row = mysqli_fetch_assoc($result);
            }

            if(isset($_REQUEST['update'])){
                if(($_REQUEST['t_id'] == "") || ($_REQUEST['t_name'] == "") ||($_REQUEST['t_city'] == "") || ($_REQUEST['t_mobile'] == "") || 
                ($_REQUEST['t_email'] == "")){
                    $msg = "<div class='alert alert-danger'>Please fill all fields</div>";
                }else{
                    $tid = $_REQUEST['t_id'];
                    $tname = $_REQUEST['t_name'];
                    $tcity = $_REQUEST['t_city'];
                    $tmobile = $_REQUEST['t_mobile'];
                    $temail = $_REQUEST['t_email'];

                    $sql = "UPDATE technician_tb SET t_id = '$tid', t_name = '$tname', t_city = '$tcity', t_mobile = '$tmobile', t_email = '$temail' WHERE t_id = '$tid'";

                    $result = mysqli_query($connect, $sql);
                    if($result == TRUE){
                        $msg = "<div class='alert alert-success'>Successfully Updated</div>";
                    }else{
                        $msg = "<div class='alert alert-danger'>Something went wrong</div>";
                    }
                }

            }
        ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="ID">Technician ID</label>
            <input type="text" class="form-control" name="t_id" value="<?php if(isset ($row['t_id'])){echo $row['t_id'];} ?>" readonly>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="t_name" value="<?php if(isset ($row['t_name'])){echo $row['t_name'];} ?>">
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="t_city" value="<?php if(isset ($row['t_city'])){echo $row['t_city'];} ?>">
        </div>

        <div class="form-group">
            <label for="Mobile">Mobile</label>
            <input type="text" class="form-control" name="t_mobile" value="<?php if(isset ($row['t_mobile'])){echo $row['t_mobile'];} ?>">
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="t_email" value="<?php if(isset ($row['t_email'])){echo $row['t_email'];} ?>">
        </div>
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-danger" name="update">Update</button>
            <a href="technician.php" class="btn btn-secondary" name="close">Close</a>
    </div>
    </form>
    <?php if(isset($msg)) {echo $msg;} ?>
    
        </div>










<?php
include('includes/footer.php');
?>