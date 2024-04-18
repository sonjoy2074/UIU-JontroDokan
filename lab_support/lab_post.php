<?php include('../homepage/includes/header_html.php') ?>
<?php include('../homepage/includes/header_body.php') ?>
<?php include('../database/db_connect.php')?>


<div class="container" style="margin-top: 150px!important;">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card mb-3">
                        <div class="card-body container">

<?php

if(isset($_GET["i_id"])){
    $i_id= $_GET["i_id"];
    $query = "SELECT * FROM `lab_items` WHERE item_id = {$i_id}"; 
    $response = mysqli_query($connect, $query);
}




$count_row = mysqli_num_rows($response);

if ($count_row != 0) {
    while ($rows = mysqli_fetch_assoc($response)) {
        $item_id = $rows['item_id'];
        $item_name = $rows['item_name'];
        $available_units = $rows['available_units'];
        $item_image = $rows['item_image'];
        $item_tag = $rows['tag'];
        $item_details = $rows['item_details'];
        ?>
        <article>
    <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1"><?php echo $item_name; ?></h1>
                <!-- Post meta content-->
                <!-- Post categories-->
                <a class="badge bg-secondary text-decoration-none link-light" href="#!">#<?php echo $item_tag; ?></a>
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4"><img class="img-fluid rounded" src="image/<?php echo $item_image; ?>"  width="500" alt="..." /></figure>
            <!-- Post content-->
            <section class="mb-5">
                <h3 class="fw-bolder mb-1">Details</h3>
                <p class="fs-5 mb-4"><?php echo $item_details; ?></p>
            </section>
        </article>

                                  
                        


        <?php
    }
}
    
    
?>
                </div>
            </div>
        </div>
            <?php include "includes/sidebar.php" ?>
    </div>
</div>


<?php include('../homepage/includes/footer.php') ?>