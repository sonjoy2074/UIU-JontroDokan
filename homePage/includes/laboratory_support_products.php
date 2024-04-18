<!-- Start Product Section -->
<div class="product-section" id="prod_sec">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Rent components from our laboratory support section</h2>
						<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
						<p><a href="lab_support/lab_support.php" class="btn btn-secondary">Explore</a></p>
					</div> 
					<!-- End Column 1 -->
					<?php
        $query = "SELECT * FROM `lab_items` order by item_id limit 3";
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
                        <!-- Start Column 2 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="lab_support/lab_post.php?i_id=<?php echo $item_id; ?>">
							<img src="lab_support/image/<?php echo $item_image; ?>" class="img-fluid product-thumbnail">
							<h3 class="product-title"><?php echo $item_name; ?></h3>
							<strong class="product-price">Available Units: <?php echo $available_units; ?></strong>
							<span class="icon-cross">
								<img src="assets/images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 
					<!-- End Column 2 -->
                    <?php 
                    }
                    ?>

				</div>
			</div>
		</div>
		<!-- End Product Section -->