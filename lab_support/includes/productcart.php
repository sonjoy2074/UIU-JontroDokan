
        
        <div class="row">
        <?php
        $query = "SELECT * FROM `lab_items`";
        $result = mysqli_query($connect , $query);
        ?>
                <?php
                    while($row = mysqli_fetch_array($result)){ 
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
                    <?php 
                    }
                    ?>


        </div>


