<?php 

    declare(strict_types=1);

    function is_input_empty(string $name, string $email, string $password) : bool
    {
        if (empty($name) || empty($email) || empty($password)) return true;
        else return false;
    }
    
    function is_email_invalid(string $email) : bool
    {
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    } 
    
    function is_email_taken(object $pdo, string $email) : bool
    {
        if (get_email($pdo,$email)) return true;
        else return false;
    }
    
    function are_passwords_not_matched(string $password, string $cpassword) : bool
    {
        if ($password !== $cpassword) return true;
        else return false;
    }

    function create_user(object $pdo, string $name, string $email, string $password)
    {
        set_user($pdo, $name, $email, $password);
    }