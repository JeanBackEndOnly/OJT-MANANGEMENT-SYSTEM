<?php
    require_once "../../includes/config.php";  
    require_once "../../includes/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET["stu_id"])){
            $stu_id = $_GET["stu_id"];
            
            $sql = "SELECT trainee.*, students.*, supervisors.*
            FROM trainee
            RIGHT JOIN students ON trainee.stu_id = students.stu_id
            RIGHT JOIN supervisors ON trainee.supervisor_info_id = supervisors.supervisor_info_id
            where stu_id = :stu_id";

        }else{
            echo '<p>Id not set</p>';
        }
    ?>
</body>
</html>