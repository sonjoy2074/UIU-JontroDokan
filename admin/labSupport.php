
<?php include "includes/header_html.php"; ?>

<?php include "includes/topbar.php"; ?>

<?php include "../database/db_connect.php"; ?>

<?php
    $id = -1;
    if(isset($_POST['lab_post_submit']))
    {
        $item_name = $_POST['item_name'];
        $available_units = $_POST['available_units'];
        $item_tag = $_POST['lab_tag'];
        $item_details = $_POST['item_details'];

        $item_image = $_FILES['item_image']['name'];
        $item_image_temp = $_FILES['item_image']['tmp_name'];
        move_uploaded_file($item_image_temp, "../lab_support/image/$item_image");


        $query = "INSERT INTO `lab_items`(`item_id`, `item_name`, `unit_history`, `available_units`, `item_image`, `tag`, `item_details`) VALUES(null,'{$item_name}',{$available_units},{$available_units},'{$item_image}','{$item_tag}','{$item_details}')";


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
    }
?>

<div id="layoutSidenav">

    <?php include "includes/sidebar.php"; ?>

    <div id="layoutSidenav_content">
    <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add Remove Products</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Laboratory Support</li>
                    <li class="breadcrumb-item active">Add remove products</li>
                </ol>
            </div>
        </main> 
        <a class="btn btn-primary btn-sm col-md-1 ms-auto mb-2 me-2" type="submit" name="add_new" href="labSupport.php?add_new=new_item<? ?>">+Add New</a>
        
<?php

        include "includes/view_lab_items.php";
        
        
        
        
?>

<div>
  <?php
    if (isset($_GET['add_new']) ) {
      if($_GET['add_new'] = 'new_item' ){
        include "../admin/includes/add_new_lab_Item.php";
        
      }
    }
  ?>
</div>

<?php include "includes/footer.php" ?>