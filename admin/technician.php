<?php
define('TITLE', 'Technicians');
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
    <h5 class="bg-dark text-white text-center py-2">List of Technicians</h5>
    <?php 
        $sql = "SELECT * FROM technician_tb";
        $result = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($result);
    // IF DATA IS AVAILABLE THEN TABLE WILL BE CREATED HERE .....
 if($rows > 0){ ?>
     <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Technicain-ID</th>
              <th scope="col">Name</th>
              <th scope="col">City</th>
              <th scope="col">Mobile</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
             while($row = mysqli_fetch_assoc($result)){?>
              <tr>

              <td><?php echo $row['t_id'] ?></td>
              <td><?php echo $row['t_name'] ?></td>
              <td><?php echo $row['t_city'] ?></td>
              <td><?php echo $row['t_mobile'] ?></td>
              <td><?php echo $row['t_email'] ?></td>
              <td>
                <!-- EDIT BUTTON -->
                <form action="technicianedit.php" method="POST" class="d-inline">
                    <input type="hidden" name="id" value="<?php echo $row['t_id'];?>">
                    <button type="submit" class="btn btn-info" name="edit">
                        <i class="fas fa-pen"></i>
                    </button>
                </form>

               <!-- DELETE BUTTON -->
                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value="<?php echo $row['t_id'];       ?>"><button type="submit" class="btn btn-secondary" name="delete">
                    <i class="fas fa-trash-alt"></i></button>
                </form>

              </td>

              </tr>
            <?php }?>
                    
            </tbody>
      </table>

        <?php  }?>

</div>


<?php

if(isset($_REQUEST['delete'])){
  $sql = "DELETE FROM technician_tb WHERE t_id = {$_REQUEST['id']}";
  $result = mysqli_query($connect, $sql);
  if($result == TRUE){
    echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
  }
}


?>









</div>  <!-- END ROW -->
                <!-- PLUS Button to ADD new USER -->
                 <div class="float-right my-5"><a href="technicianinsert.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
        </div>    <!-- END Container -->
        <!-- Javascript -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>    
    
</body>
</html>