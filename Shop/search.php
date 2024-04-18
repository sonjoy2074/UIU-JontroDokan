<?php
include('../database/db_connect.php');
$count = "";
if(isset($_POST['submit']))
{

    $search = $_POST['search'];


    $query = "SELECT * FROM `products` WHERE '%$search%' ";

    $search_query = mysqli_query($connect, $query);

    if(!$search_query)
    {
        die("Query failed" . mysqli_error($connect));
    }

    $count = mysqli_num_rows($search_query);
    
}
?>
<?php include('../homepage/includes/header_html.php') ?> 
<?php include('../homepage/includes/header_body.php')?>
        <!-- Page header with logo and tagline-->
        <header class="py-2 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Search Results for "<?php echo $search;?>"</h1>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">



<!-- queries to read posts from db  -->
<?php

    if($count == 0)
    {
        echo "<h1> No Search Results Were found!</h1>";
    }

?>


<section class="latest-product">
            <div class="container">
                <div class="row container">
                    <?php
                    while($row = mysqli_fetch_array($search_query)){ 
                        $item_id = $row['item_id'];
                        $item_name = $row['item_name'];
                        $available_units = $row['available_units'];
                        $item_image = $row['item_image'];
                        $item_tag = $row['tag'];
                        $item_details = $row['item_details'];
                        
                        
                        ?>
                        <div class="col-lg-5">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <img src="image/<?php echo $item_image; ?>" alt="no_image">
                                    <h2 class="product_name">
                                        <h2 class="card-title h4"><a><?php echo mb_strimwidth($item_name, 0, 30, "..."); ?></a></h2>
                                            <a class="text-decoration-none" href=""><?= $item_name ?></a>
                                            <br>
                                        <h7>Available Units : <?= $available_units?></h7>
                                    </h2>
                                    <div class="btn d-flex justify-content-between align-items-center">
                                        <a href="" class="add-to-cart-btn">
                                            Approach to buy
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </section>

                    </div>
                </div>
                <!-- Side widgets-->


<?php include "includes/sidebar.php" ?>
                 
            </div>
        </div>
        <!-- Footer-->
<?php include('../homepage/includes/footer.php') ?>