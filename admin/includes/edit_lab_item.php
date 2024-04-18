<?php
                $query = "SELECT * FROM `lab_items` WHERE item_id=$item_id";
                $response = mysqli_query($connect, $query);
                while ($rows = mysqli_fetch_assoc($response)) {
                    $item_id = $rows['item_id'];
                    $item_name = $rows['item_name'];
                    $available_units = $rows['available_units'];
                    $item_image = $rows['item_image'];
                    $tag = $rows['tag'];
                    $item_details = $rows['item_details'];
                }
                
                if(isset($_POST['lab_update_item_submit']))
                {
                    
            
                    $item_name = $_POST['item_name'];
                    $available_units = $_POST['available_units'];
                    $item_tag = $_POST['lab_tag'];
                    $item_details = $_POST['item_details'];

                    $item_image = $_FILES['item_image']['name'];

                    if(empty($item_image))
                    {
                        $find_img_q = "select item_image from lab_items where item_id = {$item_id}";

                        $find_img = mysqli_query($connect, $find_img_q);

                        $row = mysqli_fetch_assoc($find_img);

                        $item_image = $row['item_image'];
                    }


                    $item_image_temp = $_FILES['item_image']['tmp_name'];
                    move_uploaded_file($item_image_temp, "../lab_support/image/$item_image");


                    $query = "UPDATE `lab_items` SET `item_id`= $item_id,`item_name`='{$item_name}',`available_units`={$available_units},`item_image`='{$item_image}',`tag`='{$item_tag}',`item_details`='{$item_details}' WHERE `item_id` = $item_id";


                    $confirm_posted = mysqli_query($connect, $query);

                    if($confirm_posted)
                    {
                    echo "<div class=\"alert alert-success\" role=\"alert\">
                        post added!
                        </div>";
                    }
                    else
                    {
                    die("<div class=\"alert alert-danger\" role=\"alert\">
                    post is failed to add!
                    </div>". mysqli_error($connect));
                    }
                    header("Refresh:0");
                }

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Edit Item
    </div>
    <div class="card-body">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input class="form-control" id="lab_post_title" type="text" value="<?php echo $item_name ?>" placeholder="Item name" name = "item_name" required/>
                <label for="post_title">Product Name</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="lab_post_author" type="text" value="<?php echo $available_units ?>"placeholder="Available Units" name="available_units" required/>
                <label for="post_author">Available Units</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="lab_post_tags" type="text" value="<?php echo $tag ?>" placeholder="Post Tags" name="lab_tag" required/>
                <label for="post_tags">Product Tags</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Write your contents here.." name="item_details" id="contents" style="height: 300px" required><?php echo $item_details ?></textarea>
                <label  for="contents">Details</label>
              </div>

              
              <!-- image and category  -->
              <div class="row g-2">
                <div class="col-md">
                    <img class="image-fluid" src="../lab_support/image/<?php echo $item_image; ?>" alt="no_img_uploaded_before" style="height: 100px; width:150px;">
                    <label for="formFile" class="form-label">Update Item Image</label>
                    <input class="form-control" type="file" id="formFile" accept="image/png, image/gif, image/jpeg" name="item_image" value="<?php echo $item_image; ?>">
                </div>
                
                
                
              </div>
              <hr>
            <button class="btn btn-primary btn-xl mt-5" type="submit" name="lab_update_item_submit">Save</button>
        </form>
    </div>
</div>
