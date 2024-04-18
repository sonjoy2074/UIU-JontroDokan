<?php
@include 'config.php';
?> 

<section class="latest-product">
    <div class="container">
    <div class="row container">
    <?php     
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>         
            <div class="col-lg-3 mb-4" >
                <div class="card border-0 shadow-sm" style="width:270px;height:300px;">
                    <div class="card-body text-center" >
                      <img style="height:120px;width:170px;" src="../Seller_page/uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
                         <h2 class="product_name">
                            <a class="text-decoration-none" href=""><?php echo $fetch_product['name']; ?></a>
                        </h2>
                        <h2>Tk <?php echo $fetch_product['price']; ?></h2>    
                        <div class="btn d-flex justify-content-between align-items-center">
                            <a href=".././Seller_page/Component.php?p_id=<?php echo $fetch_product['id']; ?>" class="add-to-cart-btn ">
                                <i class="bi bi-cart4"></i> Add to Cart
                            </a>
                            <a href="" class="add-to-favorite text-success">
                                <i class="bi bi-heart "></i>
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
          