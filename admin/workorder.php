<?php
define('TITLE', 'Work Order');
include('includes/header.php');
include('../connection.php');

session_start();
if(isset($_SESSION["is_adminlogin"])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header('location:login.php');
}

?>
<!-- 2nd Column Starts -->
<div class="col-sm-9 col-md-10 mt-2">
    <?php 
        $sql = "SELECT * FROM assignwork_tb";
        $result = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($result);
        if($rows > 0){
            echo '<table class="table">';
                echo '<thead>';
                    echo '<tr>';
                        echo '<th scope="col">Req ID</th>';
                        echo '<th scope="col">Req Info</th>';
                        echo '<th scope="col">Name</th>';
                        echo '<th scope="col">Address</th>';
                        echo '<th scope="col">City</th>';
                        echo '<th scope="col">Mobile</th>';
                        echo '<th scope="col">Technician</th>';
                        echo '<th scope="col">Assigned Date</th>';
                        echo '<th scope="col">Action</th>';
                    echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                            echo '<td>'.$row["request_id"].'</td>'; 
                            echo '<td>'.$row["request_info"].'</td>';
                            echo '<td>'.$row["request_name"].'</td>';  
                            echo '<td>'.$row["addressline1"].'</td>'; 
                            echo '<td>'.$row["city"].'</td>'; 
                            echo '<td>'.$row["mobile"].'</td>'; 
                            echo '<td>'.$row["assigntechnician"].'</td>'; 
                            echo '<td>'.$row["date"].'</td>'; 
                        echo '</td>';

                        echo '<td>';
                        echo '<form action="viewassignwork.php" method="POST"        class="d-inline mr-2">';
                            echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-warning" name="view" type="submit"><i class="far fa-eye"></i></button>';
                        echo '</form>';
                        echo '<form action="" method="POST" class="d-inline">';
                            echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-secondary" name="delete" type="submit"><i class="far fa-trash-alt"></i></button>';
                        echo '</form>';
                    echo '<td>';
                    }
                    
                echo '</tr>';
            echo  '</table>';
        }

        if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
        $result = mysqli_query($connect, $sql);
        if($result == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
        }
        }
    ?>
        
</div>

<!-- 2nd Column ENDS -->



<?php
include('includes/footer.php');
?>