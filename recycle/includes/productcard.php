
        
<div class="row">
        <?php
        $query = "SELECT * FROM `recycling`";
        $result = mysqli_query($connect , $query);
        ?>
                <?php
                    while($row = mysqli_fetch_array($result)){ 
                        $product_id = $row['p_id'];
                        $product_name = $row['p_name'];
                        $product_user_id = $row['user_id'];
                        $product_image = $row['p_image'];
                        $product_type = $row['p_type'];
                        $product_details = $row['p_details'];
                        $status = $row['status'];
                        $available_units = $row['product_amount'];

                        $q_u_name = "SELECT * FROM user WHERE id = $product_user_id";
                        $q_res = mysqli_query($connect, $q_u_name);

                        while($row = mysqli_fetch_assoc($q_res)){
                            $user_name = $row['first_name']." ".$row['last_name'];
                        }



                        if($status != 1){
                            ?>
                            <div class="col-md-6 d-flex align-items-stretch">
                            <!-- Blog post-->
                                <div class="card mb-4">
                                    <a href="user_recycle_item_details.php?i_id=<?php echo $product_id; ?>"><img class="card-img-top" src="image/<?php echo $product_image; ?>" alt="no image"/></a>
                                    <div class="card-body">

                                        <h2 class="card-title h4"><a href="user_recycle_item_details.php?i_id=<?php echo $product_id; ?>"><?php echo mb_strimwidth($product_name, 0, 30, "..."); ?></a></h2>
                                        <div class="small text-muted">By: <?php echo $user_name; ?> </div>
                                        <div class="small text-muted">Type: <?php echo $product_type; ?> </div>
                                        <span class="small text-muted">Available Units: <?php echo $available_units ?></span>
                                        <p class="card-text"><?php echo mb_strimwidth($product_details, 0, 200, "..."); ?></p>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        <?php 

                        }
                        
                        
                    }
                    ?>
        </div>
