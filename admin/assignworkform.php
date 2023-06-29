<?php

    if(session_id() == ""){
        session_start();
    }
    if(isset($_SESSION["is_adminlogin"])){
        $aEmail = $_SESSION['aEmail'];
    }else{
        header('location:login.php');
    }

    if(isset($_REQUEST['view'])){
        $myquery = "SELECT * FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
        $myresult = mysqli_query($connect, $myquery);
        $myrow = mysqli_fetch_assoc($myresult);
    }
    
    if(isset($_REQUEST['close'])){
    $del_query = "DELETE FROM submitrequest_tb WHERE request_id = {$_REQUEST['id']}";
        if(mysqli_query($connect, $del_query)){
            echo '<meta http-equiv="refresh" content="0;URL=?closed">'; }
    }

    
    if(isset($_REQUEST['assigntechnician'])){
        if(($_REQUEST['request_id'] == "") || ($_REQUEST['request_info'] == "") || ($_REQUEST['request_desc'] == "") || ($_REQUEST['request_name'] == "") || ($_REQUEST['addressline1'] == "") || ($_REQUEST['addressline2'] == "") || ($_REQUEST['city'] == "") || ($_REQUEST['state'] == "") || ($_REQUEST['zip'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['mobile'] == "") || ($_REQUEST['assigntechnician'] == "") || ($_REQUEST['date'] == "")){
            $msg = '<div class="alert alert-warning col-sm-6">Please fill all fields</div>';
        }else{
            $rid = $_REQUEST['request_id'];
            $rinfo = $_REQUEST['request_info'];
            $rdesc = $_REQUEST['request_desc'];
            $rname = $_REQUEST['request_name']; 
            $radd1 = $_REQUEST['addressline1'];
            $radd2 = $_REQUEST['addressline2'];
            $rcity = $_REQUEST['city'];
            $rstate = $_REQUEST['state'];
            $rzip = $_REQUEST['zip'];
            $remail = $_REQUEST['email'];
            $rmobile = $_REQUEST['mobile'];
            $rassigntech = $_REQUEST['assigntechnician'];
            $rdate = $_REQUEST['date'];

            $sql = "INSERT INTO assignwork_tb (request_id, request_info, request_desc, request_name, addressline1, addressline2, city, state, zip, email, mobile, assigntechnician, date) VALUES ('$rid', '$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rassigntech', '$rdate')";

            if(mysqli_query($connect, $sql)){
                $msg = '<div class="alert alert-success col-sm-6 mt-4">Work Assign Successfuly</div>';
            }else{
                $msg = '<div class="alert alert-danger col-sm-6 mt-4">Unable to assign work</div>';
            }

        }
    }
    
       


?>

<div class="col-sm 5 mt-4 jumbotron"> 
        <form action="" method="POST">
            <h5 class="text-center">Assign Work Order Request</h5>
            <div class="form-group">
                <label for="">Request ID</label>
                <input type="text" class="form-control" name="request_id" readonly autocomplete="off" value="<?php if(isset($myrow['request_id'])){ echo $myrow['request_id']; } ?>">   
            </div>
            <div class="form-group">
                <label for="">Request Info</label>
                <input type="text" class="form-control" name="request_info" autocomplete="off" value="<?php if(isset($myrow['requester_info'])){echo $myrow['requester_info']; } ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="request_desc" autocomplete="off" value="<?php if(isset($myrow['requester_desc'])){echo $myrow['requester_desc'];} ?>">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="request_name" autocomplete="off" value="<?php if(isset($myrow['requester_name'])){echo $myrow['requester_name'];} ?>">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Address line 1</label>
                    <input type="text" class="form-control" name="addressline1" autocomplete="off" value="<?php if(isset($myrow['requester_add1'])){echo $myrow['requester_add1'];} ?> ">
                </div>

                <div class="form-group col-md-6">
                    <label for="address">Address line 2</label>
                    <input type="text" class="form-control" name="addressline2" autocomplete="off" value="<?php if(isset($myrow['requester_add2'])){echo $myrow['requester_add2'];} ?> ">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="address">City</label>
                    <input type="text" class="form-control" name="city" autocomplete="off" value="<?php if(isset($myrow['requester_city'])){echo $myrow['requester_city'];} ?> ">
                </div>
                <div class="form-group col-md-4">
                    <label for="address">State</label>
                    <input type="text" class="form-control" name="state" autocomplete="off" value="<?php if(isset($myrow['requester_state'])){echo $myrow['requester_state'];} ?> ">
                </div>
                <div class="form-group col-md-4">
                    <label for="address">Zip</label>
                    <input type="text" class="form-control" name="zip" autocomplete="off" value="<?php if(isset($myrow['requester_zip'])){echo $myrow['requester_zip'];} ?> ">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" autocomplete="off" value="<?php if(isset($myrow['requester_email'])){echo $myrow['requester_email'];} ?>" >
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Mobile</label>
                    <input type="number" class="form-control" name="mobile" autocomplete="off" value="<?php if(isset($myrow['requester_mobile'])){echo $myrow['requester_mobile'];} ?>" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="technician">Assign to Technician</label>
                    <input type="text" class="form-control" name="assigntechnician" autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" autocomplete="off">
                </div>
            </div>

            <div class="float-right">
                <button class="btn btn-success" name="assigntech">Assign</button>
                <button class="btn btn-secondary" name="reset">Reset</button>
            </div>

            
            <?php if(isset($msg)){echo $msg;} ?>
        </form>
        
</div>