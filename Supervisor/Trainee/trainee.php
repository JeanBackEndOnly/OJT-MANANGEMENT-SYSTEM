<?php
    require_once '../../includes/config.php';
    require_once '../../includes/session.php';
    require_once '../Trainee/trainee_view.php';

    if(isset($_GET["trainee_id"])){
        $trainee_id = $_GET["trainee_id"];


        $sql = "SELECT trainee.*, students.*
        FROM trainee
        LEFT JOIN students ON trainee.stu_id = students.stu_id
        WHERE trainee.trainee_id = :trainee_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['trainee_id' => $trainee_id]);
        $trainee = $stmt->fetch(PDO::FETCH_ASSOC);
        // echo '<p>' . $trainee_id . '</p>';
        if(!$trainee){
            echo '<p>trainee not found!</p>';
            exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Student information</h1>
        <form action="../Trainee/trainee.inc.php?trainee_id=<?php echo $trainee_id; ?>" method="post">
            <input type="hidden" name="trainee_id" value="<?php echo $trainee_id; ?>">
            <input type="text" name="student_id" value="<?php echo $trainee['student_id']; ?>" placeholder="student id"><br>
            <input type="text" name="ImageData" value="<?php echo $trainee['ImageData']; ?>" placeholder="ImageData"><br>
            <input type="text" name="firstname" value="<?php echo $trainee['firstname']; ?>" placeholder="First Name"><br>
            <input type="text" name="lastname" value="<?php echo $trainee['lastname']; ?>" placeholder="Last Name"><br>
            <input type="text" name="middlename" value="<?php echo $trainee['middlename']; ?>" placeholder="Middle Name"><br>
            <input type="email" name="email" value="<?php echo $trainee['email']; ?>" placeholder="E-mail"><br>
            <input type="text" name="contact" value="<?php echo $trainee['contact']; ?>" placeholder="Contact"><br>
            <input type="text" name="address" value="<?php echo $trainee['address']; ?>" placeholder="Address"><br>
            <input type="text" name="year_level" value="<?php echo $trainee['year_level']; ?>" placeholder="year level"><br>
            <input type="text" name="course" value="<?php echo $trainee['course']; ?>" placeholder="course"><br>
            <input type="text" name="department" value="<?php echo $trainee['department']; ?>" placeholder="department"><br>
            <input type="text" name="gender" value="<?php echo $trainee['gender']; ?>" placeholder="gender"><br>
            <button type="submit">Update</button>
        </form>
    <?php
    check_signup_errors();
    }
    ?>
</body>
</html>