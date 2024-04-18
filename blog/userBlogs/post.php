<?php include('../includes/header_html.php') ?>
<?php include('../includes/header_body.php') ?>
<?php include('../../database/db_connect.php') ?>




<!-- Page content-->
<div class="container mt-5" style="margin-top: 150px!important;">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">

            <?php include "post_content.php" ?>

            <?php

            if (isset($_POST['add_comment'])) {
                $content = $_POST['content'];
                // echo "here";
                $post_id = $_GET['p_id'];
                // echo $post_id;
                // $usr_id = -1;
                $usr_id =$_SESSION['uid'];
                

                $query = "INSERT INTO `post_comments`(`post_id`, `user_id`, `content`) VALUES ({$post_id},{$usr_id},'{$content}')";
                $add_comm_res = mysqli_query($connect, $query);

                if (!$add_comm_res) {
                    die("error" . mysqli_error($connect));
                }
            }
            ?>


            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4" action="#" method="post" enctype="multipart/form-data">
                            <textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!" name="content"></textarea>
                            <button class="btn btn-primary mt-2" type="submit" name="add_comment">Comment</button>
                        </form>


                        <?php
                        if (isset($_GET['p_id'])) {
                            $p_id = $_GET['p_id'];

                            $query = "select * from post_comments inner join user on user.id = user_id where post_id = {$p_id}";
                            $res = mysqli_query($connect, $query);

                            while ($rows = mysqli_fetch_assoc($res)) {

                                $commenter_name = $rows['first_name'] . " " . $rows['last_name'];
                                $content = $rows['content'];

                        ?>

                                <!-- Single comment-->
                                <div class="d-flex mt-3">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold"><?php echo $commenter_name; ?></div>
                                        <?php echo $content; ?>
                                    </div>
                                </div>

                        <?php
                            }
                            }
                        ?>

                    </div>
                </div>
            </section>

        </div>
        <!-- Side widgets-->

        <?php include "../includes/userSidebar.php" ?>

    </div>
</div>
<!-- Footer-->
<?php include('../includes/userfooter.php') ?>




<!-- Comment with nested comments-->
<!-- <div class="d-flex mb-4"> -->
<!-- Parent comment-->
<!-- <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div> -->
<!-- <div class="ms-3"> -->
<!-- <div class="fw-bold">Commenter Name</div> -->
<!-- If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks. -->
<!-- Child comment 1-->
<!-- <div class="d-flex mt-4"> -->
<!-- <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div> -->
<!-- <div class="ms-3"> -->
<!-- <div class="fw-bold">Commenter Name</div> -->
<!-- And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors. -->
<!-- </div> -->
<!-- </div> -->
<!-- Child comment 2-->
<!-- <div class="d-flex mt-4"> -->
<!-- <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div> -->
<!-- <div class="ms-3"> -->
<!-- <div class="fw-bold">Commenter Name</div> -->
<!-- When you put money directly to a problem, it makes a good headline. -->
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->
<!-- </div> -->