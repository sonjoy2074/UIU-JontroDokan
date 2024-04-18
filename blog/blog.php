<?php include('includes/header.php') ?>
<?php include('../homepage/includes/header_body.php') ?>
<?php include('../database/db_connect.php') ?>
<!-- Page header with logo and tagline-->

<header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to UIU Blog!</h1>
            <p class="lead mb-0">A Busket of Blogs about project and ideas</p>
        </div>
    </div>
</header>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->

            <?php
            $find_f_q = "SELECT * FROM posts
            INNER JOIN user
            ON user.id = posts.post_author where is_featured = 1 and post_status = 'publish'";
            $f_posts = mysqli_query($connect, $find_f_q);

            while ($row = mysqli_fetch_assoc($f_posts)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_date = $row['post_date'];
                $post_author = $row['first_name'] . " " . $row['last_name'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];

            ?>
                <div class="card mb-4">
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="card-img-top" src="image/<?php echo $post_image; ?>" alt="no_image" /></a>
                    <div class="card-body">
                        <h2 class="card-title h4"><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo mb_strimwidth($post_title, 0, 30, "..."); ?></a></h2>
                        <div class="small text-muted">By: <?php echo $post_author; ?>, </div>
                        <span class="small text-muted">published on: <?php echo $post_date; ?></span>
                        <p class="card-text"><?php echo mb_strimwidth($post_content, 0, 200, "..."); ?></p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read more →</a>
                    </div>
                </div>

            <?php

            }

            ?>



            <!-- Nested row for non-featured blog posts-->
            <div class="row">



                <!-- queries to read posts from db  -->
                <?php

                $query = "SELECT * FROM posts
                INNER JOIN user
                ON user.id = posts.post_author where is_featured is NULL and post_status = 'publish'";
                $select_all_posts_query = mysqli_query($connect, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_date = $row['post_date'];
                    $post_author = $row['first_name'] . " " . $row['last_name'];
                    if ($row['post_author'] == 0) {
                        $post_author = 'admin';
                    }
                    $post_content = $row['post_content'];
                    $post_image = $row['post_image'];
                    $post_comment_count = $row['post_comment_count'];
                ?>


                    <div class="col-md-6 d-flex align-items-stretch">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="card-img-top" src="image/<?php echo $post_image ?>" alt="no image" /></a>
                            <div class="card-body">

                                <h2 class="card-title h4"><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo mb_strimwidth($post_title, 0, 30, "..."); ?></a></h2>
                                <div class="small text-muted">By: <?php echo $post_author ?>, </div>
                                <span class="small text-muted">published on: <?php echo $post_date ?></span>
                                <span class="small text-muted">..... <?php echo $post_comment_count; ?> comments</span>
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