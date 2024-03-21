<?php

require_once '../../includes/config.php';
require_once '../../includes/session.php';

function create_request(object $pdo, int $stu_id, string $supervisor_id,){
    $request_status = "Pending";
    $query = "INSERT INTO request (request_status, stu_id, supervisor_id) VALUES (:request_status, :stu_id, :supervisor_id);";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":request_status", $request_status);
    $stmt->bindParam(":stu_id", $stu_id);
    $stmt->bindParam(":supervisor_id", $supervisor_id);
    $stmt->execute();
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $stu_id = $_POST["stu_id"];
    $supervisor_id = $_POST["supervisor_id"];
    try{
        $request_id = create_request($pdo, $stu_id, $supervisor_id);
        header("Location: ../find_Supervisor/index.php");
        $pdo=null;
        $stmt=null;
        die();
    }catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}else{
    header("Location: ../find_Supervisor/index.php");
    die();
}
