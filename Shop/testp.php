
<?php
@include '../Seller_page/config.php';
include "../homepage/includes/header_html.php"; 
include "../homepage/includes/header_body.php";
?> 

<style>
    .dropdown {
        margin-left: auto !important;

    }
</style>
<div class="container">
    <div style="padding-top: 10px;">
    <div class="row">
    <div class="col">  
     <div  style="height: 150px;" class="card mb-4">
        <div class="card-header">Search</div>
            <div class="card-body">
                <div class="input-group">
                    <input type="text" class="form-control bg-light text-dark" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default btn-primary" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card md-4">
           <div class="card-header">Filter</div>
              <form method="GET">
                <div class="row">                 
                    <div class="col" style="padding-left:20px;">
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category[]" value="Micro processor/Micro controler" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">Micro Controller</label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category[]" value="Motors" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">Motors</label>
                    </div>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category[]" value="Sensors" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3">Sensors</label>
                    </div>
                    </div>
                    <div class="col">
                    <label for="sort-by">Sort by (Price)</label>
                        <select class="form-select form-select-sm " aria-label=".form-select-lg example" id="sort-by" name="sort-by" style="width:90%">
                            <option value="price_asc">Price: Low to High</option>
                            <option value="price_desc">Price: High to Low</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" >Filter</button>
                  
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
    <div class="row" style="padding-left:10px; padding-right:10px; padding-bottom:10px">
            <div class="card md-4">
                <div class="card-body container">
                    <h2>Latest Products</h2>
                    <section class="latest-product">
                            <div class="container">
                            <div class="row container">
                            <?php
            $where_clause = '';
            if (isset($_GET['category'])) {
                $categories = $_GET['category'];
                $where_clause = "WHERE category IN ('" . implode("','", $categories) . "')";
            }

            $order_by_clause = '';
            if (isset($_GET['sort-by'])) {
                $sort_by = $_GET['sort-by'];
                if ($sort_by === 'price_asc') {
                    $order_by_clause = 'ORDER BY price ASC';
                } else if ($sort_by === 'price_desc') {
                    $order_by_clause = 'ORDER BY price DESC';
                }
            }

            // $select_products = mysqli_query($conn, "SELECT * FROM `products` $where_clause $order_by_clause");
            $select_products = mysqli_query($conn, "SELECT * FROM `products` $where_clause UNION SELECT * FROM (SELECT * FROM `products` ORDER BY id DESC LIMIT 4) as last_four $order_by_clause");
            // $select_products = mysqli_query($conn, "SELECT * FROM `products` $where_clause $order_by_clause ORDER BY id DESC LIMIT 4");

            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>        
                                    <div class="col-lg-3" >
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
                </div>
            </div>
            <!-- All products section -->
            <div class="card md-4">
                <div class="card-body container">
                    <h2>All Products</h2>
        <section class="latest-product">
                    <div class="container">
                    <div class="row container">
                    <?php
            $where_clause = '';
            if (isset($_GET['category'])) {
                $categories = $_GET['category'];
                $where_clause = "WHERE category IN ('" . implode("','", $categories) . "')";
            }

            $order_by_clause = '';
            if (isset($_GET['sort-by'])) {
                $sort_by = $_GET['sort-by'];
                if ($sort_by === 'price_asc') {
                    $order_by_clause = 'ORDER BY price ASC';
                } else if ($sort_by === 'price_desc') {
                    $order_by_clause = 'ORDER BY price DESC';
                }
            }

            $select_products = mysqli_query($conn, "SELECT * FROM `products` $where_clause $order_by_clause");

            if(mysqli_num_rows($select_products) > 0){
                while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>     
                            <div class="col-lg-3" >
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
                </div>
            </div>

    </div>
</div>

<?php include "../homepage/includes/footer.php" ?>