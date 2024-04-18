
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Draft posts
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
                    <th>Issued Date</th>
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
                    <th>Issued Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $query = "SELECT * FROM posts
                INNER JOIN user
                ON user.id = posts.post_author where post_status='draft'";

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
                            <td><?php echo $post_stat; ?></td>
                            <td><?php echo $post_tags; ?></td>
                            <td><?php echo $post_date; ?></td>
                            <td colspan="2" class="text-center">
                                <a class="btn btn-sm btn-success" type="submit" name="post_edit" href="my_posts.php?approve=<?php echo $post_id; ?>">Approve</a>
                                <a class="btn btn-sm btn-danger ms-1" type="submit" name="post_delete" href="my_posts.php?rejected=<?php echo $post_id; ?>"> Reject</a>
                                <a class="btn btn-sm btn-primary ms-1" type="submit" name="post_view" href="my_posts.php?source=view&p_id=<?php echo $post_id; ?>"><i class="bi bi-eye"></i>View</a>
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




