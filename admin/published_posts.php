<?php include "includes/header_html.php"; ?>

<?php include "includes/topbar.php"; ?>

<div id="layoutSidenav">

    <?php include "includes/sidebar.php"; ?>
    <?php include "../database/db_connect.php"; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Published and Featured Posts</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Blog</li>
                    <li class="breadcrumb-item active">Published and Featured Posts</li>
                </ol>
            </div>
        </main> 

<!-- deletion  -->
<?php
    if(isset($_GET['delete']))
    {
        $del_id = $_GET['delete'];

        $del_query = "delete from posts where post_id = {$del_id}";
        $del_res = mysqli_query($connect, $del_query);

        if($del_res)
        {
            echo "<div class=\"alert alert-success\" role=\"alert\">
                {$del_id} successfully deleted!
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>";
        }
        else
        {
            die("query failed!" . mysqli_error($connect));
        }
    }
?>
<?php
    if(isset($_GET['approve']))
    {
        $app_id = $_GET['approve'];

        $post_update_q = "update posts set ";
        $post_update_q .= "post_status = 'publish' ";
        $post_update_q .= "where post_id = {$app_id}";


        $app_res = mysqli_query($connect, $post_update_q);

        if($app_res)
        {
            echo "<div class=\"alert alert-success\" role=\"alert\">
                {$app_id} successfully approved!
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>";
        }
        else
        {
            die("query failed!" . mysqli_error($connect));
        }
    }
?>

<?php
if (isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = '';
}
switch ($source) {
    case "add_new":
        include "includes/add_new_post.php";
        break;
    default:
        include "includes/view_published_posts.php";
        break;
}

?>



<?php include "includes/footer.php" ?>