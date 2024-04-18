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
            <h1 class="fw-bolder">Add to Your Lab Items</h1>
        </div>
    </div>
</header>
<div class="container">
        <div class="col-lg">
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
                    if(isset($_POST["quantity_submit"])){
                        
                        $item_quantity = $_POST['quantity'];
                        $uid = $_SESSION['uid'];
                        $q = "SELECT available_units FROM `lab_items` WHERE item_id = $i_id";
                        $r = mysqli_fetch_assoc(mysqli_query($connect ,$q));
                        $rr = $r['available_units'];
                        date_default_timezone_set('Asia/Dhaka');
                        $post_date = date('d-m-y');
                        if($item_quantity > $rr){
                            echo "<div class=\"alert alert-danger\" role=\"alert\">
                                Sorry! Insufficient Quantity Order can not be Placed.
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                                </div>";
                        }else if($item_quantity <= $r)
                        {

                            $query = "INSERT INTO `lab_item_order`(`order_id`, `user_id`, `lab_item_id`, `item_amount` , `status`, `issue_date`) VALUES('',{$uid},{$i_id},{$item_quantity} , 0,'{$post_date}')"; 
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
                                    <h2 class="fw-bolder mb-1 "><?php echo $item_name; ?></h2>
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
                                    <p class="fs-5 mb-4">Available Units :<?php echo $available_units; ?></p>


                                    <form action="#" method="post"  enctype="multipart/form-data">
                                        <div class="col-md-6 col-12">
                                            <div class="row">
                                                        <div class="col-12">
                                                        <div class="d-flex justify-content-between">
                                                            <div>
                                                                <p class="text-dark">Item Amount<p>
                                                </div>
                                                            <div class="input-group w-auto justify-content-end align-items-center">
                                                                <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 lh-0" data-field="quantity" id="decr">
                                                                <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                                                <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm lh-0" data-field="quantity" id="incr">
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        
                                        <?php 
                                            if($uname){
                                                ?>
                                                <button class="btn btn-primary" name="quantity_submit" href="" class="add-to-cart-btn">
                                                    <i class=""></i> Add
                                                </button>
                                                <?php
                                            }else{
                                                ?>
                                                <button class="btn btn-primary" type="submit" name="quantity_submit" href="" class="add-to-cart-btn">
                                                    <i class=""></i> Add
                                                </button>
                                                <?php
                                            }
                                            ?>
                                    </form>
                                </section>
                            </article>

                            <?php
                        }
                    }
                        
                    ?>
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
