<?php

require_once '../../includes/config.php';
require_once '../../includes/session.php';


function Admit_Student(object $pdo, string $stu_id, string $supervisor_info_id){
    $query = "INSERT INTO trainee (stu_id, supervisor_info_id)  VALUES (:stu_id, :supervisor_info_id);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":stu_id", $stu_id);
    $stmt->bindParam(":supervisor_info_id", $supervisor_info_id);
    $stmt->execute();
}
function update_request_status(object $pdo, string $request_id, string $request_status){
    $query = "UPDATE request SET request_status = :request_status WHERE request_id = :request_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":request_id", $request_id);
    $stmt->bindParam(":request_status", $request_status);
    $stmt->execute();
}

function update_student_duty_Status(object $pdo, string $stu_id, string $duty_Status){
    $query = "UPDATE students SET duty_Status = :duty_Status WHERE stu_id = :stu_id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":stu_id", $stu_id);
    $stmt->bindParam(":duty_Status", $duty_Status);
    $stmt->execute();
}
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $stu_id = $_POST["stu_id"];
    $supervisor_info_id = $_POST["supervisor_info_id"];
    $request_id = $_POST["request_id"];
    $request_status = $_POST["request_status"];
    $duty_Status = $_POST["duty_Status"];

    try {
        Admit_Student($pdo, $stu_id, $supervisor_info_id);
        update_request_status($pdo, $request_id, $request_status);
        update_student_duty_Status($pdo, $stu_id, $duty_Status);
        header("Location: ../index.php");
        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOExcpetion $e) {
        die("Query Failed: " . $e->getMessage());
    }

    
}else{
    header("Location: ../index.php");
    die();
}