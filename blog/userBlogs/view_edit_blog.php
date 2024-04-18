<?php include('../includes/header_html.php') ?>
<?php include('../includes/header_body.php') ?>
<?php include('../../database/db_connect.php') ?>
<?php
    if(isset($_GET['delete_mp']))
    {
        $del_id = $_GET['delete_mp'];

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


<header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Edit/Delete Posts</h1>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        All posts
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $user = $_SESSION['uid'];
                $query = "select * from posts where post_author = '{$user}'";
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
                        $post_id = $rows['post_id'];
                        $post_auth = $_SESSION['uname'];
                        $post_title = $rows['post_title'];
                        $post_cat = $rows['post_category_id'];
                        $post_img = $rows['post_image'];
                        $post_stat = $rows['post_status'];
                        $post_tags = $rows['post_tags'];
                        $post_comments = $rows['post_comment_count'];
                        $post_date = $rows['post_date'];

                        $find_cat = "select cat_title from post_categories where cat_id = {$post_cat}";
                        $find_cat_q = mysqli_query($connect, $find_cat);

                        while ($row = mysqli_fetch_assoc($find_cat_q)) {
                            $post_cat = $row['cat_title'];
                        }
                    ?>
                        <tr>
                            <td><?php echo mb_strimwidth($post_title, 0, 10, "..."); ?></td>
                            <td><?php echo $post_cat; ?></td>
                            <td><img src="../image/<?php echo $post_img; ?>" alt="no_img" style="height: 50px; width:50px;"></td>
                            <td><?php echo $post_stat; ?></td>
                            <td><?php echo mb_strimwidth($post_tags, 0, 10, "..."); ?></td>
                            <td><?php echo $post_comments; ?></td>
                            <td><?php echo $post_date; ?></td>
                            <td colspan="2" class="text-center" style="width: 100px !important">
                                <a class="btn btn-sm btn-primary" type="submit" name="post_edit" href="edit_my_blog.php?p_id=<?php echo $post_id; ?>&post_stat=<?php echo $post_stat; ?>">Edit</a>
                                <a class="btn btn-sm btn-danger ms-1" type="submit" name="post_delete" href="view_edit_blog.php?delete_mp=<?php echo $post_id; ?>"> Delete</a>
                                <a class="btn btn-sm btn-dark ms-1" type="submit" name="my_post_view" href="post.php?p_id=<?php echo $post_id; ?>">View</a>
                            </td>
                        </tr>
                        


                <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
</div>



        </div>
        <!-- Side widgets-->


        <?php include "../includes/userSidebar.php" ?>

    </div>
</div>



<?php include('../includes/userfooter.php') ?>







