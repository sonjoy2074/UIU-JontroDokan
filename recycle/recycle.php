<?php include "../homepage/includes/header_html.php" ?>
<?php include "../homepage/includes/header_body.php" ?>




<?php
    include "../database/db_connect.php";
    if(isset($_POST['submit-btn'])){
        include "./form.php";
    }
?>
<header class="py-5 border-bottom mb-4 hero" style="margin-top: 100px!important">
    <div class="container">
        <div class="text-center my-5">
            <h1  class="fw-bolder">Items For Recycle</h1>
            <p class="lead mb-0">♻️A Way to Save Environment♻️</p>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-9">
                    
                    <?php include "includes/productcard.php" ?>
        </div>
                <?php include "includes/sidebar.php" ?>
    </div>
</div>


<div class="button-container">
    <form action="form.php" method="post">
        <input type="submit" name="submit-btn"class="recycle-here" value="♻️Recycle Here">
    </form>
</div>



<?php include "../homepage/includes/footer.php" ?>