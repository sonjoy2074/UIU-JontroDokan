
<?php include "./includes/header_html.php"; ?>

<?php include "./includes/topbar.php"; ?>

<?php include "../database/db_connect.php"; ?>


<div id="layoutSidenav">

    <?php include "includes/sidebar.php"; ?>

    <div id="layoutSidenav_content">
    <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Pending Orders</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Laboratory Support</li>
                    <li class="breadcrumb-item active">Pending Orders</li>
                </ol>
            </div>
        </main> 
        
        
<?php

    $item_image = "";
    $item_image = "";
    $res_avv_unit = "";
    $res_ord_quan = "";
    
    if (isset($_GET['item_delete'])) {

        $o_id = $_GET['item_delete'];
        $sql = "UPDATE `lab_item_order` SET `status`= 2 WHERE order_id = $o_id";
        $del_res = mysqli_query($connect, $sql);

        if (!$del_res) {
            die("Query failed" . mysqli_error($connect));
            }
      }else if (isset($_GET['update'])) {
        
        
        $o_id = $_GET['update'];
        $lab_item_id = $_GET['lab_item_id'];

        $sql = "UPDATE `lab_item_order` SET `status`= 1 WHERE order_id = $o_id";
        $del_res = mysqli_query($connect, $sql);

        $sql_i = "UPDATE `lab_items` 
        SET `available_units` = (SELECT available_units FROM `lab_items` WHERE item_id = $lab_item_id) - (SELECT  `item_amount` FROM `lab_item_order` WHERE lab_item_id = $lab_item_id AND order_id = $o_id)
        WHERE item_id like (SELECT lab_item_id FROM lab_item_order WHERE order_id = $o_id)";
        $del_res = mysqli_query($connect, $sql_i);

        $avv_units ="SELECT * FROM `lab_items` WHERE item_id = $lab_item_id";
        $res_avv_units = mysqli_fetch_assoc(mysqli_query($connect, $avv_units));

        $ord_quan = "SELECT * FROM `lab_item_order` WHERE order_id = $o_id";
        $res_ord_quan = mysqli_fetch_assoc(mysqli_query($connect, $ord_quan));
        

        if( $res_avv_units['available_units'] < $res_ord_quan['item_amount'] ){
            $sql = "UPDATE `lab_item_order` SET `status`= 2 WHERE lab_item_id = $lab_item_id AND  order_id != $o_id";
            $del_res = mysqli_query($connect, $sql);
        }


      }else if(isset($_GET['item_return'])){

        $o_id = $_GET['item_return'];
        $lab_item_id = $_GET['lab_item_id'];

        $sql_i = "UPDATE `lab_items` 
        SET `available_units` = (SELECT available_units FROM `lab_items` WHERE item_id = $lab_item_id) + (SELECT  `item_amount` FROM `lab_item_order` WHERE lab_item_id = $lab_item_id AND order_id = $o_id)
        WHERE item_id like (SELECT lab_item_id FROM lab_item_order WHERE order_id = $o_id)";

        $del_res = mysqli_query($connect, $sql_i);

        $sql = "UPDATE `lab_item_order` SET `status`= 4 WHERE order_id = $o_id";
        $del_res = mysqli_query($connect, $sql);

      }
?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Order Request
    </div>
    <div class="card-body">

        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Renter ID</th>
                    <th>Renter Info</th>
                    <th>Item Quantity</th>
                    <th>Issue Date</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>Order Id</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Renter ID</th>
                <th>Renter Info</th>
                <th>Item Quantity</th>
                <th>Issue Date</th>
                <th>Image</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $query = "SELECT * FROM `lab_item_order`";
                $response = mysqli_query($connect, $query);

                $count_row = mysqli_num_rows($response);
                if ($count_row == 0) {
                ?>

                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>


                    <?php
                } else {
                    while ($rows = mysqli_fetch_assoc($response)) {

                        $order_id = $rows['order_id'];
                        $lab_item_id = $rows['lab_item_id'];

                        $sql = "SELECT * FROM lab_items WHERE item_id = $lab_item_id";
                        $res = mysqli_query($connect, $sql);

                        while($row = mysqli_fetch_assoc($res)){
                            $item_name = $row['item_name'];
                            $image = $row['item_image'];
                        }

                        
                        $item_amount = $rows['item_amount'];
                        $status = $rows['status'];
                        $issue_date = $rows['issue_date'];

                        $sql_i = "SELECT * FROM `user` WHERE id = (SELECT user_id FROM `lab_item_order` WHERE order_id = $order_id)";
                        $res_i = mysqli_query($connect, $sql_i);

                        while($roww = mysqli_fetch_assoc($res_i)){
                            $user_name = $roww['first_name']." ".$roww['last_name'];
                            $user_id = $roww['id'];
                        }

                        $q_u_name = "SELECT * FROM user WHERE id = $user_id";
                        $q_res = mysqli_query($connect, $q_u_name);

                        while($row = mysqli_fetch_assoc($q_res)){
                            $user_name = $row['first_name']." ".$row['last_name'];
                            $user_phone = $row['phone'];
                            $user_email = $row['email'];
                        }
                    

                    ?>
                        <tr>
                            <td><?php echo $order_id; ?></td>
                            <td><?php echo $lab_item_id ?></td>
                            <td><?php echo $item_name; ?></td>
                            <td><?php echo $user_id; ?></td>
                            <td><?php echo $user_name; ?><br><?php echo "Contact : " .$user_phone; ?><br><?php echo "E-mail : " .$user_email; ?></td></td>
                            <td><?php echo $item_amount; ?></td>
                            <td><?php echo $issue_date; ?></td>
                            <td><img src="../lab_support/image/<?php echo $image; ?>" alt="no_img" style="height: 50px; width:50px;"></td>
                            <td><?php if($status == 0){
                                            echo "Request Pending";
                            }
                            else if($status == 2){
                                echo "Rejected";
                            }else{
                                echo "Accepted";
                            }
                             ?></td>

                            <td colspan="2" class="text-center">

                            <?php

                            
                            
                            if($status == 0){ ?>
                            <a class="btn btn-sm btn-success ms-2" type="submit" name="item_update" href="lab_item_order.php?update=<?php echo $order_id; ?>&lab_item_id=<?php echo $lab_item_id; ?>"> Accept</a>
                        
                            <a class="btn btn-sm btn-danger ms-2" type="submit" name="item_delete" href="lab_item_order.php?item_delete=<?php echo $order_id; ?>"> Reject</a>
                            <?php
                            }else if($status == 2){
                            echo "Rejected";
                            }else if($status == 1){

                            ?>
                            <a class="btn btn-sm btn-success ms-2 " type="submit" name="item_return" href="lab_item_order.php?item_return=<?php echo $order_id; ?>&lab_item_id=<?php echo $lab_item_id; ?>"> Rebound</a>
                            <?php
                            
                            }else if($status = 4){
                                echo "Returned";
                            }
                            ?>


                                
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
        <?php
        if (isset($_GET['update']) ) {
            $item_id = $_GET['update'];
            if(isset($_POST['update_available_units_submit'])){
        
                $available_units = $_POST['available_units'];
                try{
                $sql = "UPDATE lab_items SET available_units={$available_units} WHERE item_id = '{$item_id}'";
                
                
                
                $del_res = mysqli_query($connect, $sql);
                }
                catch (mysqli_sql_exception $e) { 
                var_dump($e);
                exit; 
                } 
                header("Refresh:0");
            }
        }else if(isset($_GET['edit_item'])){
            $item_id = $_GET['item_id'];
            include "edit_lab_item.php";

        }
            
        ?>
    </div>
</div>

<?php include "./includes/footer.php" ?>