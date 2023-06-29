<?php
define('TITLE', 'Assets');
include('includes/header.php');
include('../connection.php');

session_start();
if(isset($_SESSION["is_adminlogin"])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header('location:login.php');
}
?>

<!-- Start 2ND Column      -----   Start 2ND Column          -->

<div class="col-sm-9 col-md-10 mt-4 text-center">
    <p class='bg-dark text-white p-2'>Assest/Products Details</p>

    <?php   
        $query = "SELECT * FROM assets_tb";
        $result = mysqli_query($connect, $query);
        $num_rows = mysqli_num_rows($result);

        if($num_rows > 0){
    ?>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Name</th>
                <th scope="col">Purchase Date</th>
                <th scope="col">Available</th>
                <th scope="col">Total</th>
                <th scope="col">Cost Price</th>
                <th scope="col">Sell Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td> <?php echo $row['product_id']; ?> </td>
                    <td> <?php echo $row['product_name']; ?> </td>
                    <td> <?php echo $row['product_dop']; ?> </td>
                    <td> <?php echo $row['product_avail']; ?> </td>
                    <td> <?php echo $row['product_total']; ?> </td>
                    <td> <?php echo $row['product_cost']; ?> </td>
                    <td> <?php echo $row['sell_price']; ?> </td>

                    <td>
                        <form action="assetsedit.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value=" <?php echo $row['product_id']; ?> "><button type="submit" class="btn btn-info" name="edit"><i class="fas fa-pen"></i></button>
                        </form>
                        <form action="" method="POST" class="d-inline">
                          <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>"><button class="btn btn-secondary"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <form action="assetssell.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value=" <?php echo $row['product_id']; ?> "><button type="submit" class="btn btn-warning" name="issue"><i class="fas fa-handshake"></i></button>
                        </form>
                    </td>
                </tr>


                <?php  } ?>
        </tbody>
    </table>



<?php  } ?>


</div>


<!--   Delete Record Query    Delete Record Query    Delete Record Query   -->

<?php 

    if(isset($_REQUEST['delete'])){
    $query = "DELETE FROM assets_tb WHERE product_id = {$_REQUEST['id']}";
    $result = mysqli_query($connect, $query);
    if($result == TRUE){
            echo '<meta http-equiv="refresh" content=0;URL=?deleted />';
        }
    }


?>







</div>  <!-- END ROW -->
                <!-- PLUS Button to ADD new USER -->
                 <div class="float-right my-5"><a href="assetsinsert.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
        </div>    <!-- END Container -->
        <!-- Javascript -->

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>    
    
</body>
</html>