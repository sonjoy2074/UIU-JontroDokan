<?php include "../homepage/includes/header_html.php" ?>
<?php include "../homepage/includes/header_body.php" ?> 
<?php include "../database/db_connect.php" ?> 

<?php
    
if (isset($_POST["submit"])) {

    $r_name = $_POST['recycle_title'];
    
    $r_type = $_POST['r_type'];
    $r_details = $_POST['description'];

    date_default_timezone_set('Asia/Dhaka');
    $r_date = date('d-m-y');

    
    $r_amount = $_POST['recycle_amount'];

    $r_image = $_FILES["recycle_image"]["name"];
    $post_image_temp = $_FILES['recycle_image']['tmp_name'];
    move_uploaded_file($post_image_temp, "image/$r_image");

    
    $sql = "INSERT INTO `recycling`(`p_id`, `user_id`, `p_name`, `p_image`, `p_type`, `p_date`, `product_amount`, `status`, `p_details`) VALUES('', {$uid},'{$r_name}','{$r_image}','{$r_type}','{$r_date}', {$r_amount} , 0 ,'{$r_details}')";


    $conn = mysqli_query($connect, $sql);

    


    if($conn)
        {
          echo "<div class=\"alert alert-success\" role=\"alert\">
               post added to {$post_stat}!
              </div>";
          echo "<meta http-equiv=\"refresh\" content=\"1.2; url='recycle.php?source='view_all'\" />";
        }
        else
        {
          die("<div class=\"alert alert-danger\" role=\"alert\">
          post is failed to add!
         </div>". mysqli_error($connect));
        }

}


?> 

<header class="py-2 border-bottom mb-4 hero " style="margin-top: 100px!important">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Form for Recycle</h1>
            <p class="lead mb-0">A Way to Save Environment</p>
        </div>
    </div>
</header>


<div class="recycle-form">
    <form class="form-container" action="#" method="post" enctype="multipart/form-data">
        <label for="image">Select Image :</label>
        <input type="file" name="recycle_image" id="image"><br>
        <label for="title">Name :</label>
        <input type="text" name="recycle_title" id="title"><br>
        

        <label for="type">Type:</label>
        <select name="r_type" class="form-select" aria-label="Type">
        <option value="Micro Controller">Micro Controller</option>
        <option value="Motor">Motor</option>
        <option value="Sensor">Sensor</option>
        <option value="Parts">Parts</option>
        <option value="Others">Others</option>
        </select><br>

        <label for="amount">Amount :</label>
        <input type="text" name="recycle_amount" id="recycle_amount"><br>

        <label for="description">Description :</label>
        <textarea name="description" id="recycle_details"></textarea><br><br>

        <button class="btn btn-success" name="submit" href="" class="add-to-cart-btn">
            <i class=""></i> Post
        </button>
    </button>
    </form>
</div>


<?php include "../homepage/includes/footer.php" ?>



