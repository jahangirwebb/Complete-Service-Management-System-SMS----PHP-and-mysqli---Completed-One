<?php
define('TITLE', 'Success Check');
include('../connection.php');
include('includes/header.php');

session_start();
if($_SESSION['is_login']){
    $rEmail = $_SESSION['rEmail'];
}else{
    echo "<script> location.href='userlogin.php'</script>";
}

$sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']}";
$result = mysqli_query($connect, $sql);
$num = mysqli_num_rows($result);

if($num == 1){
    $row = mysqli_fetch_assoc($result);

    echo "<div class='ml-5 mt-5'>
            <table class='table'>
                <tbody>
                    <tr>
                        <th>Request ID</th>
                        <td>".$row['request_id']."</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>".$row['requester_name']."</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>".$row['requester_email']."</td>
                    </tr>
                    <tr>
                        <th>Request Info</th>
                        <td>".$row['requester_info']."</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>".$row['requester_desc']."</td>
                    </tr>

                    <tr>
                        <td>
                            <form class='d-print-none'>
                                <input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>";
}



?>













<?php
include('includes/footer.php');
?>