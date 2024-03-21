<?php

require_once '../../../includes/config.php';
require_once '../../../includes/session.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["supervisor_info_id"])) {
        $supervisor_info_id = $_POST["supervisor_info_id"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $middlename = $_POST["middlename"];
        $email = $_POST["email"];
        $position = $_POST["position"];
        $department = $_POST["department"];
        $room = $_POST["room"];

        try {
            require_once '../EditSupervisor/Supervisor_model.php';
            require_once '../EditSupervisor/Supervisor_contr.php';

            $errors = [];
            if (is_input_empty($firstname, $lastname, $middlename, $email, $position, $department, $room)) {
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
                header("Location: ../EditSupervisor/index.php");
                exit();
            } else {
                // If no errors, proceed with update
                update_supervisor($pdo, $firstname, $lastname, $middlename, $email, $position, $department, $room, $supervisor_info_id);
                header("Location: ../EditSupervisor/index.php?update=success");
                exit();
            }
        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    } else {
        exit();
    }
} else {
    header("Location: ../EditSupervisor/index.php");
    exit();
}
