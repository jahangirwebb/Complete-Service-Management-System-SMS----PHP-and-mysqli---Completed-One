<?php
define('TITLE', 'Requests');
include('includes/header.php');
include('../connection.php');


session_start();
if(isset($_SESSION["is_adminlogin"])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header('location:login.php');
}
?>



<div class="col-sm-4">
    <?php
        $sql = "SELECT request_id, requester_info, requester_desc, requester_date FROM submitrequest_tb";
        $result = mysqli_query($connect, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo '<div class="card mt-4 mx-5">';
                    echo '<div class="card-header">';
                        echo 'Request ID: '.$row["request_id"];
                    echo '</div>';
                    echo '<div class="card-body">';

                        echo '<h5 class="card-title">Requester Info: '. $row["requester_info"];  
                        echo '</h5>';

                        echo '<p class="card-text"> '.$row["requester_desc"]; 
                        echo '</p>'; 

                        echo '<p class="card-text">Request Date: '.$row["requester_date"]; 
                        echo '</p>'; 

                    echo '<div class="float-right">';
                      echo '<form method="POST">';
                            echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
                            echo '<input type="submit" class="btn btn-danger mr-2" value="View"name="view" >';
                            echo '<input type="submit" class="btn btn-secondary" value="Close" name="close">';
                      echo '</form>';  
                    echo '</div>';    
                    echo '</div>';
                echo '</div>';
            }
        }
    
    ?>
</div>


<!-- 
    3rd Column Form - Assign Work Starts 
-->




<?php
include('assignworkform.php');
include('includes/footer.php');
?>