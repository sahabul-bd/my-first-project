<?php 
session_start();
if(isset($_SESSION["author_id"])){
    header("location: ../backend/home/home.php");
}

?>

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
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="signup.php">Sign Up</a></p>
            <!-- alert message is start-->
             <?php if( isset($_SESSION["success_alart"]) && isset($_SESSION["success_name"])){ ?>
            <div class="alert alert-custom" role="alert">
                                                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                                                    <div class="alert-content">
                                                        <span class="alert-title"> <?=$_SESSION["success_alart"] ?> </span>
                                                        <span class="alert-text"> <?= $_SESSION["success_name"]?>  </span>
                                                    </div>
                                                </div>
            <?php } unset($_SESSION["success_alart"] ,$_SESSION["success_name"])?>
            <!-- alert message end -->

            <!-- loginmessage is start-->
             <?php if( isset($_SESSION["login_faild"])){ ?>
            <div class="alert alert-custom" role="alert">
                                                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">error</i></div>
                                                    <div class="alert-content">
                                                    
                                                    <span class="alert-text"> <?= $_SESSION["login_faild"]?>  </span>
                                                    </div>
                                                </div>
            <?php } unset($_SESSION["login_faild"])?>
            <!-- login message end -->

            <div class="auth-credentials m-b-xxl">
                <!-- email input start -->
                 <form action="manage.php" method="POST">

                <label for="signInEmail" class="form-label">Email address</label>
                <input type="text" name="email" class="form-control m-b-md <?php if(isset($_SESSION["name_error"])) {
                    echo " is-invalid" ;} else {echo '';}?>" id="signInEmail" aria-describedby="signInEmail" placeholder="example@neptune.com" value="<?=(isset($_SESSION["register_email"]))? $_SESSION["register_email"]:""; unset($_SESSION["register_email"])?>">
                <!-- php code start -->
                <?php if(isset($_SESSION["email_error"])){ ?>
                    <div  class="form-text m-b-md text-danger"> <?= $_SESSION["email_error"] ?> </div>
                <?php } unset($_SESSION["email_error"])  ?>
                <!-- php code end --> 
                <!-- email input end -->

                 <!-- password input end -->
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control <?php if(isset($_SESSION["name_error"])) {
                    echo " is-invalid" ;} else {echo '';}?>" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                <!-- php code start -->
                <?php if(isset($_SESSION["password_error"])){ ?>
                    <div  class="form-text m-b-md text-danger"> <?= $_SESSION["password_error"] ?> </div>
                <?php } unset($_SESSION["password_error"])  ?>
                <!-- php code end -->
                <!-- password input end -->
            </div>

            <div class="auth-submit">
                <button type="submit" name="signinbtn" class="btn btn-primary">Sign In</button>
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
</body>
</html>