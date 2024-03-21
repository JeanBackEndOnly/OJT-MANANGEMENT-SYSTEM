<?php
    require_once "../includes/config.php";
    require_once "../includes/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Supervisor</h1>
    <?php
        $LoggedInID = $_SESSION["user_id"];
        $query = "SELECT supervisor_info_id FROM supervisors WHERE users_id = :user_id;";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['user_id' => $LoggedInID]);
        
        if ($supervisor_row = $stmt->fetch()) {
            $supervisor_info_id = $supervisor_row['supervisor_info_id'];
            $stmt = $pdo->prepare("SELECT * FROM request WHERE supervisor_id = :supervisor_id AND request_status = :request_status");
            $stmt->bindParam(':supervisor_id', $supervisor_id, PDO::PARAM_INT);
            $stmt->bindParam(':request_status', $request_status, PDO::PARAM_STR); // Example request status
            $supervisor_id = $supervisor_info_id; // Example supervisor ID
            $request_status = 'pending';
            $stmt->execute();
        

            $request = $stmt->fetchAll();
            $number_of_request = count($request);

            $supervisor_id = $supervisor_info_id; // Example supervisor ID
            $request_status = 'Enrolled';
            $stmt->execute();
        

            $requests = $stmt->fetchAll();
            $number_of_requests = count($requests);
            ?>
            <div class="request-container">
                <div class="icon">
                    <a href="images/mali.png"></a>
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="text">
                    <p class="request-label">Student Request</p>
                    <p id="student-request-count" class="request-count"><?php echo $number_of_request; ?></p>
                </div>
            </div>
            <div class="request-container">
                <div class="icon">
                    <a href="images/mali.png"></a>
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div class="text">
                    <p class="request-label">Student Enrolled</p>
                    <p id="student-request-count" class="request-count"><?php echo $number_of_requests; ?></p>
                </div>
            </div>
        <?php
        }
        
    ?>
    <a href="Student_Request/index.php"><button>Requests</button></a>
    <a href="Trainee/index.php"><button>Trainee</button></a>
    <form action="../Supervisor/logout.php"><button>Logout</button></form>
</body>
</html>