<?php
require_once 'includes/session.php';
require_once 'login_Signup/signup_view.php';
require_once 'login_Signup/login_view.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup Tabs</title>
    <link rel="stylesheet" href="<?php echo 'css/output.css' ?>">

</head>

<body>
    <?php
    if (!isset($_SESSION["user_id"])) { ?>
        <div class="side">
            <div class="in">On Job Training</div>
        </div>

        <label onclick="ober()" for="ch" class="overlay"></label>


        <div class="entry">


            <div id="logn">
                <form action="login_Signup/login.php" method="post">
                    <h2>Login</h2>
                    <div class="icon-input-container">
                        <i class="fa-regular fa-circle-user" "></i>
                    <input type=" text" id="Logusername" name="username" placeholder="Username" class="border">
                    </div>

                    <div class="icon-input-container">
                        <i class="fas fa-lock" ></i>
                    <input type=" password" id="Logpassword" placeholder="Password" name="password" class="border">
                    </div>



                    <div class="betlogin">
                        <div class="top">
                            <label class="noepek">Login</label>
                            <label id="signup-tab" class="wepek">
                                <a href="Register.php">Sign Up</a>
                            </label>
                        </div>

                        <button id="btlog" type="submit">Login</button>
                    </div>

                    <?php
                    check_login_errors();
                    ?>
                </form>
            </div>

        <?php } ?>

        </div>
        <div class="but">
            <label for="ch" onclick="ober()">Explore</label>
        </div>
        <div class="yelup">
            <img src="images/yel.png">
        </div>
        <div class="yelup2">
            <img src="images/yel.png">
        </div>
        <input type="checkbox" id="ch">
        <input type="checkbox" id="ch2">

        <script src="https://kit.fontawesome.com/02db36d522.js" crossorigin="anonymous"></script>
        <script>
            let entry = $('.entry');
            let checkb = $('#ch');
            let ov = $('.overlay');
            let start = $('.but');


            function ober() {

                if (!checkb.checked) {
                    console.log("hello");
                    ov.classList.add('ovdaw');
                    entry.classList.add('entry2');
                    start.classList.add('st');
                } else {
                    ov.classList.remove('ovdaw');
                    entry.classList.remove('entry2');
                    start.classList.remove('st');

                }


            }

            function $(s) {
                return document.querySelector(s);

            }
        </script>

</body>

</html>