<!--include header file -->
<?php include "../homepage/includes/header_html.php"; ?>
<?php include "../homepage/includes/header_body.php"; ?>

<?php
// if (session_status() == PHP_SESSION_NONE) {
//    session_start();
// }
@include 'config.php';
if (isset($_POST['add_product'])) {
   $user_id = $_SESSION['uid'];
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   //$usr_id= $_SESSION['uid'];
   // $p_ptype=$_POST['flexRadioDefault'];
   if (!empty($_POST["flexRadioDefault"])) {
      foreach ($_POST["flexRadioDefault"] as $value) {
         if ($value == "option1") {
            $p_ptype = "Negotiable";
         } else {
            $p_ptype = "Fixed price";
         }
      }
   }
   $p_description = $_POST['description'];
   $p_selectOp = $_POST['catgSelect'];
   $p_otherOp = $_POST['otherOption'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/' . $p_image;
   $current_time = time();

   // Check if `$p_otherOp` is empty, if so use `$p_selectOp` as the category value
   if (empty($p_otherOp)) {
      $category = $p_selectOp;
   } else {
      $category = $p_selectOp . ': ' . $p_otherOp;
   }

   $stmt = $conn->prepare("INSERT INTO `products` (name, price, image, price_type, Description, Time_stamp, Category, user_id) VALUES ( ?, ?, ?, ?, ?, ?,?, ?)");
   $stmt->bind_param("sssssisi", $p_name, $p_price, $p_image, $p_ptype, $p_description, $current_time, $category, $user_id);

   if ($stmt->execute()) {
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'product added successfully';
   } else {
      $message[] = 'could not add the product';
   }
};

// delete
if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id ") or die('query failed');
   if ($delete_query) {
      header('location:admin.php');
      $message[] = 'product has been deleted';
   } else {
      header('location:admin.php');
      $message[] = 'product could not be deleted';
   };
};

if (isset($_POST['update_product'])) {
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   if(empty($update_p_image))
        {
          $find_img_q = "select image from products where id = {$update_p_id}";

          $find_img = mysqli_query($conn, $find_img_q);

          $row = mysqli_fetch_assoc($find_img);

          $update_p_image = $row['image'];
        }
      move_uploaded_file($update_p_image_tmp_name, "uploaded_img/$update_p_image");

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");
   echo "<meta http-equiv=\"refresh\" content=\"1.2; url='admin.php\" />";
}

?>






<header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Sell Products From Here</h1>
        </div>
    </div>
</header>
<div class="container">
<?php

if (isset($message)) {
   foreach ($message as $message) {
      echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>
   <section>

      <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" name="p_name" placeholder="enter the product name" class="box" required>
         <input type="number" name="p_price" min="0" placeholder="enter the product price" class="box" required>
         <div class="mb-3">
            <textarea class="form-control" name="description" placeholder="Write product details" id="exampleFormControlTextarea1" rows="3"></textarea>
         </div>
         <div class="row">
            <div class="col">
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault[]" id="flexRadioDefault1" value="option1">
                  <label class="form-check-label" for="flexRadioDefault1">
                     Negotiable
                  </label>
               </div>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadioDefault[]" id="flexRadioDefault2" value="option2" checked>
                  <label class="form-check-label" for="flexRadioDefault2">
                     fixed price
                  </label>
               </div>
            </div>
            <div class="col">
               <select class="form-select" aria-label="Default select example" name="catgSelect" onchange="checkOtherOption(this)">
                  <option selected>Micro processor/Micro controler</option>
                  <option value="Sensor">Sensor</option>
                  <option value="Motor">Motor</option>
                  <option value="3">other</option>
               </select>
               <input type="text" id="otherOption" name="otherOption" style="display:none;" />
            </div>
            <script>
               function checkOtherOption(selectObject) {
                  var otherOption = document.getElementById("otherOption");
                  if (selectObject.value == "3") {
                     otherOption.style.display = "inline-block";
                  } else {
                     otherOption.style.display = "none";
                  }
               }
            </script>
         </div>

         <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
         <input type="submit" value="add product" name="add_product" class="btn">
      </form>

   </section>

   <section class="display-product-table">

      <table>

         <thead>
            <th>product image</th>
            <th>product name</th>
            <th>product price</th>
            <th>action</th>
         </thead>

         <tbody>
            <?php
            $user_id = $_SESSION['uid'];
            $select_products = mysqli_query($conn, "SELECT * FROM `products` where user_id = $user_id");
            if (mysqli_num_rows($select_products) > 0) {
               while ($row = mysqli_fetch_assoc($select_products)) {
            ?>

                  <tr>
                     <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                     <td><?php echo $row['name']; ?></td>
                     <td>Tk<?php echo $row['price']; ?>/-</td>
                     <td>
                     <a href="admin.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning"> <i class="fas fa-edit"></i> update </a>
                        <a href="admin.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
                     </td>
                  </tr>

            <?php
               };
            } else {
               echo "<div class='empty'>no product added</div>";
            };
            ?>
         </tbody>
      </table>

   </section>

   <section class="edit-form-container">

      <?php

      if (isset($_GET['edit'])) {
         $edit_id = $_GET['edit'];
         $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
         if (mysqli_num_rows($edit_query) > 0) {
            while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {
      ?>

               <form action="" method="post" enctype="multipart/form-data">
                  <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                  <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                  <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                  <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                  <input type="file" class="box" name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                  <input type="submit" value="update" name="update_product" class="btn btn-warning btn-lg">
                  <input type="reset" value="cancel" id="close-edit" class="btn btn-danger btn-lg" onclick="window.location.href = 'admin.php';">
               </form>
      <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
      ?>

   </section>

</div>
<!-- custom js file link  -->
<script src="js/script.js"></script>
<?php include("../homepage/includes/footer.php") ?>