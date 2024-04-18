<?php 

$post_title = "";
$post_author = "";
$post_tags = "";
$post_content = "";
$post_cat = "";
$post_image = "";
$post_date = "";
$post_stat = "";

  if(isset($_GET['p_id']))
  {
    $the_post_id = $_GET['p_id'];
    $query_for_ed = "select * from posts where post_id = {$the_post_id}";
    $id_res = mysqli_query($connect, $query_for_ed);

    while($row = mysqli_fetch_assoc($id_res))
    {
        $post_title = $row['post_title'];
        $post_tags = $row['post_tags'];
        $post_content = $row['post_content'];
        $post_cat = $row['post_category_id'];
        $post_image = $row['post_image'];
        $post_stat = $row['post_status'];
    }
  }
  if(isset($_POST['update_post']))
  {
        $post_title = $_POST['post_title'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];

        $post_cat = $_POST['post_cat'];
        $post_image = $_FILES['post_image']['name'];

        if(empty($post_image))
        {
          $find_img_q = "select post_image from posts where post_id = {$the_post_id}";

          $find_img = mysqli_query($connect, $find_img_q);

          $row = mysqli_fetch_assoc($find_img);

          $post_image = $row['post_image'];
        }

      
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_image_temp, "../blog/image/$post_image");

        date_default_timezone_set('Asia/Dhaka');

        $post_stat = $_POST['post_stat'];


        $post_update_q = "update posts set ";
        $post_update_q .= "post_title = '{$post_title}', ";
        $post_update_q .= "post_tags = '{$post_tags}', ";
        $post_update_q .= "post_content = '{$post_content}', ";
        $post_update_q .= "post_category_id = '{$post_cat}', ";
        $post_update_q .= "post_image = '{$post_image}', ";
        $post_update_q .= "post_status = '{$post_stat}' ";
        $post_update_q .= "where post_id = {$the_post_id}";


        $update_post = mysqli_query($connect, $post_update_q);


        if($update_post)
        {
          echo "<div class=\"alert alert-success\" role=\"alert\">
               post updated!
              </div>";
      
          echo "<meta http-equiv=\"refresh\" content=\"1.2; url='admin_posts.php?source='view_all'\" />";
        }
        else
        {
          die("<div class=\"alert alert-danger\" role=\"alert\">
          post is failed to update!
         </div>". mysqli_error($connect));
        }

  }
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit post
    </div>
    <div class="card-body">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input class="form-control" id="post_title" type="text" placeholder="Add post title" name = "post_title" value="<?php echo $post_title; ?>" required/>
                <label for="post_title">Post Title</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="post_author" type="text" placeholder="Post Author" name="post_author" value="Admin" disabled/>
                <label for="post_author">Post Author</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="post_tags" type="text" placeholder="Post Tags" name="post_tags" value="<?php echo $post_tags; ?>" required/>
                <label for="post_tags">Post Tags</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Write your contents here.." name="post_content" id="contents" style="height: 300px" required><?php echo $post_content; ?></textarea>
                <label for="contents">Content</label>
              </div>

              
              <!-- image and category  -->
              <div class="row g-2">
                <div class="col-md">
                    <img class="image-fluid" src="../blog/image/<?php echo $post_image; ?>" alt="no_img_uploaded_before" style="height: 100px; width:150px;">
                    <label for="formFile" class="form-label">Update Title Image</label>
                    <input class="form-control" type="file" id="formFile" accept="image/png, image/gif, image/jpeg" name="post_image" value="<?php echo $post_image; ?>">
                </div>
                <div class="col-md mt-4">
                  <div class="form-floating">
                    <select class="form-select" id="cat" name="post_cat" required>

<?php
  $cat_query = "select * from post_categories";
  $cats = mysqli_query($connect, $cat_query);



  while($rows = mysqli_fetch_assoc($cats))
  {
    if($post_cat == $rows['cat_id'])
    {
      ?>

      <option selected value="<?php echo $post_cat; ?>"><?php echo $rows['cat_title']; ?></option>
      <?php
      continue;
    }
    ?>
    <option value="<?php echo $rows['cat_id'];?>"><?php echo $rows['cat_title'];?></option>
<?php
  }
?>
                    </select>
                    <label for="car">Select a category</label>
                  </div>
                </div>
                <div class="col-md mt-4">
                  <div class="form-floating">
                    <select class="form-select" id="post_stat" name="post_stat" required>
<?php
  if($post_stat == "draft")
  {
    echo "<option value=\"publish\">Publish</option>";
    echo "<option value=\"draft\" selected>Draft</option>";

  }
  else 
  { 
    echo "<option value=\"publish\" selected>Publish</option>";
    echo "<option value=\"draft\">Draft</option>";
  }

?>                   
                    </select>
                    <label for="post_stat">Select Post Status</label>
                  </div>
                </div>
              </div>
              <hr>
            <button class="btn btn-primary btn-xl mt-5" type="submit" name="update_post">UPDATE POST</button>
        </form>
    </div>
</div>
