<?php include "includes/header_html.php"; ?>

<?php include "includes/topbar.php"; ?>

<div id="layoutSidenav">

    <?php include "includes/sidebar.php"; ?>
    <?php include "../database/db_connect.php"; ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Admin posts</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Blog</li>
                    <li class="breadcrumb-item active">Admin posts</li>
                </ol>
            </div>
        </main> 
        <a href="admin_posts.php?source=add_new" class="btn btn-primary btn-sm col-md-1 ms-auto mb-2 me-2">Add New</a>

<!-- deletion  -->
<?php
    if(isset($_GET['delete']))
    {
        $del_id = $_GET['delete'];

        $del_query = "delete from posts where post_id = {$del_id}";
        $del_res = mysqli_query($connect, $del_query);

        if($del_query)
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
if (isset($_GET['source'])) {
    $source = $_GET['source'];
} else {
    $source = '';
}
switch ($source) {
    case "add_new":
        include "includes/add_new_post.php";
        break;
    case "drafts":
        include "includes/all_post_drafts.php";
        break;
    case "edit_post":
        include "includes/edit_post.php";
        break;    
    default:
        include "includes/view_admin_posts.php";
        break;
}



?>
<?php include "includes/footer.php" ?>