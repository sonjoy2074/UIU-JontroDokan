<?php
include('../database/db_connect.php');

    $search = " ";
    if(isset($_POST['submit']))
    {
    $search = $_POST['search'];
    $query = "select * from recycling where p_name like '%$search%' OR p_type like '%$search%' ";

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
        <header class="py-2 border-bottom mb-4 hero " style="margin-top: 119px!important">
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
    }if($search == " "){
        ?>
        <meta http-equiv="refresh" content="0; url='recycle.php'" />
        <?php
    }

?>


<section class="latest-product">
            <div class="container">
                <div class="row container">
                    <?php
                    while($row = mysqli_fetch_array($search_query)){ 
                        $product_id = $row['p_id'];
                        $product_name = $row['p_name'];
                        $product_user_id = $row['user_id'];
                        $product_image = $row['p_image'];
                        $product_type = $row['p_type'];
                        $product_details = $row['p_details'];
                        $publish_date = $row['p_date'];
                        $available_units = $row['product_amount'];

                        $q_u_name = "SELECT * FROM user WHERE id = $product_user_id";
                        $q_res = mysqli_query($connect, $q_u_name);

                        while($row = mysqli_fetch_assoc($q_res)){
                            $user_name = $row['first_name']." ".$row['last_name'];
                        }
                        
                        
                        ?>
                        <div class="col-md-6 d-flex align-items-stretch">
                            <!-- Blog post-->
                                <div class="card mb-4">
                                    <a href="productcard.php?p_id=<?php echo $product_id; ?>"><img class="card-img-top" src="image/<?php echo $product_image; ?>" alt="no image"/></a>
                                    <div class="card-body">

                                        <h2 class="card-title h4"><a href="user_recycle_item_details.php?i_id=<?php echo $product_id; ?>"><?php echo mb_strimwidth($product_name, 0, 30, "..."); ?></a></h2>
                                        <div class="small text-muted">By: <?php echo $user_name; ?> </div>
                                        <div class="small text-muted">Type: <?php echo $product_type; ?> </div>
                                        <span class="small text-muted">Available Units: <?php echo $available_units ?></span>
                                        <br>
                                        <span class="small text-muted">published on: <?php echo $publish_date ?></span>
                                        
                                        
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