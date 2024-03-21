<?php
    require_once '../../includes/config.php';
    require_once '../../includes/session.php';
    require_once '../information/students_view.php';

    $loggedInId = $_SESSION["user_id"];
        $sql = "SELECT * FROM students WHERE users_id = :users_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['users_id' => $loggedInId]);
        
        if($student_row = $stmt->fetch()){
            $stu_id = $student_row["stu_id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../information/students.php?stu_id=<?php echo $stu_id; ?>" method="post">
    <input type="hidden" name="stu_id" value="<?php echo $stu_id; ?>">
            <input type="text" name="student_id" value="<?php echo $student_row['student_id']; ?>" placeholder="student id"><br>
            <input type="text" name="ImageData" value="<?php echo $student_row['ImageData']; ?>" placeholder="ImageData"><br>
            <input type="text" name="firstname" value="<?php echo $student_row['firstname']; ?>" placeholder="First Name"><br>
            <input type="text" name="lastname" value="<?php echo $student_row['lastname']; ?>" placeholder="Last Name"><br>
            <input type="text" name="middlename" value="<?php echo $student_row['middlename']; ?>" placeholder="Middle Name"><br>
            <input type="email" name="email" value="<?php echo $student_row['email']; ?>" placeholder="E-mail"><br>
            <input type="text" name="contact" value="<?php echo $student_row['contact']; ?>" placeholder="Contact"><br>
            <input type="text" name="address" value="<?php echo $student_row['address']; ?>" placeholder="Address"><br>
            <input type="text" name="year_level" value="<?php echo $student_row['year_level']; ?>" placeholder="year level"><br>
            <input type="text" name="course" value="<?php echo $student_row['course']; ?>" placeholder="course"><br>
            <input type="text" name="department" value="<?php echo $student_row['department']; ?>" placeholder="department"><br>
            <input type="text" name="gender" value="<?php echo $student_row['gender']; ?>" placeholder="gender"><br>
        <button type="submit">Update</button>
    </form>
    <a href="../../Student/index.php">go back to dashboard</a>
<?php
    check_signup_errors();
    }
?>
</body>
</html>