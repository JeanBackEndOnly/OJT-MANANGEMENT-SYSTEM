<?php

declare(strict_types=1);

function update_info(object $pdo,
int $student_id,
string $ImageData,
string $firstname,
string $lastname,
string $middlename,
string $email,
string $contact,
string $address,
string $year_level,
string $course,
string $department,
string $gender,
int $stu_id)
{
    try {
    $query = "UPDATE students 
    SET student_id = :student_id,
    ImageData = :ImageData,
    firstname = :firstname,
    lastname = :lastname,
    middlename = :middlename,
    contact = :contact,
    address = :address,
    year_level = :year_level,
    course = :course,
    department = :department,
    gender = :gender
    WHERE stu_id = :stu_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":student_id", $student_id);
    $stmt->bindParam(":ImageData", $ImageData);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":middlename", $middlename);
    $stmt->bindParam(":contact", $contact);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":year_level", $year_level);
    $stmt->bindParam(":course", $course);
    $stmt->bindParam(":department", $department);
    $stmt->bindParam(":gender", $gender);
    $stmt->bindParam(":stu_id", $stu_id);
    $stmt->execute();

    if ($stmt->errorCode() !== '00000') {
        // Print error information
        print_r($stmt->errorInfo());
        // Or handle error as needed
        // Example: throw new Exception("Database error: " . implode(", ", $stmt->errorInfo()));
        }
    } catch (PDOException $e) {
        // Handle PDO exceptions
        die("Query Failed: " . $e->getMessage());
    }
}
