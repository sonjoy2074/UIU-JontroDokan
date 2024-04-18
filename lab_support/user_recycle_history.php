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


<header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
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
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Post Date</th>
                    <th>Product Details</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Post Date</th>
                    <th>Product Details</th>
                </tr>
            </tfoot>
            <tbody>
                <?php

                $sql = "SELECT * FROM recycling WHERE user_id = $uid";
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
                        $product_id = $row['p_id'];
                        $product_name = $row['p_name'];
                        $product_image = $row['p_image'];
                        $issue_date = $row['p_date'];
                        $product_details = $row['p_details'];

                        

                        
                    ?>
                        <tr>
                            <td><?php echo mb_strimwidth($product_id, 0, 10, "..."); ?></td>
                            <td><?php echo $product_name; ?></td>
                            <td><img src="../recycle/image/<?php echo $product_image; ?>" alt="no_img" style="height: 50px; width:50px;"></td>
                            <td><?php echo $issue_date; ?></td>
                            <td><?php echo $product_details; ?></td>
                            <?php
                            
                        

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