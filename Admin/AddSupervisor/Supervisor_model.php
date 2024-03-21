<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo, string $email){
    $query = "SELECT email FROM supervisors WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $password){
    $user_role = "Supervisor";
    $options = [
        'cost' => 12
    ];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $query = 'INSERT INTO users (username, password, user_role) VALUES (:username, :password, :user_role);';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->bindParam(":user_role", $user_role);
    $stmt->execute();
}

function set_supervisor(object $pdo, int $users_id, string $firstname, string $lastname, string $middlename, string $email, string $department,
        string $position, string $room){
    
    $query = "INSERT INTO supervisors (users_id, firstname, lastname, middlename, email, department, position, room) 
    VALUES (:users_id, :firstname, :lastname, :middlename, :email, :department, :position, :room);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":users_id", $users_id);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":middlename", $middlename);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":position", $position);
    $stmt->bindParam(":department", $department);
    $stmt->bindParam(":room", $room);
    $stmt->execute();
}