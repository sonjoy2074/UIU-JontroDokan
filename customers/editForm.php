<?php include ".././homepage/includes/header_html.php" ?>
<?php include ".././homepage/includes/header_body.php" ?>
<?php include('.././database/db_connect.php') ?>
<header class="py-5 border-bottom mb-4 hero " style="margin-top: 100px!important;">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Edit Profile</h1>
        </div>
    </div>
</header>

<?php 
$id = $_SESSION['uid'];

if(isset($_POST['f_name']) && isset($_POST['l_name']) && isset($_POST['email']) && isset($_POST['phone']))
{
    $res = mysqli_query($connect, "UPDATE `user` SET `first_name`='{$_POST['f_name']}',`last_name`='{$_POST['l_name']}',`email`='{$_POST['email']}',`phone`='{$_POST['phone']}' WHERE id = {$id}");
}
?>
<?php 
$showQuery = "select * from user where id = {$id}";
$showRes = mysqli_query($connect, $showQuery);

$userInfo = mysqli_fetch_assoc($showRes);

?>

<div class="container mb-5">
    <div class="card py-5">
        <div class="card-title ms-auto"> <button id="savebutton" class="btn btn-secondary">edit</button> </div>
        <div class="forms">
            <form action="#" method="post" id="update_profile">
                <div class="form-floating mb-3">
                    <input class="form-control" id="f_name" type="text" placeholder="First Name" name="f_name" readonly value="<?php echo $userInfo['first_name']?>" />
                    <label for="f_name">First Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="l_name" type="text" placeholder="Last Name" name="l_name" readonly value="<?php echo $userInfo['last_name']?>" />
                    <label for="l_name">Last Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="email" type="text" placeholder="Email" name="email" readonly value="<?php echo $userInfo['email']?>" />
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="phone" type="text" placeholder="Phone" name="phone" readonly value="<?php echo $userInfo['phone']?>" />
                    <label for="phone">Phone</label>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    var savebutton = document.getElementById('savebutton');
    var readonly = true;
    var inputs = document.querySelectorAll('input[type="text"]');
    savebutton.addEventListener('click', function() {

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].toggleAttribute('readonly');
        };

        if (savebutton.innerHTML == "edit") {
            savebutton.innerHTML = "save";
        } else {
            document.getElementById("update_profile").submit();
            savebutton.innerHTML = "edit";
        }
    });
</script>
<?php include ".././homepage/includes/footer.php" ?>