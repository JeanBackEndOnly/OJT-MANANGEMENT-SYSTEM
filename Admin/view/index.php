<?php
    require_once "../../includes/config.php";  
    require_once "../../includes/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student</title>
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
                        <h6 class="pull-left"></h6>
                        <a href="../addStudent/index.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Add Student</a>
                    </div>
                    
                    <!-- Search form -->
                    <form action="index.php" method="GET">
                            <input type="text" name="stu_id" class="form-control" placeholder="Enter Student ID">
                            <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    
                    <?php
                        // Check if the search button is clicked
                        if(isset($_GET["stu_id"]) && !empty($_GET["stu_id"])){
                            $stu_id = $_GET["stu_id"];

                            // Search for the specific student based on the provided student ID
                            $query = "SELECT * FROM students WHERE stu_id = :stu_id";
                            $stmt = $pdo->prepare($query);
                            $stmt->bindParam(":stu_id", $stu_id);
                            if($stmt->execute()){
                                if($stmt->rowCount() > 0){
                                    // Display the searched student details
                                    echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Student ID</th>";
                                    echo "<th>Last name</th>";
                                    echo "<th>First name</th>";
                                    echo "<th>Middle name</th>";
                                    echo "<th>Email</th>";
                                    echo "<th>Contact</th>";
                                    echo "<th>Address</th>";
                                    echo "<th>Year Level</th>";
                                    echo "<th>Course</th>";
                                    echo "<th>Department</th>";
                                    echo "<th>Duty Status</th>";
                                    echo "<th>Gender</th>";
                                    echo "<th>Action</th>";
                                    echo "</tr>";   
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while ($row = $stmt->fetch()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['stu_id'] . "</td>";
                                        echo "<td>" . $row['student_id'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['middlename'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['contact'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['year_level'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        echo "<td>" . $row['department'] . "</td>";
                                        echo "<td>" . $row['duty_Status'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>";
                                        // Add the action buttons here
                                        echo '<a href="../view/enrol.php?stu_id=' . $row['stu_id'] . '"><button>eEnroldit</button></a>';
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                    echo "</table>";
                                } else {
                                    // Display a message if no records were found
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            } else {
                                // Display an error message if there was an issue executing the query
                                echo "Oops! Something went wrong. Please try again later.";
                            }
                        } else {
                            // If the search button is not clicked, display all students
                            $sql = 'SELECT * FROM students;';
                            if($result = $pdo->query($sql)){
                                if($result->rowCount() > 0){
                                    echo '<table class="table table-bordered table-striped">';
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Student ID</th>";
                                    echo "<th>Last name</th>";
                                    echo "<th>First name</th>";
                                    echo "<th>Middle name</th>";
                                    echo "<th>Email</th>";
                                    echo "<th>Contact</th>";
                                    echo "<th>Address</th>";
                                    echo "<th>Year Level</th>";
                                    echo "<th>Course</th>";
                                    echo "<th>Department</th>";
                                    echo "<th>Duty Status</th>";
                                    echo "<th>Gender</th>";
                                    echo "<th>Action</th>";
                                    echo "</tr>";   
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while ($row = $result->fetch()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['stu_id'] . "</td>";
                                        echo "<td>" . $row['student_id'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['middlename'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['contact'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>" . $row['year_level'] . "</td>";
                                        echo "<td>" . $row['course'] . "</td>";
                                        echo "<td>" . $row['department'] . "</td>";
                                        echo "<td>" . $row['duty_Status'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>";
                                        // Add the action buttons here
                                        echo '<a href="../view/enrol.php?stu_id=' . $row['stu_id'] . '"><button>Enrol</button></a>';
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                    echo "</table>";
                                    unset($result);
                                } else {
                                    // Display a message if no records were found
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                                }
                            }
                        }
                            
                        // Close connection
                        unset($pdo);
                    ?>
                </div>
            </div>        
        </div>
    </div>
    <a href="../index.php">Go back to dashboard</a>
</body>
</html>