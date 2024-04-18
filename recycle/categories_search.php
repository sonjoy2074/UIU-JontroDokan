<?php
include('../database/db_connect.php');

if(isset($_GET['cat_title']))
{
    $search = $_GET['cat_title'];
    $query = "select * from recycling where p_type like '%$search%' ";

    $search_query = mysqli_query($connect, $query);

    if(!$search_query)
    {
        die("Query failed" . mysqli_error($connect));
    }

    $count = mysqli_num_rows($search_query);
    $cat_title = $_GET['cat_title'];
    
}
?>
<?php include('../homepage/includes/header_html.php') ?> 
<?php include('../homepage/includes/header_body.php')?>
        <!-- Page header with logo and tagline-->
        <header class="py-2 border-bottom mb-4 hero " style="margin-top: 100px!important">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Search Results for "<?php echo $cat_title;?>"</h1>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">



<!-- queries to read posts from db  -->
<?php

    if($count == 0)
    {
        echo "<h1> No Search Results Were found!</h1>";
    }

    while($row = mysqli_fetch_assoc($search_query))
    {
        $product_id = $row['p_id'];
        $product_name = $row['p_name'];
        $product_user_id = $row['user_id'];
        $product_image = $row['p_image'];
        $product_type = $row['p_type'];
        $product_details = $row['p_details'];;
        $publish_date = $row['p_date']
?>


        <div class="col-md-10">
        <!-- Blog post-->
        <div class="card mb-4">
        <a href="post.php?p_id=<?php echo $product_id; ?>"><img class="card-img-top" src="image/<?php echo $product_image; ?>" alt="no image"/></a>
            <div class="card-body">
        
                <h2 class="card-title h4"><a href="user_recycle_item_details.php?i_id=<?php echo $product_id; ?>"><?php echo mb_strimwidth($product_name, 0, 30, "..."); ?></a></h2>
                <div class="small text-muted">By: <?php echo $uname ?></div>
                <span class="small text-muted">published on: <?php echo $publish_date ?></span>
                <p class="card-text"><?php echo mb_strimwidth($product_details, 0, 200, "..."); ?></p>
            </div>
        </div>
    </div>
<?php
    }
?>
                    </div>
                </div>
                <!-- Side widgets-->


                <?php include "includes/sidebar.php" ?>
                 
                 </div>
             </div>
             <!-- Footer-->
     <?php include('../homepage/includes/footer.php') ?>

