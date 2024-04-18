<!-- approved posts  -->
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Published posts
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
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
                    <th>Id</th>
                    <th>Author</th>
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
                $query = "SELECT * FROM posts
                INNER JOIN user
                ON user.id = posts.post_author where post_status='publish'";

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
                        <td> </td>
                        <td> </td>
                    </tr>


                    <?php
                } else {
                    while ($rows = mysqli_fetch_assoc($response)) {
                        $post_id = $rows['post_id'];
                        $post_auth = $rows["first_name"]." ".$rows["last_name"];
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
                            <td><?php echo $post_id; ?></td>
                            <td><?php echo $post_auth; ?></td>
                            <td><?php echo mb_strimwidth($post_title, 0, 50, "..."); ?></td>
                            <td><?php echo $post_cat; ?></td>
                            <td><img src="../blog/image/<?php echo $post_img; ?>" alt="no_img" style="height: 50px; width:50px;"></td>
                            <td><?php echo $post_stat . "ed"; ?></td>
                            <td><?php echo $post_tags; ?></td>
                            <td><?php echo $post_comments; ?></td>
                            <td><?php echo $post_date; ?></td>
                            <td colspan="2" class="text-center">
                                <a class="btn btn-sm btn-danger ms-2" type="submit" name="post_delete" href="published_posts.php?delete=<?php echo $post_id; ?>"> Remove </a>
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




<!-- featured posts  -->


<?php
if (isset($_GET['delete_f'])) {
    $p_id = $_GET['delete_f'];
    $post_f_q = "update posts set is_featured = NULL where post_id = {$p_id}";

    $res = mysqli_query($connect, $post_f_q);
    if ($res) {
        echo "<div class=\"alert alert-success\" role=\"alert\">
                            removed from featured post
                            </div>";
    } else {
        die('Query error' . mysqli_error($connect));
    }
}
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Featured posts
    </div>

    <?php
    if (isset($_POST['add_featured'])) {
        $f_post_id = $_POST['post_id'];
        $find_post_q = "select post_id, post_title from posts where post_id = {$f_post_id}";
        $find_post = mysqli_query($connect, $find_post_q);

        if ($find_post) {
            $count = mysqli_num_rows($find_post);
            if ($count > 0) {
                $post_f_q = "update posts set is_featured = 1 where post_id = {$f_post_id}";
                $res = mysqli_query($connect, $post_f_q);
                if ($res) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">
                            added to featured posts
                            </div>";
                } else {
                    die('Query error' . mysqli_error($connect));
                }
            } else {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
      invalid id
      </div>";
            }
        } else {
            die('Query error' . mysqli_error($connect));
        }
    }
    ?>





    <div class="card-body">
        <form action="published_posts.php" method="post">
            <label for="#postID" class="form-label">Insert existing post id</label>
            <div class="input-group ml-3">
                <input type="number" class="form-control" placeholder="post id" aria-label="post id" aria-describedby="postID" id="postID" name="post_id">
                <button class="btn btn-dark" type="submit" id="postID" name="add_featured" value="add_post">Add</button>
            </div>
        </form>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Post Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>


                <?php
                $view_f_q = "select post_id, post_title from posts where is_featured is not NULL";
                $view_f = mysqli_query($connect, $view_f_q);

                while ($row = mysqli_fetch_assoc($view_f)) {
                    $p_id = $row['post_id'];
                    $p_title = $row['post_title'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $p_id ?></th>
                        <td><?php echo mb_strimwidth($p_title, 0, 50, "..."); ?></td>
                        <td><a class="btn btn-sm btn-danger ms-2 mx-auto" type="submit" name="delete_f" href="published_posts.php?delete_f=<?php echo $p_id; ?>">Remove</a></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>