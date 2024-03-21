<?php

require_once '../../includes/config.php';
require_once '../../includes/session.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["trainee_id"])) {
        $trainee_id = $_POST["trainee_id"];
        $student_id = $_POST["student_id"];
        $ImageData = $_POST["ImageData"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $middlename = $_POST["middlename"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $address = $_POST["address"];
        $year_level = $_POST["year_level"];
        $course = $_POST["course"];
        $department = $_POST["department"];
        $gender = $_POST["gender"];

        try {
            require_once '../Trainee/trainee_model.php';
            require_once '../Trainee/trainee_contr.php';

            $errors = [];
            if (is_input_empty(
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
             $gender)) {
                $errors["empty_input"] = "Please fill all fields!";
            }
            if (is_invalid_email($email)) {
                $errors["invalid_email"] = "Please input valid email!";
            }
            // if (is_email_registered($pdo, $email)) {
            //     $errors["email_registered"] = "Email has already been registered!";
            // }

            if ($errors) {
                $_SESSION["errors_input"] = $errors;
                header("Location: ../Trainee/trainee.php");
                exit();
            } else {
                // If no errors, proceed with update
                update_trainee(
                $pdo, 
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
                $trainee_id);
                header("Location: ../Trainee/trainee.php?update=success");
                exit();
            }
        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    } else {
        exit();
    }
} else {
    header("Location: ../Trainee/trainee.php");
    exit();
}
