<?php

require_once '../../includes/config.php';
require_once '../../includes/session.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $middlename = $_POST["middlename"];
    $email = $_POST["email"];
    $position = $_POST["position"];
    $department = $_POST["department"];
    $room = $_POST["room"];
    $username = $_POST["username"];
    $userpassword = $_POST["userpassword"];
    $con_userpassword = $_POST["con_userpassword"];

    try {
        require_once '../AddSupervisor/Supervisor_model.php';
        require_once '../AddSupervisor/Supervisor_contr.php';

        $errors = [];
        if(is_input_empty($firstname, $lastname, $middlename, $email, $department,
                        $position, $room, $username, $userpassword, $con_userpassword)){
            $errors["emprty_input"] = "Please fill all fields!";
        }
        if(is_invalid_email($email)){
            $errors["invalid_email"] = "Please input valid email!";
        }
        if(is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Username already taken!";
        }
        if(is_email_registered($pdo, $email)){
            $errors["email_registered"] = "Email has been already registered!";
        }
        if(is_password_not_matched($con_userpassword, $userpassword)){
            $errors["not_matched"] = "Password not matched!";
        }

        if($errors){
            $_SESSION["errors_Created"] = $errors;
            $adminInput = [
                "firstname" => $firstname,
                "lastname" => $lastname,
                "middlename" => $middlename,
                "email" => $email,
                "department" => $department,
                "position" => $position,
                "room" => $room,
                "username" => $username,
            ];
            $_SESSION["admin_input"] = $adminInput;
            header("Location: ../AddSupervisor/index.php");
            die();
        }
        $user_id = create_user($pdo, $username, $userpassword);
        create_supervisor($pdo, $user_id, $firstname, $lastname, $middlename, $email, $department, $position, $room);
        header("Location: ../../Admin/index.php?create=success");

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}else{
    header("Location: ../AddSupervisor/index.php");
    die();
}