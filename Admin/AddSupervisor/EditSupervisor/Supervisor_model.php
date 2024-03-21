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

function set_supervisor(object $pdo, string $firstname, string $lastname, string $middlename, string $email,
    string $position, string $department, string $room, int $supervisor_info_id)
{
    try {
        // Prepare the SQL query
        $query = "UPDATE supervisors SET firstname = :firstname, lastname = :lastname , middlename = :middlename, 
                  email = :email, position = :position, department = :department, room = :room 
                  WHERE supervisor_info_id = :supervisor_info_id;";

        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(":firstname", $firstname);
        $stmt->bindParam(":lastname", $lastname);
        $stmt->bindParam(":middlename", $middlename);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":position", $position);
        $stmt->bindParam(":department", $department);
        $stmt->bindParam(":room", $room);
        $stmt->bindParam(":supervisor_info_id", $supervisor_info_id);

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
