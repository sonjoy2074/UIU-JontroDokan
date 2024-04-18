<?php
include('../database/db_connect.php');
$count = "";
$search = " ";
if(isset($_POST['submit']))
{
    $search = $_POST['search'];
    $query = "select * from lab_items where item_name like '%$search%' OR tag like '%$search%' ";

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
        <header class="py-2 border-bottom mb-4 hero" style="margin-top: 100px!important;">
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

    if($count == 0 )
    {
        echo "<h1> No Search Results Were found!</h1>";
    }if($search == " "){
        ?>
        <meta http-equiv="refresh" content="0; url='lab_support.php'" />
        <?php
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
                        

                        <div class="col-md-6 d-flex align-items-stretch justify-items-stretch">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href="post.php?p_id=<?php echo $item_id; ?>"><img class="card-img-top" src="image/<?php echo $item_image; ?>" alt="no image"/></a>
                            <div class="card-body">

                                <h2 class="card-title h4"><a href="./user_add_lab_item.php?i_id=<?php echo $item_id; ?>"><?php echo mb_strimwidth($item_name, 0, 30, "..."); ?></a></h2>
                                <div class="small text-muted">By: Admin </div>
                                <span class="small text-muted">Available Units: <?= $available_units?></span>
                                <p class="card-text"><?php echo mb_strimwidth($item_details, 0, 200, "..."); ?></p>
                                <?php 
                                            if($uname){
                                                ?>
                                                <a class="btn btn-primary" href="./user_add_lab_item.php?i_id=<?php echo $item_id; ?>">ADD</a>
                                                <?php
                                            }else{
                                                ?>
                                                <a class="btn btn-primary" href="../customers/login.php">ADD</a>
                                                <?php
                                            }
                                            ?>
                                
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