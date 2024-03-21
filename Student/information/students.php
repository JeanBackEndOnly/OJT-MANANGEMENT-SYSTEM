<?php

require_once '../../includes/config.php';
require_once '../../includes/session.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $stu_id = $_POST["stu_id"];
    $student_id = $_POST["student_id"];
    $ImageData  = $_POST["ImageData"];
    $firstname  = $_POST["firstname"];
    $lastname  = $_POST["lastname"];
    $middlename  = $_POST["middlename"];
    $email  = $_POST["email"];
    $contact  = $_POST["contact"];
    $address  = $_POST["address"];
    $year_level  = $_POST["year_level"];
    $course  = $_POST["course"];
    $department  = $_POST["department"];
    $gender  = $_POST["gender"];

    try {
        require_once '../information/students_model.php';
        require_once '../information/students_contr.php';

        $errors = [];
        if(is_input_empty($student_id,
        $ImageData,
        $firstname,
        $lastname,
        $middlename,
        $email,
        $contact,
        $address,
        $year_level,
        $course,
        $department,
        $gender
        )){
            $errors["empty_input"] = "please fill all fields!";
        }

        if(is_email_invalid($email)){
            $errors["email_incvalid"] = "please input a valid email!";
        }

        if($errors){
            $_SESSION["errors_input"] = $errors;
            header("Location: ../information/index.php");
            die();
        }
        
        update_trainee( $pdo, 
        $student_id, 
        $ImageData, 
        $firstname, 
        $lastname,
        $middlename, 
        $email, 
        $contact,
        $address,
        $year_level,
        $course,
        $department,
        $gender,
        $stu_id);
        header("Location: ../information/index.php?update=success");

        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}else{
    header("Location: ../information/index.php");
    die();
}