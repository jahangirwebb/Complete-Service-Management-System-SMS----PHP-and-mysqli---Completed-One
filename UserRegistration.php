<?php   

include ('connection.php');


if(isset($_REQUEST['rSignup'])){

    if(($_REQUEST['rName'] == "") || ($_REQUEST['rEmail'] == "") || ($_REQUEST['rPassword'] == "")){

        $regmsg = '<div class="alert alert-danger mt-2" role="alert">Please fill all fields.</div>';
        // echo "please fill all require fields";
        
    }else{
        $rEmail = $_REQUEST['rEmail'];
        $sql = "SELECT r_email FROM userlogin_tb WHERE r_email = '$rEmail' ";
        $result = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result);

        if($num == 1){
             $emailmsg = '<div class="alert alert-danger mt-2" role="alert">Email Already Registered.</div>';
        } else {

            $rName = $_REQUEST['rName'];
            $rEmail = $_REQUEST['rEmail'];
            $rPassword = $_REQUEST['rPassword'];
        
            $qu = "INSERT INTO userlogin_tb(r_name, r_email, r_password) VALUES ('$rName', '$rEmail', '$rPassword')";
        
            $result = mysqli_query($connect, $qu);


      }

   }


}






?>


<div class="container pt-5" id="registration">
        <h2 class="text-center">Create an Account</h2>
        <div class="row mb-4 mt-4">
            <div class="col-lg-6 offset-3">
                <form action="" method="post" class="shadow-lg p-4 rounded">

                    <div class="form-group">
                        <i class="fas fa-user"></i> <label for="name" class="font-weight-bold pl-2">Name</label>
                        <input type="text" class="form-control" name="rName" placeholder="Name" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <i class="fas fa-envelope"></i> <label for="email" class="font-weight-bold pl-2">Email</label>
                        <input type="email" class="form-control" name="rEmail" placeholder="Email" autocomplete="off">
                        <small class="form-text">We'll never share your email with anyone else.</small>
                        <?php if(isset($emailmsg)) {echo $emailmsg; }; ?>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="password" class="font-weight-bold pl-2">Password</label>
                        <input type="password" class="form-control" name="rPassword" placeholder="Password" autocomplete="off">
                    </div>

                    <button class="btn btn-danger btn-block mt-5 mb-2 font-weight-bold shadow-sm" name="rSignup" type="submit">Sign Up</button>
                    <em style="font-size: 12px;">Note: By clicking Signup, you agree to our Term, Data & Cokies Policy.</em>
                    <?php if(isset($regmsg)) {echo $regmsg; }; ?>

                </form>
            </div>
        </div>
    </div>