<?php

declare(strict_types=1);
/*
function get_user(object $pdo, string $username){
    $query = "SELECT * FROM user_signup WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
} */
function get_user(object $pdo, string $username){
    $query = "SELECT * FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);  
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["user-role"] = $user["user_role"];

        // Debugging output
        error_log("User Role: " . $_SESSION["user-role"]);

        return $user;
    } else {
        // User not found
        return null;
    }
}
