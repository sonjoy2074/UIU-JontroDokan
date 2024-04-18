


<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Add a new post
    </div>
    <div class="card-body">
        <form action="labSupport.php" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input class="form-control" id="lab_post_title" type="text" placeholder="Product name" name = "item_name" required/>
                <label for="post_title">Product Name</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="lab_post_author" type="text" placeholder="Available Units" name="available_units" required/>
                <label for="post_author">Available Units</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="lab_post_tags" type="text" placeholder="Post Tags" name="lab_tag" required/>
                <label for="post_tags">Product Tags</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Write your contents here.." name="item_details" id="contents" style="height: 300px" required></textarea>
                <label for="contents">Details</label>
              </div>

              
              <!-- image and category  -->
              <div class="row g-2">
                <div class="col-md">
                    <div class="col-md mt-4">
                        <label for="formFile" class="form-label">Upload Item Image</label>
                        <input class="form-control" type="file" id="formFile" accept="image/png, image/gif, image/jpeg" name="item_image">
                    </div>
                </div>
                
                
                
              </div>
              <hr>
            <button class="btn btn-primary btn-xl mt-5" type="submit" name="lab_post_submit">ADD POST</button>
        </form>
    </div>
</div>
