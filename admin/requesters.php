<?php
define('TITLE', 'Requesters');
include('includes/header.php');
include('../connection.php');

session_start();
if(isset($_SESSION["is_adminlogin"])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header('location:login.php');
}
?>


<div class="col-sm-9 col-md-10 mt-4">
    <p class="bg-dark text-center text-white p-2">List Of Requesters</p>
    <?php
        $query = "SELECT * FROM userlogin_tb";
        $result = mysqli_query($connect, $query);
        $num_rows = mysqli_num_rows($result);

        if($num_rows > 0){ ?>

        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">Requester ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['r_login_id']; ?></td>
                    <td><?php echo $row['r_name']; ?></td>
                    <td><?php echo $row['r_email']; ?></td>
                    <td>
                        <form action="editrequesters.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $row['r_login_id']; ?>"><button type="submit" class="btn btn-info" name="edit"><i class="fas fa-pen"></i></button>
                        </form> 
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $row['r_login_id']; ?>"><button type="submit" class="btn btn-secondary" name="delete"><i class="fas fa-trash-alt"></i></button>
                        </form> 
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php  } ?>

</div>

<!-- DELETE Record Query  -->
<?php 
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM userlogin_tb WHERE r_login_id = {$_REQUEST['id']} ";
        $result = mysqli_query($connect, $sql);
        if($result == TRUE){
            echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        }
    }

?>


</div>  <!-- END ROW -->
                <!-- PLUS Button to ADD new USER -->
                 <div class="float-right my-5"><a href="insertreq.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
    </div>    <!-- END Container -->
        <!-- Javascript -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>    
    
</body>
</html>


