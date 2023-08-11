<?php 

    declare(strict_types=1);

    function signup_inputs() {
        if(isset($_SESSION["signup_data"]["name"])){
            echo '<input type="text" placeholder="Name" name="name" value="'.$_SESSION["signup_data"]["name"].'"/>';
        } else 
        {
            echo '<input type="text" placeholder="Name" name="name"/>';
        }

        if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["invalid_email"]) && !isset($_SESSION["errors_signup"]["email_used"])){
            echo '<input type="email" placeholder="Email" name="email" value="'.$_SESSION["signup_data"]["email"].'"/>';
        } else 
        {
            echo '<input type="email" placeholder="Email" name="email"/>';
        }
        echo '<input type="password" placeholder="Password" name="password"/>';
        echo '<input type="password" placeholder="Confirm Password" name="confirm_password"/>';
    }

    function check_sign_up_errors()
    {
        if(isset($_SESSION["errors_signup"])) {
            $errors = $_SESSION["errors_signup"];
            foreach($errors as $error) {
                echo "<div class='form-error'>".$error."</div>";
            }
            unset($_SESSION['errors_signup']);
        } else if (isset($_GET["signup"]) && $_GET["signup"]==="success")
        {
            echo "<div class='form-success'>Sign-up success!</div>";
        }
    }