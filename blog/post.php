<?php include('includes/header.php') ?>
<?php include('../homepage/includes/header_body.php') ?>
<?php include('../database/db_connect.php') ?>


<!-- Page content-->
<div class="container" style="margin-top: 150px!important;">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">

<?php include "includes/post_content.php" ?>

<?php
if(isset($_SESSION['uid']))
{
if (isset($_POST['add_comment'])) {
    $content = $_POST['content'];
    // echo "here";
    $post_id = $_GET['p_id'];
    // echo $post_id;
    $usr_id = $_SESSION['uid'];

    $query = "INSERT INTO `post_comments`(`post_id`, `user_id`, `content`) VALUES ({$post_id},{$usr_id},'{$content}')";

    $find_comm_count = "select post_comment_count from posts where post_id = {$post_id}";
    $comm_count_res = mysqli_query($connect, $find_comm_count);

    $find_comm_count = mysqli_fetch_assoc($comm_count_res)['post_comment_count'];
    $find_comm_count += 1;

    $post_update_q = "update posts set ";
    $post_update_q .= "post_comment_count = '{$find_comm_count}' ";
    $post_update_q .= "where post_id = {$post_id}";

    $post_u_q = mysqli_query($connect, $post_update_q);
    $add_comm_res = mysqli_query($connect, $query);

    if (!$add_comm_res) {
        die("error" . mysqli_error($connect));
    }
}
}
else
{
    echo "<div class=\"alert alert-warning\" role=\"alert\">
               login/register to join the discussion
              </div>";
}
?>


<!-- Comments section-->
<section class="mb-5">
    <div class="card bg-light">
        <div class="card-body">
            <!-- Comment form-->
            <form class="mb-4" action="#" method="post">
             <?php if(isset($_SESSION['uid']))
                {  
                echo '<textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!" name="content"></textarea>';
                echo "<button class=\"btn btn-primary mt-2\" type=\"submit\" name=\"add_comment\">Comment</button>";
            } else
            {
                echo '<textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!" name="content" disabled></textarea>';
                echo "<button class=\"btn btn-primary mt-2\" type=\"submit\" name=\"add_comment\" disabled>Comment</button>";

            } 
            ?>
            </form>


            <?php

            if (isset($_GET['p_id'])) {
                $p_id = $_GET['p_id'];

                $query = "select * from post_comments inner join user on user.id = user_id where post_id = {$p_id}";
                $res = mysqli_query($connect, $query);

                while($rows = mysqli_fetch_assoc($res))
                {

                    $commenter_name = $rows['first_name'] ." ". $rows['last_name'];
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

        <?php include "includes/sidebar.php" ?>

    </div>
</div>
<!-- Footer-->
<?php include('includes/footer.php') ?>