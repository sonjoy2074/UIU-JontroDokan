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
?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        View Post
    </div>
    <div class="card-body">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input class="form-control" id="post_title" type="text" placeholder="Add post title" name = "post_title" value="<?php echo $post_title; ?>" disabled/>
                <label for="post_title">Post Title</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="post_author" type="text" placeholder="Post Author" name="post_author" value="Admin" disabled/>
                <label for="post_author">Post Author</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="post_tags" type="text" placeholder="Post Tags" name="post_tags" value="<?php echo $post_tags; ?>" disabled/>
                <label for="post_tags">Post Tags</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Write your contents here.." name="post_content" id="contents" style="height: 300px" disabled><?php echo $post_content; ?></textarea>
                <label for="contents">Content</label>
              </div>

              
              <!-- image and category  -->
              <div class="row g-2">
                <div class="col-md">
                    <img class="image-fluid" src="../blog/image/<?php echo $post_image; ?>" alt="no_img_uploaded_before" style="height: 100px; width:150px;">
                    <label for="formFile" class="form-label">Title Image</label>
                </div>
                <div class="col-md mt-4">
                  <div class="form-floating">
                    <select class="form-select" id="cat" name="post_cat" disabled>

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
                    <select class="form-select" id="post_stat" name="post_stat" disabled>
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
        </form>
    </div>
</div>
