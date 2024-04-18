<?php include "../homepage/includes/header_html.php" ?>
<?php include "../homepage/includes/header_body.php" ?> 
<?php include('../database/db_connect.php') ?>

<header class="py-5 bg-light border-bottom mb-4">
    
</header>
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <?php
            $userID = $_SESSION['uid'];
            $query = "SELECT * FROM `recycling` WHERE user_id = $uid";
            $result = mysqli_query($connect , $query);
            

            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['p_id'];
                $product_name = $row['p_name'];
                $product_user_id = $row['user_id'];
                $product_image = $row['p_image'];
                $product_type = $row['p_type'];
                $product_details = $row['p_details'];
                
                date_default_timezone_set('Asia/Dhaka');
                $post_date = date('d-m-y');

            ?>
                <div class="card mb-4">
                    <a href="post.php?p_id=<?php echo $product_id; ?>"><img class="card-img-top" src="image/<?php echo $product_image; ?>" alt="no_image" /></a>
                    <div class="card-body">
                        <h2 class="card-title h4"><a href="user_recycle_item_details.php?i_id=<?php echo $product_id; ?>"><?php echo mb_strimwidth($product_name, 0, 30, "..."); ?></a></h2>
                        <div class="small text-muted">By: You </div>
                        <span class="small text-muted">published on: <?php echo $post_date; ?></span><br>
                    </div>
                </div>

            <?php

            }

            ?>
        </div>
        <!-- Side widgets-->


        <?php include "../recycle/includes/user_sidebar.php" ?>

    </div>
</div>



<?php include "../homepage/includes/footer.php"?>