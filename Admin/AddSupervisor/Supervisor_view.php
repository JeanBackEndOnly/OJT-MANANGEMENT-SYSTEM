<?php

declare(strict_types=1);
    
    function Admin_inputs(){
        
        if(isset($_SESSION["admin_input"]["firstname"]) && isset($_SESSION["errors_Created"])){
            echo '<input class="LN"  type="text" name="firstname" placeholder="First Name" value="' . $_SESSION["admin_input"]["firstname"] . '">';
        }else{
            echo '<input class="LN"  type="text" name="firstname" placeholder="First Name">';
        }
        if(isset($_SESSION["admin_input"]["lastname"]) && isset($_SESSION["errors_Created"])){
            echo '<input class="LN"  type="text" name="lastname" placeholder="Last Name" value="' . $_SESSION["admin_input"]["lastname"] . '">';
        }else{
            echo '<input class="LN"  type="text" name="lastname" placeholder="Last Name">';
        }
        if(isset($_SESSION["admin_input"]["middlename"]) && isset($_SESSION["errors_Created"])){
            echo '<input class="LN"  type="text" name="middlename" placeholder="Middle Name" value="' . $_SESSION["admin_input"]["middlename"] . '">';
        }else{
            echo '<input class="LN"  type="text" name="middlename" placeholder="Middle Name">';
        }
        if(isset($_SESSION["admin_input"]["email"]) && !isset($_SESSION["errors_Created"]["email_registered"])){
            echo '<input class="LN"  type="text" name="email" placeholder="E-mail" value="' . $_SESSION["admin_input"]["email"] . '">';
        }else{
            echo '<input class="LN"  type="text" name="email" placeholder="E-mail">';
        }
        if(isset($_SESSION["admin_input"]["department"]) && isset($_SESSION["errors_Created"])){
            echo '<input class="LN"  type="text" name="department" placeholder="Department" value="' . $_SESSION["admin_input"]["department"] . '">';
        }else{
            echo '<input class="LN"  type="text" name="department" placeholder="Department">';
        }
        if(isset($_SESSION["admin_input"]["position"]) && isset($_SESSION["errors_Created"])){
            echo '<input class="LN"  type="text" name="position" placeholder="Position" value="' . $_SESSION["admin_input"]["position"] . '">';
        }else{
            echo '<input class="LN"  type="text" name="position" placeholder="Position">';
        }
        if(isset($_SESSION["admin_input"]["room"]) && isset($_SESSION["errors_Created"])){
            echo '<input class="LN"  type="text" name="room" placeholder="room" value="' . $_SESSION["admin_input"]["room"] . '">';
        }else{
            echo '<input class="LN"  type="text" name="room" placeholder="room">';
        }
        if(isset($_SESSION["admin_input"]["username"]) && !isset($_SESSION["errors_Created"]["username_taken"])){
            echo '<input class="LN"  type="text" name="username" placeholder="Username" value="' . $_SESSION["admin_input"]["username"] . '">';
        }else{
            echo '<input class="LN"  type="text" name="username" placeholder="Username">';
        }
    
        echo '<input class="P"  type="password" name="userpassword" placeholder="Password">';
        echo '<input class="CP"  type="password" name="con_userpassword" placeholder="Confirm Password">';
    }
    function check_signup_errors(){
        if(isset($_SESSION['errors_Created'])){
            $errors = $_SESSION['errors_Created'];

            echo '<br>';

            foreach ($errors as $error) {
                echo '<p class="formError">' . $error . '</p>';
            }

            unset($_SESSION['errors_Created']);
        }else if(isset($_GET['create']) && $_GET['create'] === "success"){
            echo '<br>';
            echo '<p class="successSignup">Supervisor Added successfully!</p>';
        }
    }