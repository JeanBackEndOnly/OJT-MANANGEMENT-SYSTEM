<?php
require_once '../includes/config.php';
require_once '../includes/session.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = intval($_POST["student_id"]);
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $middlename = $_POST["middlename"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $year_level = $_POST["year_level"];
    $address = $_POST["address"];
    $course = $_POST["course"];
    $department = $_POST["department"];
    $gender = $_POST["gender"];
    $username = $_POST["username"];
    $userpassword = $_POST["userpassword"];
    $confirm_password = $_POST["confirm_password"];
    $user_role;



 
    try {
        require_once 'signup_model.php';
        require_once 'signup_contr.php';
        
    

        $errors = [];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $ImageData = file_get_contents($_FILES['image']['tmp_name']);
        } else {
            $errors["pic_error"] = "Please choose a profile pic!!";
        }
        if (is_empty_inputs(
            $student_id,
            $firstname,
            $lastname,
            $middlename,
            $username,
            $userpassword,
            $confirm_password,
            $email,
            $address,
            $contact,
            $year_level,
            $course,
            $department,
            $gender
        )) {
            $errors["empty_inputs"] = "Please fill all fields!";
        }
        if (is_invalid_email($email)) {
            $errors["invalid_email"] = "Please input valid email!";
        }
        if (is_studentid_invalid($student_id)) {
            $errors["invalid_studid"] = "Student id must integer Integer!";
        }
        if (is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if (is_email_registered($pdo, $email)) {
            $errors["email_registered"] = "Email has been already registered!";
        }
        // if(is_userInput_int($contact)){
        //     $errors["int_input"] = "Please input contact number!";
        // }
        if (is_password_not_matched($confirm_password, $userpassword)) {
            $errors["not_matched"] = "Password not matched!";
        }

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            $signupData = [
                "student_id" => $student_id,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "middlename" => $middlename,
                "email" => $email,
                "contact" => $contact,
                "address" => $address,
                "year_level" => $year_level,
                "course" => $course,
                "department" => $department,
                "gender" => $gender,
                "username" => $username
            ];
            $_SESSION["signup_data"] = $signupData;
            header("Location: ../Register.php?success=false");
            die();
        }
        $user_id = create_user(
            $pdo,
            $username,
            $userpassword
        );
        create_user_info(
            $pdo,
            $user_id,
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
            $gender
        );
        header("Location: ../Register.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../Register.php");
    die();
}
