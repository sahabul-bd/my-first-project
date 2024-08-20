<?php  

session_start();
include '../../config/database_connection.php';

    if(isset($_POST['update_btn'])){
            $new_name = $_POST['new_name'] ;
            $name_regex = "/^(?! $)[a-zA-Z ]*$/";

                if(!$new_name){
                    $_SESSION['nameError'] = "Input field is requred*";
                    header('location: name_update.php');
                } else if(! preg_match($name_regex , $new_name)){
                    $_SESSION['nameError'] = "Input a valid name*";
                    header('location: name_update.php');
                } else {
                    $id= $_SESSION["author_id"];
                    $update_query = "UPDATE users SET Name = '$new_name' WHERE ID = '$id'" ;
                    mysqli_query($db , $update_query);
                    $_SESSION["author_name"] = $new_name;
                    $_SESSION['msg_update']="Name update successfully";
                    header('location: name_update.php');
                }
            } 


            if( isset($_POST['update_btn_email']) ){
                $new_email = $_POST['new_email'];
                $email_regex = ('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/');
                    if(! $new_email){
                    $_SESSION['emailError'] = "Input field is requred*";
                    header('location: email_update.php');
                    } else if( ! preg_match($email_regex , $new_email)){
                    $_SESSION['emailError'] = "Input a valid email*";
                    header('location: email_update.php');
                    } else {
                    $id= $_SESSION["author_id"];
                    $update_query = "UPDATE users SET Email = '$new_email' WHERE ID = '$id'" ;
                    mysqli_query($db , $update_query);
                    $_SESSION["author_email"] = $new_email;
                    $_SESSION['msg_update']="Email update successfully";
                    header('location: email_update.php');

                    }


            }



            // password update

            if( isset($_POST['update_btn_pass']) ){
                $old_pass = $_POST['old_password'];
                $new_pass = $_POST['new_password'];
                $con_pass = $_POST['con_password'];
                $pass_regex = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";
                $flag = false;

                if ( ! $old_pass ) {
                    $flag = true;
                    $_SESSION["old_error"] = "Input field is required*";
                    header('location: password_update.php') ; 

                } else if ( ! preg_match($pass_regex , $old_pass) ) {
                    $flag = true;
                     $_SESSION["old_error"] = "Please input a valid password*";
                    header('location: password_update.php') ; 
                }
                if ( ! $new_pass ) {
                    $flag = true;
                    $_SESSION["new_error"] = "Input field is required*";
                    header('location: password_update.php') ; 

                } else if ( ! preg_match($pass_regex , $new_pass) ) {
                    $flag = true;
                     $_SESSION["new_error"] = "Please input a valid password*";
                    header('location: password_update.php') ; 
                }
                if ( ! $con_pass ) {
                    $flag = true;
                    $_SESSION["con_error"] = "Input field is required*";
                    header('location: password_update.php') ; 

                } else if ( ! preg_match($pass_regex , $con_pass) ) {
                    $flag = true;
                     $_SESSION["con_error"] = "Please input a valid password*";
                    header('location: password_update.php') ; 
                }


 

                if (! $flag){
                    $id= $_SESSION["author_id"];  
                    $cncrypt_pass = sha1($old_pass);
                    $count_query = "SELECT COUNT(*) AS 'valid' FROM users WHERE ID='$id' AND Password = '$cncrypt_pass'";
                    $connect=mysqli_query($db,$count_query);
                    $result = mysqli_fetch_assoc($connect)['valid'];


                    if($result == 1){
                    $id= $_SESSION["author_id"];
                    $new_pass_encrypt = sha1($new_pass);


                    $update_query = "UPDATE users SET Password = '$new_pass_encrypt' WHERE ID = '$id'" ;
                    mysqli_query($db , $update_query);
                    $_SESSION['error']="Password update successfully";
                    header('location: password_update.php');



                    }
                } else {
                    $_SESSION['error'] = "input field is requeired";
                    header('location: password_update.php');
                }

            }



            if(isset($_POST['update_image_btn'])){

                $image = $_FILES['image']['name'];
                if($image){
                    $tmp=$_FILES['image']['tmp_name'];
                    $id= $_SESSION["author_id"];
                    $author_name= $_SESSION["author_name"];
                    $explode = explode( '.',$image);
                    $exe = end($explode);
                    $img_name = $id . '-' . $author_name . '-' . date("d-m-Y") . '-' . rand(0,9999) . '.' . $exe;
                    $localpath = "../../Public/upload/profile" . $img_name;
                    
                    if( move_uploaded_file($tmp ,$localpath) ){  

                    $update_query = "UPDATE users SET image = '$img_name' WHERE ID = '$id'" ;
                    mysqli_query($db , $update_query);
                    $_SESSION['msg_update']="Profile picture update successfully";
                    header('location: profile_update.php');

                } 
                    
                

            } else {
                $_SESSION["msg_update"] = 'Please choose a file*';
                header('location: profile_update.php');
            } 


            
            } 

?>