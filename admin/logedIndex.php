<?php include "includes/header_html.php"; ?>

<?php include "includes/topbar.php" ?>

        <div id="layoutSidenav">

<?php include "includes/sidebar.php" ?>
<?php include "../database/db_connect.php"; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>

<?php
$query = "SELECT * FROM posts
INNER JOIN user
ON user.id = posts.post_author where post_status='draft'";

$pending_posts = mysqli_query($connect, $query);
$count_row_posts = mysqli_num_rows($pending_posts);


?>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body text-center">
                                        <h1><?php echo $count_row_posts . "</br>"; ?></h1> Pending Posts To Publish
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="my_posts.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

<?php
$query2 = "SELECT * FROM `lab_item_order` where status=0";

$pending_order_lab = mysqli_query($connect, $query2);
$count_row_labs = mysqli_num_rows($pending_order_lab);


?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                <div class="card-body text-center">
                                        <h1><?php echo $count_row_labs . "</br>"; ?></h1> Pending Lab Orders
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="lab_item_order.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

<?php
$query3 = "SELECT SUM(product_amount) as amount FROM `recycling`";

$recycle = mysqli_query($connect, $query3);
$count_row_recycle = mysqli_fetch_assoc($recycle)['amount'];


?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                <div class="card-body text-center">
                                        <h1><?php echo $count_row_recycle . "</br>"; ?></h1> Total Recycle Items
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <!-- <a class="small text-white stretched-link" href="#">View Details</a> -->
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
<?php
$query4 = "SELECT SUM(item_amount) as sums FROM `lab_item_order` WHERE `status` = 1";

$to_recieve = mysqli_query($connect, $query4);
$count_row_waiting = mysqli_fetch_assoc($to_recieve)['sums'];


?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                <div class="card-body text-center">
                                        <h1><?php echo $count_row_waiting . "</br>"; ?></h1> Lab Items to Recieve
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="lab_item_order.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>


<?php 
$user_q = "select * from user where id != 0";
$res = mysqli_query($connect, $user_q);


?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Registered Users
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php 

while($rows = mysqli_fetch_assoc($res))
{
    $name = $rows['first_name'] . " " . $rows['last_name'];
    $phone = $rows['phone'];
    $email = $rows['email'];
?>
                                        <tr>
                                            <td><?php echo $name; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone; ?></td>
                                        </tr>
                         <?php
                                    }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
<?php include "includes/footer.php" ?>
