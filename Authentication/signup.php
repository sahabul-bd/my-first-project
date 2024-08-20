<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../Public/Backend/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../Public/Backend/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../Public/Backend/assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="../Public/Backend/assets/css/main.min.css" rel="stylesheet">
    <link href="../Public/Backend/assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../Public/Backend/assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../Public/Backend/assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <a href="signin.php">Sign In</a></p>
            
            <form action="manage.php" method="POST">

            <div class="auth-credentials m-b-xxl">

                <!-- name field start -->
                <label for="signUpUsername" class="form-label">Name</label>
                <input type="text" name="name" class="form-control m-b-md <?php if(isset($_SESSION["name_error"])) {
                    echo " is-invalid" ;} else {echo '';}?> " id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter your name" value="<?php if(isset($_SESSION["old_name"])) { echo $_SESSION["old_name"] ; } unset($_SESSION["old_name"]) ?>">
                 <!-- name field end -->

                <!-- php code start -->
                <?php if(isset($_SESSION["name_error"])){ ?>
                    <div  class="form-text m-b-md text-danger"> <?= $_SESSION["name_error"] ?> </div>
                <?php } unset($_SESSION["name_error"]) ?>
                <!-- php code end -->

                <!-- email field start -->
                <label for="signUpEmail" class="form-label">Email address</label>
                <input type="text" name="email" class="form-control m-b-md <?php if(isset($_SESSION["email_error"])) {
                    echo " is-invalid" ;} else {echo '';}?> " id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" value="<?= (isset($_SESSION["old_email"])) ? $_SESSION["old_email"]: ""; unset($_SESSION["old_email"])?>">
                <!-- email field end -->

                <!-- php code start -->
                <?php if(isset($_SESSION["email_error"])){ ?>
                    <div  class="form-text m-b-md text-danger"> <?= $_SESSION["email_error"] ?> </div>
                <?php } unset($_SESSION["email_error"])  ?>
                <!-- php code end -->

                <!-- password field start -->
                <label for="signUpPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control <?php if(isset($_SESSION["password_error"])) {
                    echo " is-invalid" ;} else {echo '';}?> " id="myInput" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" value="<?= (isset($_SESSION["old_password"])) ? $_SESSION["old_password"]: "" ; unset($_SESSION["old_password"]) ?>">
                <!-- password field end -->
                 <!-- show password code start -->
                 <div class="showpass">
                 <input type="checkbox" onclick="myFunction()">Show Password
                 </div>
                 <!-- show password code end -->

                <!-- php code start -->
                <?php if(isset($_SESSION["password_error"])){ ?>
                    <div  class="form-text m-b-md text-danger"> <?= $_SESSION["password_error"] ?> </div>
                <?php } unset($_SESSION["password_error"]) ?>
                <!-- php code end -->                

                <label for="signUpPassword" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control  <?php if(isset($_SESSION["cpassword_error"])) {
                    echo " is-invalid" ;} else {echo '';}?> " id="myInput2" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                    <!-- show password code start -->
                 <div class="showpass">
                 <input type="checkbox" onclick="myFunction2()">Show Password
                 </div>
                 <!-- show password code end -->
                    

                    <!-- php code start -->
                <?php if(isset($_SESSION["cpassword_error"])){ ?>
                    <div  class="form-text m-b-md text-danger"> <?= $_SESSION["cpassword_error"] ?> </div>
                <?php } unset($_SESSION["cpassword_error"]) ?>
                <!-- php code end -->

            </div>

            <div class="auth-submit">
                <button type="submit" name="signupbtn" class="btn btn-primary">Sign Up</button>
            </div>
            </form>
            <div class="divider"></div>            
        </div>
    </div>
    
    <!-- Javascripts -->
    <script src="../Public/Backend/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../Public/Backend/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Public/Backend/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="../Public/Backend/assets/plugins/pace/pace.min.js"></script>
    <script src="../Public/Backend/assets/js/main.min.js"></script>
    <script src="../Public/Backend/assets/js/custom.js"></script>

    <script>
        function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
        function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

    </script>
</body>

</html>