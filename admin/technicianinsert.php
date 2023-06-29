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

if(isset($_REQUEST['tech-submit'])){
    if(($_REQUEST['t_name'] == "") || ($_REQUEST['t_city'] == "") || ($_REQUEST['t_mobile'] == "") || ($_REQUEST['t_email'] == "")) {
        $msg = "<div class='alert alert-danger'>Please fill all fields</div>";
    }else{
        $tname = $_REQUEST['t_name'];
        $tcity = $_REQUEST['t_city'];
        $tmobile = $_REQUEST['t_mobile'];
        $temail = $_REQUEST['t_email'];

        $sql = "INSERT INTO technician_tb (t_name, t_city, t_mobile, t_email) VALUES ('$tname', '$tcity', '$tmobile', '$temail')";
        $result = mysqli_query($connect, $sql);

        if($result == TRUE){
            $msg = "<div class='alert alert-success'>New Technician Added</div>";
        }else{
           $msg = "<div class='alert alert-danger'>Something went wrong</div>";
        }
    }
}



?>



<div class="col-sm-5 jumbotron mt-4 ml-4">
    <h3 class="text-center">Add New Technician</h3>

    <form action="" method="POST">
        <div class="form-group">
            <label for="ID">Name</label>
            <input type="text" class="form-control" name="t_name" >
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="t_city" >
        </div>
        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" class="form-control" name="t_mobile" >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="t_email" >
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" name="tech-submit">Submit</button>
            <a href="technician.php" class="btn btn-secondary" name="close">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>






<?php
include('includes/footer.php');
?>