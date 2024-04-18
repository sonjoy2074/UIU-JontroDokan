<div class="col-lg-4">

    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="search.php" method="post">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="search" name="search" />
                    <button class="btn btn-primary" id="button-search" type="submit" name="submit" >Go!</button>
                </div>
            </form>
        </div>
    </div>




    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <?php
                $query = "select * from post_categories inner join posts on post_category_id = cat_id limit 10";

                $categories_result = mysqli_query($connect, $query);

                while ($row = mysqli_fetch_assoc($categories_result)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                ?>
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">

                            <li><a href="categories_search.php?cat_id=<?php echo $cat_id; ?>&cat_title=<?php echo $cat_title; ?>"><?php echo $cat_title ?></a></li>
                        </ul>
                    </div>

                <?php
                }


                ?>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <!-- <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">Nothing's here till now!</div>
    </div> -->
</div>