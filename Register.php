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
            <form id="signupForm" action="login_Signup/signup.php" method="post" enctype="multipart/form-data">

            <?php signup_inputs();
            
            ?>
                
 
            </form>
        </div>
    </div>


    <div class="yelup">
        <img src="images/yel.png" >
    </div>
    <div class="yelup2">
            <img src="images/yel.png">
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
function handleImageChange() {
            const profileImage = document.getElementById('profileImage');
            const input = document.getElementById('image');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function() {
                    profileImage.src = reader.result;
                };

                reader.readAsDataURL(file);
            } else {
                redpack.style.borderColor = 'white';
                profileImage.src = 'images/def.png';
            }
        }


function $(s) {
    return document.querySelector(s);

}

    </script>

</body>

</html>