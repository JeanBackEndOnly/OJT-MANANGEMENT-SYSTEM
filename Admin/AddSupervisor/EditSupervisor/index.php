<?php
require_once "../../../includes/config.php";
require_once "../../../includes/session.php";
require_once "../EditSupervisor/Supervisor_view.php";

// Check if supervisor_info_id is provided in the URL
if(isset($_GET['supervisor_info_id'])) {
    $supervisor_info_id = $_GET['supervisor_info_id'];

    // Retrieve supervisor information from the database based on the ID
    $sql = "SELECT * FROM supervisors WHERE supervisor_info_id = :supervisor_info_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['supervisor_info_id' => $supervisor_info_id]);
    $supervisor = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$supervisor) {
        // Handle case where supervisor is not found
        echo "Supervisor not found";
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Supervisor</title>
    </head>
    <body>
        <form action="Supervisor.php?supervisor_info_id=<?php echo $supervisor_info_id; ?>" method="post">
            <input type="hidden" name="supervisor_info_id" value="<?php echo $supervisor_info_id; ?>">
            <input type="text" name="firstname" value="<?php echo $supervisor['firstname']; ?>" placeholder="First Name"><br>
            <input type="text" name="lastname" value="<?php echo $supervisor['lastname']; ?>" placeholder="Last Name"><br>
            <input type="text" name="middlename" value="<?php echo $supervisor['middlename']; ?>" placeholder="Middle Name"><br>
            <input type="email" name="email" value="<?php echo $supervisor['email']; ?>" placeholder="Email"><br>
            <input type="text" name="position" value="<?php echo $supervisor['position']; ?>" placeholder="Position"><br>
            <input type="text" name="department" value="<?php echo $supervisor['department']; ?>" placeholder="Department"><br>
            <input type="text" name="room" value="<?php echo $supervisor['room']; ?>" placeholder="Room"><br>
            <button type="submit">Update</button>
        </form>
    </body>
    </html>
    <?php
} else {
    check_signup_errors();
    die();
}
?>
