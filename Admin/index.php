<?php
    require_once '../includes/config.php';
    require_once '../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM users WHERE user_role = :user_role");
            $stmt->execute(array(':user_role' => 'Student'));

            $students = $stmt->fetchAll();

            $number_of_students = count($students);

            $stmt->execute(array(':user_role' => 'Supervisor'));

            $Supervisor = $stmt->fetchAll();

            $number_of_Supervisors = count($Supervisor);
        ?>
        <div class="request-container">
                <div class="icon">
                    <a href="images/mali.png"></a>
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="text">
                    <p class="request-label">Supervisor</p>
                    <p id="student-request-count" class="request-count"><?php echo $number_of_Supervisors; ?></p>
                </div>
            </div>
            <div class="request-container">
                <div class="icon">
                    <a href="images/mali.png"></a>
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="text">
                    <p class="request-label">Students</p>
                    <p id="student-request-count" class="request-count"><?php echo $number_of_students; ?></p>
                </div>
            </div>
        <a href="AddSupervisor/index.php"><button>Supervisor</button></a>
        <a href="view/index.php"><button>Student</button></a>;


    <form action="logout.php">
        <button>logout</button>
    </form>
    
</body>
</html>