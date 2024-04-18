<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UIU JontroDokan</title>
    <link rel="icon" href=".././assets/images/new_logo.png">
    <link rel="stylesheet" href=".././assets/css/bootstrap.min.css">
    <link rel="stylesheet" href=".././assets/fonts/bootstrap-icons.css">
    <link rel="stylesheet" href=".././assets/sass/main.css">
    <link rel="stylesheet" href=".././assets/css/style.css">
    <link rel="stylesheet" href=".././assets/css/anotherStyle.css">
    <link rel="stylesheet" href=".././blog/css/style.css">
    <link rel="stylesheet" href=".././recycle/css/style.css">
</head>
<body>
<?php include "../homepage/includes/header_body.php"?>

<?php
include '../database/db_connect.php';

$showAlart = false;
$showError = false;


if(isset($_POST['reg_submit'])){
  $gender = null;
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  if(!empty($_POST["gender"])){
    foreach($_POST["gender"] as $value){
      
      if($value == "option1"){
        $gender = "female";
      }else if($value == "option2"){
        $gender = "male";
      }else{
        $gender = "other";
      }
      
    }
  }
  
  $phone = $_POST["phone"];
  $emailid = $_POST["emailid"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $exists = false;

  $email_exists = "SELECT * FROM `user` WHERE email = '$emailid'";
  $res = mysqli_query($connect, $email_exists);
  $num = mysqli_num_rows($res);
  if($num == 1){
    $showError = 'Email already exist';
  }else if( $email_exists == $emailid){
    $showError = 'Email already exist';
  }else if(($password == $cpassword) && $exists == false && $emailid != null && $firstname != null && $password != null && $gender != null && $phone != null){
    $hash = "$2y$10$";
    $salt = "youknowinknowblahblaHHjkI810";
    $combine = $hash.$salt;
    $encrypted_pass = crypt($password, $combine);
    $sql = "INSERT INTO `user`(`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `gender`) VALUES (NULL,'$firstname','$lastname','$emailid','$encrypted_pass','$phone','$gender')";

    $result = mysqli_query($connect, $sql);
    if($result){
      $showAlart = true;
    }
  }else{
    $showError = "Could not create account. ";
  }
}

?>



  

    <div class="container" style="margin-top:110px!important">
    <?php 

if($showAlart){
  echo "<div class=\"alert alert-success\" role=\"alert\">
      Registration successful! Please Login
      </div>";
      ?>
      <meta http-equiv="refresh" content="0.7; url='./login.php'" />
      <?php
}if($showError){
  echo "<div class=\"alert alert-danger\" role=\"alert\">
      $showError
      </div>";
}
?>
        <div class="row">
            <div class="reg-form">
                <section class="h-100 bg-light m-4">
                    <div class="container py-5 h-100">
                      <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                          <div class="card card-registration my-4">
                            <div class="row g-0">
                              <div class="col-xl-6 d-none d-xl-block">
                                <img src="./images/other/img4.jpg"
                                  alt="Sample photo" class="img-fluid"
                                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                              </div>
                              <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                  <h3 class="mb-5 text-uppercase">Student registration form</h3>

                                  <form action="#" method="post">

                                    <div class="row">
                                      <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                        <label class="form-label" for="form3Example1m">First name</label>
                                          <input type="text" id="form3Example1m" name="firstname" class="form-control form-control-lg border" required/>
                                        </div>
                                      </div>
                                      <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                          <label class="form-label" for="form3Example1n">Last name</label>
                                          <input type="text" id="form3Example1n" name="lastname" class="form-control form-control-lg border" required/>
                                        </div>
                                      </div>
                                    </div>
              
                    
                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                    
                                      <h6 class="mb-0 me-4">Gender: </h6>
                    
                                      <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="gender[]" id="femaleGender"
                                          value="option1" />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                      </div>
                    
                                      <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input" type="radio" name="gender[]" id="maleGender"
                                          value="option2" />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                      </div>
                    
                                      <div class="form-check form-check-inline mb-0">
                                        <input class="form-check-input" type="radio" name="gender[]" id="otherGender"
                                          value="option3" />
                                        <label class="form-check-label" for="otherGender">Other</label>
                                      </div>
                    
                                    </div>
                    
                                    <div class="form-outline mb-4">
                                      <label class="form-label" for="form3Example97">Phone Number</label>
                                      <input type="number" id="form3Example97" name="phone" class="form-control form-control-lg" required/>
                                    </div>
                          
                                    <div class="form-outline mb-4">
                                      <label class="form-label" for="form3Example97">Email ID</label>
                                      <input type="email" name="emailid" class="form-control form-control-lg" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                      <label class="form-label" for="form3Example90">Password</label>
                                      <input type="password" id="form3Example90" name="password" class="form-control form-control-lg" required/>
                                    </div>
                    
                                    <div class="form-outline mb-4">
                                      <label class="form-label" for="form3Example99">Confirm Password</label>
                                      <input type="password" id="form3Example99" name="cpassword" class="form-control form-control-lg" required/>
                                    </div>
                    
                                    
                    
                                    <div class="d-flex justify-content-end pt-3">
                                      <button type="button" class="btn btn-light btn-lg">Reset all</button>
                                      <button type="submit" name="reg_submit" class="btn btn-warning btn-lg ms-2">Submit form</button>
                                    </div>

                                  </form>
                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>
<?php include "../homepage/includes/footer.php"?>
