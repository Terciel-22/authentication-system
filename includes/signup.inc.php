<?php 

if($_SERVER["REQUEST_METHOD"] === "POST") { 
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["confirm_password"];

    try {
        require_once('dbh.inc.php');
        require_once('signup_model.inc.php');
        //require_once('signup_view.inc.php');
        require_once('signup_contr.inc.php');

        // ERROR HANDLERS
        $errors = [];

        if(is_input_empty($name, $email, $password)){
            $errors["empty_inputs"] = "Fill in all inputs!"; 
        }
        if(is_email_invalid($email)){
            $errors["invalid_email"] = "Email is invalid!"; 
        }
        if(is_email_taken($db, $email)){
            $errors["email_used"] = "Email is already registered!"; 
        }
        if(are_passwords_not_matched($password, $cpassword)){
            $errors["password_not_confirmed"] = "Password confirmation does not matched!"; 
        }

        require_once('./config_session.inc.php');
        if($errors)
        {
            $_SESSION["errors_signup"] = $errors;

            $signUpData = [
                "name" => $name,
                "email"=>  $email,
            ];
            $_SESSION["signup_data"] = $signUpData;

            header("Location: ../index.php");
            exit();
        }

        create_user($db, $name, $email, $password);
        header("Location: ../index.php?signup=success");

        $db = null;
        $stmt = null;

        exit();
    } catch(PDOException $e) {
        die('Query failed: ' .$e->getMessage());
    }
} else {
    header('Location: ../index.php');
    die();
}