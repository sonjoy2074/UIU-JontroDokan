<?php include('../includes/header_html.php') ?>
<?php include('../includes/header_body.php') ?>
<?php include('../../database/db_connect.php') ?>
<header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Add Post</h1>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <?php
        // echo $connect;
        if (isset($_POST['create_post'])) {
            $post_title = $_POST['post_title'];
            $post_tags = $_POST['post_tags'];
            $post_content = $_POST['post_content'];
            $post_author = $_SESSION['uid'];
            $post_cat = $_POST['post_cat'];
            $post_image = $_FILES['post_image']['name'];
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            move_uploaded_file($post_image_temp, "../../blog/image/$post_image");

            $post_comment = 0;
            date_default_timezone_set('Asia/Dhaka');
            $post_date = date('d-m-y');
            $post_stat = 'draft';

            $create_post_query = "insert into posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
            $create_post_query .= "values({$post_cat}, '{$post_title}', '{$post_author}', '{$post_date}', '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment}', '{$post_stat}')";


            $confirm_posted = mysqli_query($connect, $create_post_query);

            if ($confirm_posted) {
                echo "<div class=\"alert alert-success\" role=\"alert\">
               post added to {$post_stat}!
              </div>";
            } else {
                die("<div class=\"alert alert-danger\" role=\"alert\">
          post is failed to add!
         </div>" . mysqli_error($connect));
            }
        }
        ?>


        <div class="card mb-4">
            <div class="card-body">
                <div class="card-header my-1 h5 mb-4 text-center">
                    Create a new post
    </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="post_title" type="text" placeholder="Add post title" name="post_title" required />
                        <label for="post_title">Post Title</label>
                    </div>
                    <div class="form-floating mb-3">
                        <?php
                        if (isset($_SESSION['uname'])) {
                            $post_author = $_SESSION['uname'];
                        ?>
                            <input class="form-control" id="post_author" type="text" placeholder="Post Author" name="post_author" disabled value="<?php echo $post_author; ?>" />
                            <label for="post_author">Post Author</label>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="post_tags" type="text" placeholder="Post Tags" name="post_tags" required />
                        <label for="post_tags">Post Tags</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Write your contents here.." name="post_content" id="contents" style="height: 300px" required rows="30" cols="90"></textarea>
                        <label for="contents">Content</label>
                    </div>


                    <!-- image and category  -->
                    <div class="row g-2">
                        <div class="col-md">
                            <label for="formFile" class="form-label">Upload Title Image</label>
                            <input class="form-control" type="file" id="formFile" accept="image/png, image/gif, image/jpeg" name="post_image">
                        </div>
                        <div class="col-md mt-4">
                            <div class="form-floating">
                                <select class="form-select" id="cat" name="post_cat" required>
                                    <option selected>Select a category</option>

                                    <?php
                                    $cat_query = "select * from post_categories";
                                    $cats = mysqli_query($connect, $cat_query);



                                    while ($rows = mysqli_fetch_assoc($cats)) {
                                    ?>
                                        <option value="<?php echo $rows['cat_id']; ?>"><?php echo $rows['cat_title']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <label for="car">Select a category</label>
                            </div>
                        </div>
                        <div class="col-md mt-4">
                            <div class="form-floating">
                                <select class="form-select" id="post_stat" name="post_stat" disabled>
                                    <option value="draft" selected>Draft</option>
                                </select>
                                <label for="post_stat">Select Post Status</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-xl mt-5" type="submit" name="create_post">ADD POST</button>
                </form>
            </div>
        </div>
            
        </div>
        <!-- Side widgets-->


        <?php include "../includes/userSidebar.php" ?>

    </div>
</div>



<?php include('../includes/userfooter.php') ?>






