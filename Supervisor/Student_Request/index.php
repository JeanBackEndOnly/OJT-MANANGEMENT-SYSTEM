<?php
    require_once "../../includes/config.php";
    require_once "../../includes/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                    <h1>
                        <?php
                            if(isset($_SESSION["user_id"])){
                                $user_id = $_SESSION["user_id"];
            
                                echo '<p>' . $user_id . '</p>';
                            }else{
                                echo '<p>Supervisor ID not set</p>';
                            }
                        ?>
                    </h1>
                        <h2 class="pull-left">Enrollies</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Search Enrollies</a>
                    </div>
                    <?php
                    
                    $user_id = $_SESSION["user_id"];
                    $sql = "SELECT request.*, students.student_id, students.lastname, students.firstname, students.department, students.stu_id, students.duty_Status, supervisors.supervisor_info_id
                            FROM request
                            INNER JOIN students ON request.stu_id = students.stu_id
                            INNER JOIN supervisors ON request.supervisor_id = supervisors.supervisor_info_id
                            INNER JOIN users ON supervisors.users_id = users.user_id
                            WHERE users.user_id = :user_id";
                    
                    // Prepare the statement
                    $stmt = $pdo->prepare($sql);
                    
                    // Bind parameter
                    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                    
                    // Execute the statement
                    if ($stmt->execute()) {
                        // Fetch data and display
                        if($stmt->rowCount() > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Student ID</th>";
                                        echo "<th>Last name</th>";
                                        echo "<th>First name</th>";
                                        echo "<th>Department</th>";
                                        echo "<th>Status</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";   
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    echo "<tr data-request-id='" . $row['request_id'] . "'>"; 
                                    echo "<tr>";
                                        echo "<td>" . $row['request_id'] . "</td>";
                                        echo "<td>" . $row['student_id'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['department'] . "</td>";
                                        echo "<td>" . $row['request_status'] . "</td>";
                                        echo "<td>";
                                        $row['request_status'] = "Enrolled";
                                        $row['duty_Status'] = "OnDuty";
                                        $row['stu_id'];
                                        $row['supervisor_info_id'];
                                        echo '
                                            <form action="../Student_Request/StuReq.php?request_id='. $row['request_id'] .'" method="post">
                                            <input type="hidden" name="stu_id" value="' . $row['stu_id'] . '">
                                            <input type="hidden" name="request_id" value="' . $row['request_id'] . '">
                                            <input type="hidden" name="student_info_id" value="' . $row['stu_id'] . '">
                                            <input type="hidden" name="supervisor_info_id" value="' . $row['supervisor_info_id'] . '">
                                            <input type="hidden" name="request_status" value="' . $row['request_status'] . '">
                                            <input type="hidden" name="duty_Status" value="' . $row['duty_Status'] . '">
                                            <button onclick="acceptRequest(' . $row['request_id'] . ')">Accept</button>
                                            </form>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set </close>
                            unset($stmt);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                     ?>
                     
                     <a href="../../Supervisor/index.php">go back to dashboard</a>
                </div>
                <!-- <script>
    // Function to accept a student request
    function acceptRequest(requestId) {
        // Send an AJAX request to update the status of the request in the database
        $.ajax({
            type: "POST",
            url: "../../Student_Request/index.php", // Update with the correct URL
            data: { request_id: requestId },
            success: function(response) {
                alert('Are you sure this is your respective student?');
                    console.log('Student Accepted');
                // If the request was successfully accepted, remove the corresponding row from the table
                if(response === "success") {
                    $(`tr[data-request-id="${requestId}"]`).remove();
                } else {
                    alert("Failed to accept the request. Please try again later.");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", error);
                alert("Failed to accept the request. Please try again later.");
            }
        });
    }
</script> -->

            </div>        
        </div>
    </div>
</body>
</html>