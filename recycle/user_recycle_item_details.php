<?php include "../homepage/includes/header_html.php";?>
<?php include "../homepage/includes/header_body.php";?>



<style>
    icon-shape {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  vertical-align: middle;
}

.icon-sm {
  width: 2rem;
  height: 2rem;
  
}
</style>
<?php include('../database/db_connect.php')?>
<header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Recycle</h1>
            <p class="lead mb-0">Item Details</p>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-lg">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="card mb-3">
                                            <div class="card-body container">

                    <?php
                    

                    if(isset($_GET["i_id"])){
                        $i_id= $_GET["i_id"];
                        $query = "SELECT * FROM `recycling` WHERE p_id = {$i_id}"; 
                        $response = mysqli_query($connect, $query);
                        
                    
                    if(isset($_POST["quantity_submit"])){
                        
                        $item_quantity = $_POST['quantity'];
                        $uid = $_SESSION['uid'];
                        if($item_quantity)
                        {

                            $query = "INSERT INTO `lab_item_order`(`order_id`, `user_id`, `lab_item_id`, `item_amount` ,  `status`) VALUES('',{$uid},{$i_id},{$item_quantity} , 0)"; 
                            $res = mysqli_query($connect, $query);

                        
                            echo "<div class=\"alert alert-success\" role=\"alert\">
                                Order Placed
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                </div>";
                        }
                        else
                        {
                            die("query failed!" . mysqli_error($connect));
                        }
                        ?>
                        <meta http-equiv="refresh" content="2; url='lab_support.php'" />
                        <?php

                        
                    }

                    $count_row = mysqli_num_rows($response);

                    if ($count_row != 0) {
                        while ($row = mysqli_fetch_assoc($response)) {
                            $product_id = $row['p_id'];
                            $product_name = $row['p_name'];
                            $product_user_id = $row['user_id'];
                            $product_image = $row['p_image'];
                            $product_type = $row['p_type'];
                            $product_details = $row['p_details'];
                            $product_amount = $row['product_amount'];
                            date_default_timezone_set('Asia/Dhaka');
                            $post_date = date('d-m-y');
                            ?>
                            <article>
                        <!-- Post header-->
                                <header class="mb-4" >
                                    <!-- Post title-->
                                    <h2 class="text-dark fw-bolder mb-1"><?php echo $product_name; ?></h2>
                                    <!-- Post meta content-->
                                    <!-- Post categories-->
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">#<?php echo $product_type; ?></a>
                                </header>
                                <!-- Preview image figure-->
                                <figure class="mb-4"><img class="img-fluid rounded" src="image/<?php echo $product_image; ?>"  width="500" alt="..." /></figure>
                                <!-- Post content-->
                                <section class="mb-5">
                                    <h3 class="text-dark fw-bolder mb-1">Details</h3>
                                    <p class="fs-5 mb-4"><?php echo $product_details; ?></p>


                                    <form action="#" method="post"  enctype="multipart/form-data">
                                        <div class="col-md-6 col-12">
                                            <div class="row">
                                                        <div class="col-12">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <p class="text-dark fw-bolder">Item Amount :<p>
                                                </div>
                                                            <div class="input-group w-auto justify-content-end align-items-center">
                                                                
                                                                <input type="number" value="<?php echo $product_amount;?>" name="quantity" class="border-1 text-center fw-bolder" disabled>
                                                                
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </article>

                            <?php
                        }
                    }
                }
                    ?>
                                    </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script> 
document.getElementById("incr").addEventListener("click",function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal)) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }
)
document.getElementById("decr").addEventListener("click",function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }
);
    $('.input-group').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.input-group').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });
</script>
<?php include "../homepage/includes/footer.php";?>
