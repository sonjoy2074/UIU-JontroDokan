
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Rejected Posts
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
                ON user.id = posts.post_author where post_status='rejected'";

                $rej_response = mysqli_query($connect, $query);

                $count_row = mysqli_num_rows($rej_response);
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
                    while ($rows = mysqli_fetch_assoc($rej_response)) {
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
                            <td><?php echo $post_title; ?></td>
                            <td><?php echo $post_cat; ?></td>
                            <td><img src="../blog/image/<?php echo $post_img; ?>" alt="no_img" style="height: 50px; width:50px;"></td>
                            <td><?php echo $post_stat; ?></td>
                            <td><?php echo $post_tags; ?></td>
                            <td><?php echo $post_comments; ?></td>
                            <td><?php echo $post_date; ?></td>
                            <td colspan="2" class="text-center">
                                <a class="btn btn-sm btn-success" type="submit" name="post_edit" href="my_posts.php?approve=<?php echo $post_id; ?>">Approve</a>
                                <a class="btn btn-sm btn-danger ms-2" type="submit" name="post_delete" href="my_posts.php?delete=<?php echo $post_id; ?>"> Delete</a>
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




