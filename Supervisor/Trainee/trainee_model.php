<?php

declare(strict_types=1);

// echo '<p>blank page? why?!!!</p>';
// function get_email(object $pdo, string $email){
//     $query = "SELECT email FROM supervisor WHERE email = :email;";
//     $stmt = $pdo->prepare($query);
//     $stmt->bindParam(":email", $email);

//     $stmt->execute();

//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     return $result; 
// }

function set_trainee(object $pdo, 
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
int $trainee_id)
{
    try {
        // Prepare the SQL query
        $query = "UPDATE students 
          LEFT JOIN trainee ON students.stu_id = trainee.stu_id
          SET 
          student_id = :student_id, 
          ImageData = :ImageData , 
          firstname = :firstname, 
          lastname = :lastname, 
          middlename = :middlename, 
          email = :email, 
          contact = :contact,
          address = :address,
          year_level = :year_level,
          course = :course,
          department = :department,
          gender = :gender
          WHERE trainee.trainee_id = :trainee_id;";


        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(":student_id", $student_id);
        $stmt->bindParam(":ImageData", $ImageData);
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":middlename", $middlename);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":contact", $contact);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":year_level", $year_level);
        $stmt->bindParam(":course", $course);
        $stmt->bindParam(":department", $department);
        $stmt->bindParam(":gender", $gender);
        $stmt->bindParam(":trainee_id", $trainee_id);

        // Execute the statement
        $stmt->execute();

        // Check for errors
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
?>
