<?php include "includes/header_html.php"; ?>

<?php include "includes/topbar.php"; ?>

<div id="layoutSidenav">

  <?php include "includes/sidebar.php"; ?>

  <?php include('../database/db_connect.php'); include "functions.php"; ?>


  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">
        <h1 class="mt-4">Categories</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item">Blog</li>
          <li class="breadcrumb-item active">Categories</li>
        </ol>
      </div>
    </main>
    <div class="row m-4">
      <div class="col-md-3">


      <!-- adding categories   -->
<?php insert_category($connect); ?>

        <form action="categories.php" method="post">
          <label for="#create_cat" class="form-label">Create a Category</label>
          <div class="input-group ml-3">
            <input type="text" class="form-control" placeholder="Category name" aria-label="Category name" aria-describedby="cat_name" id="create_cat" name="cat_title">
            <button class="btn btn-dark" type="submit" id="cat_name" name="add" value="add_category">Add</button>
          </div>
        </form>
      </div>



      <!-- updating categories  -->
<?php update_category($connect);?>



      <div class="col-md-6 offset-2">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th scope="col" style="display:none">#</th>
              <th scope="col">Category Name</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>

            <!-- deletion  -->

<?php delete_category($connect);?>

            <!-- show data  -->

            <?php
            $query = "select * from post_categories";

            $response = mysqli_query($connect, $query);

            ?>
            <?php
            while ($rows = mysqli_fetch_assoc($response)) {
              $cat_id = $rows['cat_id'];
              $cat_title = $rows['cat_title'];
            ?>
              <tr>
                <th scope="row" style="display : none"><?php echo $cat_id ?></th>
                <td><?php echo $cat_title ?></td>

                <td colspan="2" class="text-center">
                  <a class="btn btn-sm btn-primary" type="submit" name="edit" href="categories.php?edit=<?php echo $cat_id; ?>">Edit</a>
                  <a class="btn btn-sm btn-danger ms-2" type="submit" name="delete" href="categories.php?delete=<?php echo $cat_id; ?>"> Delete</a>
                </td>
              </tr>
            <?php
            }
            ?>

          </tbody>
        </table>
      </div>

      <div class="col-md-3">
        <form action="categories.php" method="post">
          <?php
          if (isset($_GET['edit'])) {
            $edit_title = $_GET['edit'];
            $cat_title = "";
            $cat_id = 0;
            $find_title = "select * from post_categories where cat_id = {$edit_title}";

            $select_categories_id = mysqli_query($connect, $find_title);

            while($row = mysqli_fetch_assoc($select_categories_id))
            {
              $cat_title = $row['cat_title'];
              $cat_id = $row['cat_id'];
            }
          ?>
            <label for="#cat_update" class="form-label">Edit Category</label>
            <div class="input-group ml-3">
              <input type="text" class="form-control" placeholder="Category name" aria-label="Category name" aria-describedby="cat_update" id="cat_update" name="ed_cat_title" value="<?php echo $cat_title?>">
              <button class="btn btn-dark" type="submit" id="cat_update" name="update" value="<?php echo $cat_id ?>">Update</button>
            </div>


          <?php
          }
          ?>

        </form>
      </div>
    </div>

    <?php include "includes/footer.php" ?>