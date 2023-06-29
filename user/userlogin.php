<?php
include('../connection.php');
session_start();
if(!isset($_SESSION['is_login'])){
    if(isset($_REQUEST['rEmail'])){

        $rEmail = trim($_REQUEST['rEmail']);
        $rPassword = trim($_REQUEST['rPassword']);

        $sql_query = "SELECT r_email, r_password FROM userlogin_tb WHERE r_email = '$rEmail' AND r_password = '$rPassword' limit 1";

        $result = mysqli_query($connect, $sql_query);
        $rows = mysqli_num_rows($result);

        if($rows == 1){
            $_SESSION['is_login'] = true;
            $_SESSION['rEmail'] = $rEmail; 
            echo "<script> location.href='userprofile.php'; </script>";
            exit;
        }else{
            $msg = '<div class="alert alert-danger mt-4">Please enter valid data.</div>';
        }

    }
}else{
    header('location:userprofile.php');
}






?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
</head>
<body>

    <div class="text-center mt-5" style ="font-size:30px;">
        <i class="fas fa-stethoscope"></i>
        <span>Online Service Management System</span>
    </div>
    <p class="text-center mt-3" style="font-size:22px;"> <i class="fas fa-user-secret mr-2"></i> Requester/User Area</p>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-8 col-lg-5 col-xl-4 ">
                <form action="" method="POST" class="mt-5 shadow-lg p-4 rounded-lg">

                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <label for="email" class="font-weight-bold ml-2">Email</label>
                        <input type="text" class="form-control" name="rEmail" placeholder="Email" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <i class="fas fa-key"></i>
                        <label for="password" class="ml-2 font-weight-bold">Password</label>
                        <input type="password" class="form-control" name="rPassword" placeholder="Password" autocomplete="off">
                    </div>

                    <button class="btn btn-outline-danger font-weight-bold btn-block mt-5 shadow-sm">Login</button>
                    <?php if(isset($msg)) {echo $msg; } ?>
                    <div class="text-center mt-4">
                        <small>Not a member? <a href="../index.php">Register Now</a></small>
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