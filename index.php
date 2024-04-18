<?php
    session_start();
    if(isset($_SESSION['uname'])){
        $uname = $_SESSION['uname'];
        // echo $_SESSION['uid'];
    }
    
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UIU JontroDokan</title>
    <link rel="icon" href="./assets/images/new_logo.png">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/fonts/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/sass/main.css">
    <link rel="stylesheet" href="./blog/css/style.css">
    <link rel="stylesheet" href="./recycle/css/style.css">
    <link rel="stylesheet" href=".././assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/anotherStyle.css">
</head>
<body>

<!--Header section-->
<?php
    $page = basename($_SERVER['PHP_SELF'],'.php');
    
?>
<header>
<?php include('database/db_connect.php'); ?>

    <?php
        if(!isset($_SESSION['uname'])){
            ?>
            <div class="page-header__topline container-fluid row fixed-top">
                <!-- <div class="text-light d-block">Welcome: Guest</div> -->
                <ul class="nav justify-content-end fixed-top">
                    <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="./customers/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="./customers/register.php">Register</a>
                    </li>
                </ul>
            </div>
    <?php
        }
    ?>
    
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="./assets/images/new_logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item <?= ($page == 'index')? 'active' : '' ?>">
                        <a class="nav-link" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./Shop/shop.php">Shop</a>
                    </li>
                    <li class="nav-item <?= ($page == 'blog')? 'active' : '' ?>">
                        <a class="nav-link " href="./blog/blog.php">Blog</a>
                    </li>
                    <li class="nav-item  <?= ($page == 'recycle')? 'active' : '' ?>">
                        <a class = "nav-link" href="./recycle/recycle.php">Recycle</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="./lab_support/lab_support.php">Laboratory support</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 action-menu">
                    <li class="nav-item dropdown">
                        <a class="btn btn-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                           <?php
                                if(isset($_SESSION['uname'])){      
                                    $ul = '<ul class="dropdown-menu border-0 shadow-lg" aria-labelledby="navbarDropdown">';
                                    $li1 = '<li><a class="dropdown-item" href="./lab_support/user_view_lab_item.php">My Lab Orders</a></li>'; 
                                    $li2 = '<li><a class="dropdown-item" href="./customers/editForm.php">Edit My Profile</a></li>'; 
                                    $li3 = '<li><a class="dropdown-item" href="./blog/userBlogs/myblogs.php">My Blog</a></li>';
                                    $li4 = '<li><a class="dropdown-item" href="./Seller_page/admin.php">Sell Products</a></li>';
                                    $li5 = '<li><a class="dropdown-item" href="./recycle/form.php">Add Items For Recycle</a></li>';
                                    $li6 = '<li><a class="dropdown-item" href="./log.php">Logout</a></li>';
                                    ?>
                                    
                                    <?php
                                    echo '<i class="bi bi-person">';
                                    echo " ".$uname;
                                    echo '</i>';
                                    echo '</a>';
                                    echo $ul;
                                    echo $li1;
                                    echo $li2;
                                    echo $li3;
                                    echo $li4;
                                    echo $li5;
                                    ?>
                                    <hr>
                                    <?php
                                    echo $li6;
                                }
                                else{
                                    ?>
                                    <?php
                                    $ul = '<ul class="dropdown-menu border-0 shadow-lg" aria-labelledby="navbarDropdown">';
                                    echo '<i class="bi bi-person"></i>';
                                    echo '</a>';
                                    echo $ul;
                                    echo '<li><a class="nav-link text-dark" aria-current="page" href="./customers/login.php">Login</a></li>';
                                    echo '<li><a class="nav-link text-dark" aria-current="page" href="./customers/register.php">Register</a></li>';
                                }
                                ?>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<?php include "./homepage/includes/herosection.php"; ?>
<?php include "./homepage/includes/laboratory_support_products.php"; ?>

<?php include "./homepage/includes/latest_products.php"; ?>
<?php include "./homepage/includes/blog_section.php"; ?>



<!--Footer section-->
<footer class = "container-fluid">
    <div class="row">
    <div class="container header__topline bg-dark py-5"><p class="m-0 text-center text-white">Copyright &copy; TeamMayhemMorph 2023</p></div>
    </div>
</footer>
<script src="./assets/js/bootstrap.bundle.js"></script>
</body>
</html>
