

<?php include "../homepage/includes/header_html.php"; ?>
<?php include "../homepage/includes/header_body.php"; ?>
<?php
include 'config.php';
?>
<!-- Component_details Show -->
<?php  
   if(isset($_GET['p_id'])) {
    $product_id = $_GET['p_id'];
    $sql = "SELECT * FROM `products` WHERE id=$product_id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
      $select_products = mysqli_fetch_assoc($result);
      //category select
            $s_category=$select_products['Category'];
            // Calculate the time elapsed since the post was made
            $elapsed_time = time() - $select_products['Time_stamp'];
            $minutes_elapsed = round($elapsed_time / 60);

            // Calculate the hours elapsed
            $hours_elapsed = round($elapsed_time / 3600);

            // Calculate the days elapsed
            $days_elapsed = round($elapsed_time / 86400);
     ?>
     <header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Product Details</h1>
        </div>
    </div>
</header>

<div class="container">
  <div class="col" >
  <img class="img-fluid" src="../Seller_page/uploaded_img/<?php echo $select_products['image']; ?>" alt="">
  <div style="padding-top: 100px;">
      <p><?php echo $select_products ['Description'];?></p>
    </div>
  </div>
  <div class="col" style="padding-left: 30px; margin:20px;">
      <h1><?php echo $select_products['name']; ?></h1>
      <h5 class="text-primary">
      <?php 
                if ($minutes_elapsed < 60) {
                    echo "Posted: ". $minutes_elapsed ." minutes ago";
                } else if ($hours_elapsed < 24) {
                    echo "Posted: ". $hours_elapsed . " hours ago";
                } else {
                    echo "Posted: ". $days_elapsed . " days ago";
                }
      ?>
      </h5>
      <div class="row">
        <div class="col">
        <h4>Price: <?php echo $select_products['price']. " "; ?> Tk</h4>
        <p class="fst-italic text-primary"><?php echo $select_products['price_type'];?></p>
        </div>
        <!-- <div class="col-2">
        </div> -->
      </div>
      <br>
<?php 
$sql = "SELECT * FROM `user` WHERE id={$select_products['user_id']}";
$result = mysqli_query($conn, $sql);

$user_info = mysqli_fetch_assoc($result);

?>
      <div class="card">
           <div class="card-header">Seller info</div>
                <div class="row">
                    <div class="p-5">
                    <div>
                       <h4>For sale by <?php echo $user_info['first_name']. " " . $user_info['last_name']; ?></h4>
                    </div>
                    <div>
                         <h5>Phone No. <?php echo $user_info['phone']; ?></h5>
                    </div>
                    <div>
                       <p>Email: <?php echo $user_info['email']; ?></p>
                    </div>
                    </div>
                </div>
        </div>
  </div>
</div>
<?php
      }
    }
  ?>
<!-- show Similar catagory products -->
    <div class="row" style="padding-left:40px; padding-bottom:10px; width:96%">
            <div class="card md-4">
                <div class="card-body container">
                    <h2>Similar products </h2>
                    <section class="latest-product">
    <div class="container">
    <div class="row container">
    <?php     
      $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE Category='$s_category' AND id<>$product_id ORDER BY id DESC LIMIT 4");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>         
            <div class="col-lg-3" >
                <div class="card border-0" style="width:270px;height:300px;">
                    <div class="card-body text-center" >
                      <img style="height:120px;width:170px;" src="../Seller_page/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                         <h2 class="product_name">
                            <a class="text-decoration-none" href=""><?php echo $fetch_product['name']; ?></a>
                        </h2>
                        <h2>Tk <?php echo $fetch_product['price']; ?></h2>    
                        <div class="btn">
                            <a href=".././Seller_page/Component.php?p_id=<?php echo $fetch_product['id']; ?>" class="btn btn-secondary ">Approach to buy
                            </a>
                        </div>
                    </div>
                </div>
            </div> 
                <?php
         };
      };
      ?>
                 </div>
                </div>
            </div>
</section>
                </div>
            </div>
    </div>
<?php include "../homepage/includes/footer.php"; ?>