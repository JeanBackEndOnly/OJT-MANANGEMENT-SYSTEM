<?php
    require_once '../../includes/session.php';
    require_once '../AddSupervisor/Supervisor_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supervisor</title>
</head>
<body>
    <h1>Add Supervisor</h1>
    <form action="../AddSupervisor/Supervisor.php" method="post">
        <?php
            Admin_inputs();
        ?>
        <button>Add Supervisor</button>
    </form>

    <?php
            check_signup_errors();
    ?>
</body>
</html>