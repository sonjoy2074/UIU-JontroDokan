<?php include "../homepage/includes/header_html.php" ?>
<?php include "../homepage/includes/header_body.php" ?>
<?php include "../database/db_connect.php"; ?>

<header class="py-5 border-bottom mb-4 hero" style="margin-top: 100px!important">
    <div class="container">
        <div class="text-center my-5">
            <h1  class="fw-bolder">Lab Items</h1>
            <p class="lead mb-0">Rent For your Own Project</p>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-9">
                    
                    <?php include "includes/productcart.php" ?>
        </div>
                <?php include "includes/sidebar.php" ?>
    </div>
</div>

<?php include "../homepage/includes/footer.php" ?>


