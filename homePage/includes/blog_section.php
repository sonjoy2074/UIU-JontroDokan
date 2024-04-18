<!-- Start Blog Section -->
<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Recent Blog</h2>
					</div>
					<div class="col-md-6 text-start text-md-end">
						<a href="blog/blog.php" class="more">View All Posts</a>
					</div>
				</div>

				<div class="row">
				<?php
            $find_f_q = "SELECT * FROM posts
            INNER JOIN user
            ON user.id = posts.post_author where post_status = 'publish' order by post_comment_count desc limit 4";
            $f_posts = mysqli_query($connect, $find_f_q);

            while ($row = mysqli_fetch_assoc($f_posts)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_date = $row['post_date'];
                $post_author = $row['first_name'] . " " . $row['last_name'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
				$post_comment_count = $row['post_comment_count'];

            ?>
					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="blog/post.php?p_id=<?php echo $post_id; ?>" class="post-thumbnail"><img src="blog/image/<?php echo $post_image; ?>" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="blog/post.php?p_id=<?php echo $post_id; ?>"><?php echo mb_strimwidth($post_title, 0, 30, "..."); ?></a></h3>
                                <span class="small text-muted">[<?php echo $post_comment_count; ?> comments]</span>
								<div class="meta">
									<span>by <a href="#"><?php echo $post_author; ?></a></span> <span>on <a href="#"><?php echo $post_date; ?></a></span>
								</div>
							</div>
						</div>
					</div>
					<?php

}

?>
				</div>
			</div>
		</div>
		<!-- End Blog Section -->	