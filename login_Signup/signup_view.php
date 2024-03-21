<?php

declare(strict_types=1);

function signup_inputs()
{
    echo '<div id="first">
        <h2>Signup</h2>
        ';
    if (isset($_SESSION["signup_data"]["student_id"]) && isset($_SESSION["errors_signup"])) {
        echo '<div class="icon-input-container">
            <i class="fa-regular fa-address-card"></i>';
        echo '<input class="LN"  type="text" name="student_id" placeholder="Student ID" value="' . $_SESSION["signup_data"]["student_id"] . '"> </div> ';
    } else {
        echo '<div class="icon-input-container">
            <i class="fa-regular fa-address-card"></i>';
        echo '<input class="LN"  type="text" name="student_id" placeholder="Student ID"> </div> ';
    }

    if (isset($_SESSION["signup_data"]["firstname"]) && isset($_SESSION["errors_signup"])) {
        echo '<div class="icon-input-container">
        <i class="fa-regular fa-user"></i>';
        echo '<input class="FN" type="text" name="firstname" placeholder="First Name" value="' . $_SESSION["signup_data"]["firstname"] . '"> </div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fa-regular fa-user"></i>';
        echo '<input class="FN"  type="text" name="firstname" placeholder="First Name"> </div>';
    }

    if (isset($_SESSION["signup_data"]["lastname"]) && isset($_SESSION["errors_signup"])) {
        echo '<div class="icon-input-container">
        <i class="fa-regular fa-user"></i> ';
        echo '<input class="LN"  type="text" name="lastname" placeholder="Last Name" value="' . $_SESSION["signup_data"]["lastname"] . '"> </div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fa-regular fa-user"></i> ';
        echo '<input class="LN"  type="text" name="lastname" placeholder="Last Name" > </div>';
    }

    if (isset($_SESSION["signup_data"]["middlename"]) && isset($_SESSION["errors_signup"])) {
        echo '<div class="icon-input-container">
        <i class="fa-regular fa-address-card"></i>';
        echo '<input class="LN"  type="text" name="middlename" placeholder="Middle Name" value="' . $_SESSION["signup_data"]["middlename"] . '"> </div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fa-regular fa-user"></i>';
        echo '<input class="LN"  type="text" name="middlename" placeholder="Middle Name"> </div>';
    }
    if (isset($_SESSION["signup_data"]["year_level"]) && isset($_SESSION["errors_signup"])) {
        echo '<div class="icon-input-container">
        <i class="fas fa-graduation-cap"></i>';
        echo '<input class="CN"  type="text" name="year_level" placeholder="year level" value="' . $_SESSION["signup_data"]["year_level"] . '"> </div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fas fa-graduation-cap"></i>';
        echo '<input class="CN"  type="text" name="year_level" placeholder="year level"> </div> ';
    }
    echo '<div class="betsign">
    <div class="top">
        <label  ><a  href="index.php" >Login
            </a></label>
        <label class="noepek">Sign Up</label>
    </div>
</div>
<div class="nxbk">
    <i></i>
    <i id="nextToSecond" class="fa-solid fa-circle-right fa-2xl" style="color: #ffffff;"></i>
</div>';
check_signup_errors();

    echo ' </div>';











    echo '<div id="second">
<div id="gn" class="icont">
    <div class="fm">
        <i class="fas fa-venus fa-lg "></i>
        <input type="radio" name="gender" value="Female">
    </div>
    <div class="ml">
        <i class="fas fa-mars fa-lg"></i>
        <input type="radio" name="gender" value="Male">
    </div>
</div>';
    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_registered"])) {
        echo '<div class="icon-input-container">
        <i class="fa-regular fa-envelope"></i>';
        echo '<input class="M"  type="text" name="email" placeholder="E-mail" value="' . $_SESSION["signup_data"]["email"] . '"></div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fa-solid fa-envelope"></i>';
        echo '<input class="M"  type="text" name="email" placeholder="E-mail"></div>';
    }

    if (isset($_SESSION["signup_data"]["contact"]) && isset($_SESSION["errors_signup"])) {
        echo '<div class="icon-input-container">
        <i class="fa-solid fa-phone"></i>';
        echo '<input class="CN"  type="text" name="contact" placeholder="Contact Number" value="' . $_SESSION["signup_data"]["contact"] . '"></div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fa-solid fa-phone"></i>';
        echo '<input class="CN"  type="text" name="contact" placeholder="Contact Number"></div>';
    }

    if (isset($_SESSION["signup_data"]["address"]) && isset($_SESSION["errors_signup"])) {
        echo '<div class="icon-input-container">
        <i class="fas fa-map-marker-alt"></i>';
        echo '<textarea class="A"  name="address" id="" cols="30" rows="2" placeholder="Address">' . $_SESSION["signup_data"]["address"] . '</textarea></div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fas fa-map-marker-alt"></i>';
        echo '<textarea class="A"  name="address" id="" cols="30" rows="2" placeholder="Address"></textarea></div>';
    }

    if (isset($_SESSION["signup_data"]["course"]) && isset($_SESSION["errors_signup"])) {
        echo '<div class="icon-input-container">
        <i class="fas fa-book"></i>';
        echo '<input class="LN"  type="text" name="course" placeholder="course" value="' . $_SESSION["signup_data"]["course"] . '"></div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fas fa-book"></i>';
        echo '<input class="LN"  type="text" name="course" placeholder="course"></div>';
    }

    if (isset($_SESSION["signup_data"]["department"]) && isset($_SESSION["errors_signup"])) {
        echo '<div class="icon-input-container">
        <i class="fas fa-building"></i>';
        echo '<input class="LN"  type="text" name="department" placeholder="department" value="' . $_SESSION["signup_data"]["department"] . '"></div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fas fa-building"></i>';
        echo '<input class="LN"  type="text" name="department" placeholder="department"></div>';
    }

    echo '<div class="nxbk">
    <i id="backToFirst" class="fa-solid fa-circle-right fa-flip-horizontal fa-2xl" style="color: #ffffff;"></i>
    <i id="nextToLast" class="fa-solid fa-circle-right fa-2xl" style="color: #ffffff;"></i></div></div>';




    echo '<div id="last">

    <div class="lasti">
        <i id="backToSecond" class="fa-solid fa-circle-right fa-flip-horizontal fa-2xl" style="color: #ffffff;"></i>
        <i></i>
    </div>';


    echo '<div class="picpackall">
    <div class="packim" id="packim">
        <li>
            <img id="profileImage" src="images/def.png" alt="prof">
            <label for="image" class="plus">
                <img src="images/plus.png" alt="add">
            </label>
        </li>
    </div>
</div>';

    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo '<div class="icon-input-container">
        <i class="fa-regular fa-circle-user" "></i>';
        echo '<input class="U"  type="text" name="username" placeholder="Username" value="' . $_SESSION["signup_data"]["username"] . '"> </div>';
    } else {
        echo '<div class="icon-input-container">
        <i class="fa-regular fa-circle-user" "></i>';
        echo '<input class="U"  type="text" name="username" placeholder="Username"> </div>';
    }

    echo '<div class="icon-input-container">
    <i class="fas fa-lock"></i>';
    echo '<input class="P"  type="password" name="userpassword" placeholder="Password"> </div>';
    echo '<div class="icon-input-container">
    <i class="fas fa-lock"></i>';
    echo '<input class="CP"  type="password" name="confirm_password" placeholder="Confirm Password"> </div>';


    echo '<div class="betsign">
    <div class="top">
        <label for="ch2"><a href="index.php">Login
            </a></label>
        <label class="noepek">Sign Up</label>
    </div>
    <input type="file" name="image" id="image" accept="image/*" onchange="handleImageChange()">
    <button id="btsign" type="submit" >Signup</button></div>
    
    </div>';
}

function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];
        foreach ($errors as $error) {
            echo '<p class="formError" style="color:red;">' . $error . '</p>';
        }
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET['signup']) && $_GET['signup'] === "success") {
        echo '<p class="successSignup" style="color:green;">signup success!</p>';
    }
}
