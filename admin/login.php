<?php
define('TITLE', 'Login');
include('../connection.php');
session_start();
if(!isset($_SESSION['is_adminlogin'])){
    if(isset($_REQUEST['aEmail'])){

        $aEmail = trim($_REQUEST['aEmail']);
        $aPassword = trim($_REQUEST['aPassword']);

        $sql_query = "SELECT a_email, a_password FROM adminlogin_tb WHERE a_email = '$aEmail' AND a_password = '$aPassword' limit 1";

        $result = mysqli_query($connect, $sql_query);
        $rows = mysqli_num_rows($result);

        if($rows == 1){
            $_SESSION['is_adminlogin'] = true;
            $_SESSION['aEmail'] = $aEmail;
            echo "<script> location.href='dashboard.php'; </script>";
            exit;
        }else{
            $msg = '<div class="alert alert-danger mt-4">Please enter valid data.</div>';
        }

    }
}else{
    header('location:dashboard.php');
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
</head>
<body>

    <div class="text-center mt-5" style ="font-size:30px;">
        <i class="fas fa-stethoscope"></i>
        <span>Online Service Management System</span>
    </div>
    <p class="text-center mt-3" style="font-size:22px;"> <i class="fas fa-user-secret mr-2"></i>Admin Area (Login)</p>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-8 col-lg-5 col-xl-4 ">
                <form action="" method="POST" class="mt-5 shadow-lg p-4 rounded-lg">

                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="email" class="font-weight-bold ml-2">Email</label>
                        <input type="text" class="form-control" name="aEmail" placeholder="Email" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="password" class="ml-2 font-weight-bold">Password</label>
                        <input type="password" class="form-control" name="aPassword" placeholder="Password" autocomplete="off">
                    </div>

                    <button class="btn btn-outline-danger font-weight-bold btn-block mt-5 shadow-sm">Login</button>
                    <?php if(isset($msg)) {echo $msg; } ?>
                    <div class="text-center mt-4">
                       
                    </div>
                    

                </form>
                <div>
                     <a href="../index.php">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
    




    <!-- Javascript Links -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>