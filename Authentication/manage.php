<?php
session_start();
include '../config/database_connection.php';
    
    if(isset($_POST["signupbtn"])){
    
    // variable
        $name = $_POST["name"];
        $name_regex = "/^(?! $)[a-zA-Z ]*$/";
        $email = $_POST["email"];
        $email_regex = ('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/');
        $password = $_POST["password"];
        $password_regex_upper = ("/^(?=\S*[A-Z])/");
        $password_regex_lower = ("/^(?=\S*[a-z])/");
        $password_regex_number = ("/^(?=\S*[\d])/");
        $password_regex_length = ("/^(?=\S{8,})/");
        $cpassword=$_POST["cpassword"];
        $flag = false;


    // name error start
        if(!$name){
            $flag = true;
            $_SESSION["name_error"] = "You must need required input field*";
            header("location:signup.php");
        }  else if (!preg_match($name_regex , $name)){
            $flag = true;
            $_SESSION["name_error"] = "Please enter a valid name*";
            header("location:signup.php");
        } else {
            $_SESSION["old_name"]="$name";
        }
        
        // name error end  

        //email error start
        if(!$email){
            $flag = true;
            $_SESSION["email_error"] = "You must need required input field*";
            header("location:signup.php");
        } else if( ! preg_match($email_regex , $email)){
            $flag = true;
            $_SESSION["email_error"] = "Please input a valid email*";
            header("location:signup.php");
        }  else {
            $_SESSION["old_email"]="$email";
        } 
        // email error end 

        //Password error start
        if(!$password){
            $flag = true;
            $_SESSION["password_error"] = "You must need required input field*";
            header("location:signup.php");
        } else if( ! preg_match($password_regex_upper , $password)){
            $flag = true;
            $_SESSION["password_error"] = "at least one uppercase letter*";
            header("location:signup.php");
        } else if(! preg_match($password_regex_lower , $password)){
            $flag = true;
            $_SESSION["password_error"] = "at least one lowercase letter*";
            header("location:signup.php");
        } else if(! preg_match($password_regex_number , $password)){
            $flag = true;
            $_SESSION["password_error"] = "at least one number*";
            header("location:signup.php");
        } else if(! preg_match($password_regex_length , $password)){
            $flag = true;
            $_SESSION["password_error"] = "at least length 8*";
            header("location:signup.php");
        } else {
            $_SESSION["old_password"]="$password";
        }
        // Password error end 

        // confirm password start 
        if(!$cpassword){
            $flag = true;
            $_SESSION["cpassword_error"] = "You must need required input field*";
            header("location:signup.php");
        } else if ($cpassword != $password){
            $flag = true;
            $_SESSION["cpassword_error"] = "Password doesnot match*";
            header("location:signup.php");
        }
        //confirm password end

        if ($flag){
            header("location:signup.php");
        } else {
            $encrypt_password = sha1($password);
            $query =" INSERT INTO users (Name, Email, Password) VALUES ('$name' , '$email' , '$encrypt_password') ";
            mysqli_query($db,$query);
            $_SESSION["success_alart"]="Congratulations register is successfull";
            $_SESSION["success_name"]=$name;
            $_SESSION["register_email"]=$email;
            header("location: signin.php");
        }

    } 
    // email error code end

    // signin page code start
    if(isset($_POST["signinbtn"])){
        $email = $_POST["email"];
        $email_regex = ('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/');
        $password = $_POST["password"];
        $password_regex_upper = ("/^(?=\S*[A-Z])/");
        $password_regex_lower = ("/^(?=\S*[a-z])/");
        $password_regex_number = ("/^(?=\S*[\d])/");
        $password_regex_length = ("/^(?=\S{8,})/");
        $flag=false;
        


        // email error code start
        if(!$email){
            $flag = true;
            $_SESSION["email_error"] = "You must need required input field*";
            header("location:signin.php");
        } else if( ! preg_match($email_regex , $email)){
            $flag = true;
            $_SESSION["email_error"] = "Please input a valid email*";
            header("location:signin.php");
        }  else {
            $_SESSION["old_email"]="$email";
        }
        // password error start
        if(!$password){
            $flag = true;
            $_SESSION["password_error"] = "You must need required input field*";
            header("location:signin.php");
        // } else if( ! preg_match($password_regex_upper , $password)){
        //     $flag = true;
        //     $_SESSION["password_error"] = "at least one uppercase letter*";
        //     header("location:signin.php");
        // } else if(! preg_match($password_regex_lower , $password)){
        //     $flag = true;
        //     $_SESSION["password_error"] = "at least one lowercase letter*";
        //     header("location:signin.php");
        // } else if(! preg_match($password_regex_number , $password)){
        //     $flag = true;
        //     $_SESSION["password_error"] = "at least one number*";
        //     header("location:signin.php");
        // } else if(! preg_match($password_regex_length , $password)){
        //     $flag = true;
        //     $_SESSION["password_error"] = "at least length 8*";
        //     header("location:signin.php");
        } else {
            $_SESSION["old_password"]="$password";
        }
                // password error end

         

        //login processed start
    if(!$flag){
        $encrypt=sha1($password);
        $query="SELECT COUNT(*) AS 'valid' FROM users WHERE email='$email' AND password='$encrypt'";
        $connect=mysqli_query($db,$query);
        $result=mysqli_fetch_assoc($connect);


        // print_r($result["valid"]);


        if($result["valid"] == 1){

            $query="SELECT * FROM users WHERE email='$email' AND password='$encrypt'";
            $connect=mysqli_query($db,$query);
            $author=mysqli_fetch_assoc($connect);
            $_SESSION["author_name"]=$author["Name"];
            $_SESSION["msg_login"]='Your account login successfully';
            $_SESSION["author_email"]=$author["Email"];
            $_SESSION["author_id"]=$author["ID"];
            $_SESSION["author_image"]=$author["image"];
            
            header('location:../backend/home/home.php');
        } else {
            $_SESSION["login_faild"] = "You dont have any account*";
            header("location:signin.php");
        }
}


        //login processed end
    }

    // signin page code end
    

?>