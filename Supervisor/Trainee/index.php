<?php
    require_once '../../includes/config.php';
    require_once '../../includes/session.php';
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
    <?php
        // $superviorLoggedInId = $_SESSION["user_id"];
        // $query = "SELECT supervisor_info_id FROM supervisors WHERE users_id = :users_id";
        // $stmt = $pdo->prepare($query);
        // $stmt->execute(['users_id' => $superviorLoggedInId]);

        // if($supervisor_row = $stmt->fetch()){
        //     $supervisor_id = $supervisor_row['supervisor_info_id'];
        // }

        // $sql = "SELECT trainee.*, Students.*
        // FROM trainee
        // LEFT JOIN Students ON trainee.stu_id = Students.stu_id
        // LEFT JOIN supervisors ON trainee.supervisor_info_id = supervisors.supervisor_info_id
        // WHERE supervisors.supervisor_info_id = :supervisor_info_id"; 
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindParam(':supervisor_info_id', $supervisor_id, PDO::PARAM_INT);
        // if($stmt->execute()){
        //     if($stmt->rowcount() > 0){
        //         echo '<p>ID</p>';
        //         while($row = $stmt->fetch()){
        //             echo '<p>' . $row["trainee_id"] . '</p>';
        //         }
        //     }
        // }
    ?>
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
                        <h2 class="pull-left">Trainee</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Search Trainee</a>
                    </div>
                    <?php
                    
                    $superviorLoggedInId = $_SESSION["user_id"];
                    $query = "SELECT supervisor_info_id FROM supervisors WHERE users_id = :users_id";
                    $stmt = $pdo->prepare($query);
                    $stmt->execute(['users_id' => $superviorLoggedInId]);
            
                    if($supervisor_row = $stmt->fetch()){
                        $supervisor_id = $supervisor_row['supervisor_info_id'];
                    }
            
                    $sql = "SELECT trainee.*, Students.*
                    FROM trainee
                    LEFT JOIN Students ON trainee.stu_id = Students.stu_id
                    LEFT JOIN supervisors ON trainee.supervisor_info_id = supervisors.supervisor_info_id
                    WHERE supervisors.supervisor_info_id = :supervisor_info_id"; 
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':supervisor_info_id', $supervisor_id, PDO::PARAM_INT);
                    if($stmt->execute()){
                        if($stmt->rowcount() > 0){
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
                                while($row = $stmt->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['trainee_id'] . "</td>";
                                        echo "<td>" . $row['student_id'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['department'] . "</td>";
                                        echo "<td>" . $row['duty_Status'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="../Trainee/trainee.php?trainee_id=' . $row['trainee_id'] . '"><button>Edit</button></a>';
                                        echo '<a href=""><button>Delete</button></a>';
                                        
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
            </div>        
        </div>
    </div>

</body>
</html>