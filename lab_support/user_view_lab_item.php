<?php include "./includes/header.php";?>
<?php include "../homepage/includes/header_body.php";?>
<?php include('../database/db_connect.php')?>

<?php
    if(isset($_GET['delete_req']))
    {
        $del_id = $_GET['delete_req'];

        $del_query = "delete from lab_item_order where order_id = {$del_id}";
        $del_res = mysqli_query($connect, $del_query);

        if($del_query)
        {
            echo "<div class=\"alert alert-success\" role=\"alert\">
                Order No {$del_id} successfully Canceled!
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>";
        }
        else
        {
            die("query failed!" . mysqli_error($connect));
        }
    }
?>


<header class="py-5 border-bottom mb-4 hero " style="margin-top: 70px!important;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">My Lab Orders</h1>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <!-- Blog entries-->
            <!-- Featured blog post-->
            <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        My Orders
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
            <tbody>
                <?php

                $sql = "SELECT * FROM lab_item_order WHERE lab_item_id in (SELECT item_id FROM lab_items ) AND user_id = $uid";
                $res = mysqli_query($connect , $sql);

                $count_row = mysqli_num_rows($res);



                if ($count_row == 0) {
                ?>

                    <tr>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                        <td> </td>
                    </tr>


                    <?php
                } else {



                    while ($row = mysqli_fetch_assoc($res)) {
                        $order_id = $row['order_id'];
                        $lab_item_id = $row['lab_item_id'];
                        $user_id = $row['user_id'];
                        $quan = $row['item_amount'];
                        $status = $row['status'];

                        $query_i = "SELECT * FROM `lab_items` WHERE item_id = $lab_item_id";
                        $result_i = mysqli_query($connect , $query_i);

                        $row = mysqli_fetch_array($result_i);
                        $item_id = $row['item_id'];
                        $item_name = $row['item_name'];
                        $available_units = $row['available_units'];
                        $item_image = $row['item_image'];
                        $item_tag = $row['tag'];
                        $item_details = $row['item_details'];
                    ?>
                        <tr>
                            <td><?php echo mb_strimwidth($order_id, 0, 10, "..."); ?></td>
                            <td><?php echo $item_name; ?></td>
                            <td><img src="image/<?php echo $item_image; ?>" alt="no_img" style="height: 50px; width:50px;"></td>
                            <td><?php echo $quan; ?></td>
                            <?php
                            if($status == 0){
                                ?>
                                <td colspan="2" class="text-center" style="width: 100px !important"> 
                                <?php echo " Pending"; ?>
                                <a class="btn btn-sm btn-danger ms-2" type="submit" name="order_delete" href="user_view_lab_item.php?delete_req=<?php echo $order_id; ?>"> Cancel</a>
                                </td>
                                <?php
                            }else if($status == 2){
                                ?>
                                <td colspan="2" class="text-center" style="width: 100px !important">
                                <?php echo " Rejected"; ?>
                                <a class="btn btn-sm btn-danger ms-2" type="submit" name="order_delete" href="user_view_lab_item.php?delete_req=<?php echo $order_id; ?>"> Delete</a>
                                </td>
                                <?php
                            }
                            else{
                                ?>
                                    <td><?php echo "Order Confirmed" ?></td>
                                <?php
                            }

                            ?>

                            
                        </tr>

                <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
</div>



        <!-- Side widgets-->

    </div>
</div>



<?php include "./includes/footer.php";?>