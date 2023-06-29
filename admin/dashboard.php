
<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('../connection.php');
include('includes/header.php');

session_start();
if(isset($_SESSION["is_adminlogin"])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header('location:login.php');
}

// Making Admin Dashboard Dynamic....

// Submit Request Table DYnamic Code
$sql = "SELECT max(request_id) FROM submitrequest_tb";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_row($result);
$submitrequest = $row[0];

// AssignWork Table Dynamic Code
$sql = "SELECT max(request_id) FROM assignwork_tb";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_row($result);
$assignwork = $row[0];

$sql = "SELECT * FROM technician_tb";
$result = mysqli_query($connect, $sql);
$totaltechnician = mysqli_num_rows($result);

?>

    <div class="col-sm-9 col-md-10">
        <div class="row text-center ">

            <div class="col-sm-4 mt-5 px-5">
                <div class="card bg-danger text-white mb-3">
                    <div class="card-header">Requests Recieved</div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $submitrequest; ?></h4>
                        <a class="btn text-white" href="requesters.php">View</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-5 px-5">
                <div class="card bg-success text-white mb-3">
                    <div class="card-header">Assigned Work</div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $assignwork; ?></h4>
                        <a class="btn text-white" href="workorder.php">View</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mt-5 px-5">
                <div class="card bg-primary text-white mb-3">
                    <div class="card-header">No. of Technicians</div>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $totaltechnician; ?></h4>
                        <a class="btn text-white" href="technician.php">View</a>
                    </div>
                </div>
            </div>

        </div>

       <div class="mt-5 mx-4 text-center">
         <p class="bg-dark p-2 text-white">List of Requesters</p>
            <?php
                $sql = "SELECT * FROM userlogin_tb";
                $result = mysqli_query($connect, $sql);
                $nums = mysqli_num_rows($result);
                if($nums > 0){
                    echo '
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Requester ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>';
                            while($row = mysqli_fetch_assoc($result)){
                               echo '<tr>';
                                echo   '<td>'.$row["r_login_id"].'</td>';
                                echo   '<td>'.$row["r_name"].'</td>';
                                echo   '<td>'.$row["r_email"].'</td>';
                               echo '</tr>';
                            }
                     echo  '</tbody>
                        </table>';
                }
            ?>
       </div>
    </div>



<?php
    include('includes/footer.php');
?>