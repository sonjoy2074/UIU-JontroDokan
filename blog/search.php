<?php
include('../database/db_connect.php');
if(isset($_POST['submit']))
{
    $search = $_POST['search'];
    $query = "select * from posts INNER JOIN user on post_author = user.id where ((post_category_id = (select cat_id from post_categories where cat_title like '%$search%')) or post_tags like '%$search%'  or post_title like '%$search%' or (post_author = (select id from user where first_name like '%$search%' or last_name like '%$search%'))) and post_status = 'publish'";

    $search_query = mysqli_query($connect, $query);

    if(!$search_query)
    {
        die("Query failed" . mysqli_error($connect));
    }

    $count = mysqli_num_rows($search_query);
    
}
?>
<?php include('includes/header.php') ?>
<?php include('../homepage/includes/header_body.php')?>
        <!-- Page header with logo and tagline-->
        <header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
            <div class="container">
                <div class="text-center my-5">
                    <p class="lead mb-0">Search Results for "<?php echo $search;?>"</p>
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
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_author = $row['first_name'] . " " . $row['last_name'];
        if($row['post_author'] == 0)
        {
            $post_author = 'admin';
        }
        $post_content = $row['post_content'];
        $post_image = $row['post_image'];

?>


<div class="col-md-10">
        <!-- Blog post-->
        <div class="card mb-4">
        <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="card-img-top" src="image/<?php echo $post_image; ?>" alt="no image"/></a>
            <div class="card-body">
        
                <h2 class="card-title h4"><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo mb_strimwidth($post_title, 0, 30, "..."); ?></a></h2>
                <div class="small text-muted">By: <?php echo $post_author; ?>, </div>
                <span class="small text-muted">published on: <?php echo $post_date ?></span>
                <p class="card-text"><?php echo mb_strimwidth($post_content, 0, 200, "..."); ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read more →</a>
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
<?php include('includes/footer.php') ?>

