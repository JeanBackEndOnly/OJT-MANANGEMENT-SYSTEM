<?php

declare(strict_types=1);

function check_signup_errors(){
        if(isset($_SESSION['errors_input'])){
            $errors = $_SESSION['errors_input'];

            echo '<br>';

            foreach ($errors as $error) {
                echo '<p class="formError">' . $error . '</p>';
            }

            unset($_SESSION['errors_input']);
        }else if(isset($_GET['update']) && $_GET['update'] === "success"){
            echo '<br>';
            echo '<p class="successSignup">Supervisor Updated successfully!</p>';
        }
    }