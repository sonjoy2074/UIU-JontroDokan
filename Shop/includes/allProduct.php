<section class="latest-product">
                    <div class="container">
                    <div class="row container">
                    <?php
            $where_clause = '';
            if (isset($_GET['category'])) {
                $searchTerm = isset($_GET['search'])?$_GET['search']:"";
                $categories = $_GET['category'];
                //echo $categories;
                $where_clause = "WHERE name like '%$searchTerm%' and category IN ('" . implode("','", $categories) . "')";
            }else{
                $searchTerm = isset($_GET['search'])?$_GET['search']:"";
                //$categories = $_GET['category'];
                //echo $categories;
                $where_clause = "WHERE name like '%$searchTerm%' ";
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
/*
            $search_clause = '';
            if(isset($_GET['search'])){
                $searchTerm = $_GET['search'];
                $search_clause = "where name like '%$searchTerm%'";
            }
            */

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
                                        <div class="btn">
                                            <a href=".././Seller_page/Component.php?p_id=<?php echo $fetch_product['id']; ?>" class="btn btn-secondary">
                                            Approach to buy
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