<?php
require_once 'includes/session.php';
require_once 'login_Signup/signup_view.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo 'css/output.css'; ?>">
    <title>Create Account</title>
</head>

<body>

    <div class="side">
        <div class="in">On Job Training</div>
    </div>

    <label onclick="ober()" for="ch" class="overlay"></label>
    <div class="entry" style="display: block;">

        <div id="signup">
            <form id="signupForm" action="#">
                <div id="first">
                    <h2>Signup</h2>
                    <div class="icon-input-container">
                        <i class="fa-regular fa-address-card"></i>
                        <input   class="LN" type="text" name="student_id" placeholder="Student ID">
                    </div>
                    <div class="icon-input-container">
                        <i class="fa-regular fa-user"></i>
                        <input   class="FN" type="text" name="firstname" placeholder="First Name">
                    </div>
                    <div class="icon-input-container">
                        <i class="fa-regular fa-user"></i>
                        <input   class="LN" type="text" name="lastname" placeholder="Last Name">
                    </div>
                    <div class="icon-input-container">
                        <i class="fa-regular fa-user"></i>
                        <input   class="LN" type="text" name="middlename" placeholder="Middle Name">
                    </div>
                    <div class="icon-input-container">
                        <i class="fas fa-graduation-cap"></i>
                        <input   class="CN" type="text" name="year_level" placeholder="Year level">
                    </div>
                    <div class="betsign">
                        <div class="top">
                            <label ><a href="index.php?login=nao">Login

                                </a></label>
                            <label class="noepek">Sign Up</label>
                        </div>
                    </div>
                    <div class="nxbk">
                        <i></i>
                        <i id="nextToSecond" class="fa-solid fa-circle-right fa-2xl" style="color: #ffffff;"></i>
                    </div>
                    <?php
                check_signup_errors();
                ?>
                </div>

                <div id="second">
                    <div id="gn" class="icont">
                        <div class="fm">
                            <i class="fas fa-venus fa-lg "></i>
                            <input   type="radio" name="gender" value="Female">
                        </div>
                        <div class="ml">
                            <i class="fas fa-mars fa-lg"></i>
                            <input   type="radio" name="gender" value="Male">
                        </div>
                    </div>
                    <div class="icon-input-container">
                        <i class="fa-regular fa-envelope"></i>
                        <input   type="text" name="email" placeholder="E-mail">
                    </div>
                    <div class="icon-input-container">
                        <i class="fa-solid fa-phone"></i>
                        <input   type="text" name="contact" placeholder="Contact Number">
                    </div>
                    <div class="icon-input-container">
                        <i class="fas fa-map-marker-alt"></i>
                        <textarea name="address" id="adrs" cols="30" rows="2" placeholder="Address"></textarea>
                    </div>
                    <div class="icon-input-container">
                        <i class="fas fa-book"></i>
                        <input   type="text" name="course" placeholder="Course">
                    </div>
                    <div class="icon-input-container">
                        <i class="fas fa-building"></i>
                        <input   type="text" name="department" placeholder="Department">
                    </div>


                    <div class="nxbk">
                        <i id="backToFirst" class="fa-solid fa-circle-right fa-flip-horizontal fa-2xl" style="color: #ffffff;"></i>
                        <i id="nextToLast" class="fa-solid fa-circle-right fa-2xl" style="color: #ffffff;"></i>
                    </div>

                </div>

                <div id="last">
                    <div class="lasti">
                        <i id="backToSecond" class="fa-solid fa-circle-right fa-flip-horizontal fa-2xl" style="color: #ffffff;"></i>
                        <i></i>
                    </div>
                    <div class="icon-input-container">
                        <i class="fa-regular fa-circle-user"></i>
                        <input   type=" text" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="icon-input-container">
                        <i class="fas fa-lock"></i>
                        <input   type="password" id="password" placeholder="Password" name="userpassword" class="border">
                    </div>
                    <div class="icon-input-container">
                        <i class="fas fa-lock"></i>
                        <input   class="CP" type="password" name="confirm_password" placeholder="Confirm Password">
                    </div>


                    <div class="betsign">
                        <div class="top">
                            <label for="ch2"><a href="index.php">Login
                                </a></label>
                            <label class="noepek">Sign Up</label>
                        </div>
                        <button id="btsign" type="submit" ><a href="login_Signup/signup.php">Signup</a></button>
                    </div>

                </div>
            </form>
        </div>
    </div>



    <script src="https://kit.fontawesome.com/02db36d522.js" crossorigin="anonymous"></script>
    <script >
        document.addEventListener("DOMContentLoaded", function () {
    const firstSection = $('#first');
    const secondSection = $('#second');
    const lastSection = $('#last');

    const firstBack = $('#backToFirst');
    const secondBack = $('#backToSecond');
    const nextToSecondBtn = $("#nextToSecond");
    const nextToLastBtn = $("#nextToLast");

    nextToSecondBtn.addEventListener("click", function () {
        firstSection.classList.add("one");
        secondSection.classList.add("two");
    });
    nextToLastBtn.addEventListener("click", function () {
        secondSection.classList.remove("two");
        lastSection.classList.add("tri");
    });




    firstBack.addEventListener("click", function () {
        firstSection.classList.remove("one");
        secondSection.classList.remove("two");
    });
    secondBack.addEventListener("click", function () {
        secondSection.classList.add("two");
        lastSection.classList.remove("tri");
    });








});


function $(s) {
    return document.querySelector(s);

}

    </script>

</body>

</html>