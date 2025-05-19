<?php
include_once __DIR__ . "/../../views/table_parser.php";
session_start();
if (!isset($_SESSION['user'])) {
    die('Access denied. User login required.');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/page_style.css">
    <title>User Dashboard</title>
</head>

<body class="container">
    <header>
        <span><?= htmlspecialchars($_SESSION['user']['name']); ?></span>
        <div class="nav-list">
            <a href="../../views/user/profile.php" class="profile">Profile</a>
            <a href="../../controllers/MainController.php?logout=true" class="logout">Logout</a>
        </div>
    </header>

    <h1>task</h1>
</body>

</html>