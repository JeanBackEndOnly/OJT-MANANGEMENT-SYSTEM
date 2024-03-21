<?php

declare(strict_types=0);

function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_email(object $pdo, string $email)
{
    $query = "SELECT email FROM students WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $userpassword)
{
    $user_role = "Student";
    $options = [
        'cost' => 12
    ];
    $hashedPassword = password_hash($userpassword, PASSWORD_BCRYPT, $options);
    $query = "INSERT INTO users (username, password, user_role) VALUES (:username, :userpassword, :user_role);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":userpassword", $hashedPassword);
    $stmt->bindParam(":user_role", $user_role);
    $stmt->execute();
}

function set_user_info(
    object $pdo,
    int $users_id,
    int $student_id,
    string $ImageData,
    string $firstname,
    string $lastname,
    string $middlename,
    string $email,
    string $contact,
    string $address,
    string $year_level,
    string $course,
    string $department,
    string $gender
) {
    $duty_Status = "offDuty";

    $query = "INSERT INTO students (
    users_id, 
    student_id,
    ImageData,
    firstname, 
    lastname, 
    middlename, 
    email, 
    contact, 
    address, 
    year_level, 
    course, 
    department, 
    gender, 
    duty_Status) 
    VALUES (
    :users_id, 
    :student_id, 
    :ImageData, 
    :firstname, 
    :lastname, 
    :middlename, 
    :email, 
    :contact, 
    :address, 
    :year_level, 
    :course, 
    :department, 
    :gender, 
    :duty_Status) ;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":users_id", $users_id);
    $stmt->bindParam(":student_id", $student_id);
    $stmt->bindParam(":ImageData", $ImageData, PDO::PARAM_LOB);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":middlename", $middlename);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":contact", $contact);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":year_level", $year_level);
    $stmt->bindParam(":course", $course);
    $stmt->bindParam(":department", $department);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":duty_Status", $duty_Status);
    $stmt->execute();
}
