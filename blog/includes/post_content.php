<?php
if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];

    $post_inf_q = "select * from posts INNER JOIN user
    ON user.id = posts.post_author where post_id = {$p_id}";

    $post_inf = mysqli_query($connect, $post_inf_q);

    while ($row = mysqli_fetch_assoc($post_inf)) {
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
        $post_tags = $row['post_tags'];
?>


<!-- Post content-->
<article>
    <!-- Post header-->
    <header class="mb-4">
        <!-- Post title-->
        <h1 class="fw-bolder mb-1"><?php echo $post_title; ?></h1>
        <!-- Post meta content-->
        <div class="text-muted fst-italic mb-2">Posted on <?php echo $post_date; ?> by <?php echo $post_author; ?></div>
        <!-- Post categories-->
        <a class="badge bg-secondary text-decoration-none link-light" href="#!"><?php echo $post_tags; ?></a>
    </header>
    <!-- Preview image figure-->
    <figure class="mb-4"><img class="img-fluid rounded" src="image/<?php echo $post_image; ?>" alt="..." /></figure>
    <!-- Post content-->
    <section class="mb-5">
        <p class="fs-5 mb-4"><?php echo $post_content; ?></p>
    </section>
</article>

<?php

    }
}
?>