<?php
define('TITLE', 'Submit Request');
include('../connection.php');
include('includes/header.php');

session_start();

if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script> location.href='userlogin.php'</script>";
}

// Inserting Data in Table Query

if(isset($_REQUEST['submitrequest'])){
    // Checking Empty Fields
    if(($_REQUEST['requesterinfo'] == "") || ($_REQUEST['requesterdesc'] == "") ||($_REQUEST['requestername'] == "") || ($_REQUEST['requesteradd1'] == "") || ($_REQUEST['requesteradd2'] == "") || ($_REQUEST['requestercity'] == "") || ($_REQUEST['requesterstate'] == "") || ($_REQUEST['requesterzip'] == "") || ($_REQUEST['requesteremail'] == "") || ($_REQUEST['requestermobile'] == "") || ($_REQUEST['requesterdate'] == "") ){
        $msg = "<div class='alert alert-danger mt-2 col-md-4'>please fill all required fields.</div>";
    }else{
        $rinfo = $_REQUEST['requesterinfo'];
        $rdesc = $_REQUEST['requesterdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterzip'];
        $remail = $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rdate = $_REQUEST['requesterdate'];

        $sql = "INSERT INTO `submitrequest_tb` (requester_info, requester_desc, requester_name, requester_add1, requester_add2, requester_city, requester_state, requester_zip, requester_email, requester_mobile, requester_date) VALUES ('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity', '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";

        $result = mysqli_query($connect, $sql);

        if($result){
            $genid = mysqli_insert_id($connect);
            $msg = "<div class='alert alert-success mt-2 col-md-4'>Request Submitted Successfully</div>";
            $_SESSION['myid'] = $genid;
            echo "<script> location.href='successcheck.php'</script>";
        }else{
            $msg = "<div class='alert alert-danger mt-2 col-md-4'>Unable to Submit Your Request</div>";
        }

    }




}











?>

<div class="col-sm-7 col-md-8 mt-4 mx-5">
<!-- Submit Request Form -->

    <form action="" method="POST">
        <div class="form-group">
            <label for="RequesterInfo">Requester Info</label>
            <input type="text" class="form-control" name="requesterinfo" placeholder="Requester Info" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="RequesterDescription">Description</label>
            <input type="text" class="form-control" name="requesterdesc" placeholder=" Description" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="RequesterName">Name</label>
            <input type="text" class="form-control" name="requestername" placeholder=" Your Name" autocomplete="off">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Address">Address Line 1</label>
                <input type="text" class="form-control" name="requesteradd1" placeholder="Address" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label for="Address">Address Line 2</label>
                <input type="text" class="form-control" name="requesteradd2" placeholder="Address" autocomplete="off">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="City">City</label>
                <input type="text" class="form-control" name="requestercity" placeholder="City" autocomplete="off"> 
            </div>
            <div class="form-group col-md-4">
                <label for="City">State</label>
                <input type="text" class="form-control" name="requesterstate" placeholder="State" autocomplete="off"> 
            </div>
            <div class="form-group col-md-2">
                <label for="City">Zip Code</label>
                <input type="text" class="form-control" name="requesterzip" placeholder="zip" autocomplete="off"> 
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="requesteremail" placeholder="Email" autocomplete="off"> 
            </div>
            <div class="form-group col-md-2">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="requestermobile" placeholder="Mobile" autocomplete="off"> 
            </div>
            <div class="form-group col-md-3">
                <label for="City">Date</label>
                <input type="Date" class="form-control" name="requesterdate" autocomplete="off"> 
            </div>
        </div>
        <button type="submit" name="submitrequest" class="btn btn-danger">Submit</button>
        <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>

<!-- Only Number For Zip Input Field -->

   





<?php
include('includes/footer.php');
?>