
<?php include "./includes/header_html.php"; ?>

<?php include "./includes/topbar.php"; ?>

<?php include "../database/db_connect.php"; ?>


<div id="layoutSidenav">

    <?php include "includes/sidebar.php"; ?>

    <div id="layoutSidenav_content">
    <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Recycle Products</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Item for Recycle</li>
                    <li class="breadcrumb-item active">Recycle Products</li>
                </ol>
            </div>
        </main> 
        
        
<?php

    $item_image = "";
    $item_image = "";
    $res_avv_unit = "";
    $res_ord_quan = "";
    
    if (isset($_GET['item_deliver'])) {

        $product_id = $_GET['item_deliver'];

        
        $sql = "SELECT `product_amount` FROM `recycling` WHERE p_id = $product_id";
        $del_res = mysqli_query($connect, $sql);
        $available_units = mysqli_fetch_assoc($del_res);

        if($available_units['product_amount'] == 0){
        $sql = "UPDATE `recycling` SET `status`= 1 WHERE p_id = $product_id";
        $del_res = mysqli_query($connect, $sql);}

        if (!$del_res) {
            die("Query failed" . mysqli_error($connect));
            }

      }
?>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Products
    </div>
    <div class="card-body">

        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Available Amount</th>
                    <th>Donar ID</th>
                    <th>Donar Info </th>
                    <th>Product Image</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Available Amount</th>
                <th>Donar ID</th>
                <th>Donar Info </th>
                <th>Product Image</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $query = "SELECT * FROM `recycling`";
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
                    </tr>


                    <?php
                } else {
                    while ($rows = mysqli_fetch_assoc($response)) {

                        $product_id = $rows['p_id'];
                        $product_name = $rows['p_name'];
                        $user_id = $rows['user_id'];
                        $product_amount = $rows['product_amount'];

                        $q_u_name = "SELECT * FROM user WHERE id = $user_id";
                        $q_res = mysqli_query($connect, $q_u_name);

                        while($row = mysqli_fetch_assoc($q_res)){
                            $user_name = $row['first_name']." ".$row['last_name'];
                            $user_phone = $row['phone'];
                            $user_email = $row['email'];
                        }
                        
                        $product_image = $rows['p_image'];
                        
                        $status = $rows['status'];
                    

                    ?>
                        <tr>
                            <td><?php echo $product_id; ?></td>
                            <td><?php echo $product_name; ?></td>
                            <td><?php echo $product_amount; ?></td>
                            <td><?php echo $user_id ?></td>
                            <td><?php echo $user_name; ?><br><?php echo "E-mail : " .$user_email; ?></td>
                            <td><img src="../recycle/image/<?php echo $product_image; ?>" alt="no_img" style="height: 50px; width:50px;"></td>
                            <td><?php if($status == 0){
                                            echo "Available";
                            }
                            else if($status == 1){
                                echo "Not Available!";
                            }else{
                                echo "Accepted";
                            }
                             ?></td>

                            <td colspan="2" class="text-center">

                            <?php

                            
                            
                            if($status == 0){ ?>
                            
                            <a class="btn btn-sm btn-success ms-2" type="submit" name="item_deliver" href="recycling_items.php?item_deliver=<?php echo $product_id; ?>"> Deliver </a>

                            
                            <?php
                            }else if($status == 1){
                            echo "Not Available!";
                            }else if($status == 1){
                            echo "Accepted";
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
        if (isset($_GET['item_deliver']) ) {
            $product_id = $_GET['item_deliver'];
            if(isset($_POST['update_available_units_submit'])){
        
                $available_units = $_POST['available_units'];
                try{

                $sql = "SELECT `product_amount` FROM `recycling` WHERE p_id = '{$product_id}'";
                $del_res = mysqli_query($connect, $sql);

                $row = mysqli_fetch_assoc($del_res);
                $product_amount = $row['product_amount'];

                $sql = "UPDATE recycling SET product_amount= ($product_amount - {$available_units}) WHERE p_id = '{$product_id}'";
                
                $del_res = mysqli_query($connect, $sql);

                }
                catch (mysqli_sql_exception $e) { 
                var_dump($e);
                exit; 
                } 
                header("Refresh:0");

                echo "<meta http-equiv='refresh' content='../recycling_items.php'>";
                
                
            }
            include "includes/update_recycle_items.php";
        }
            
        ?>
    </div>
</div>

<?php include "./includes/footer.php" ?>