<?php 

    declare(strict_types=1);

    function get_email(object $pdo, string $email) : array|false
    {
        $query = "SELECT email FROM users WHERE email = :email;";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        if($stmt->execute()){
            $result = $stmt->fetch();
            return $result;
        } else {
            die("Error occured in getting an email.");
        }
    }

    function set_user(object $pdo, string $name, string $email, string $password) {
        $query = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password);";
        $stmt = $pdo->prepare($query);

        $options = [
            'cost' => 12
        ];
        $hashedPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        
        $stmt->bindValue(":name",$name,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->bindValue(":password",$hashedPassword,PDO::PARAM_STR);
        $stmt->execute();
    }
    