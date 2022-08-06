<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="css/index.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now Admin dashboard page.</p>
        <label for="">Add person:</label>
        <a href="registration.php">click here</a>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>