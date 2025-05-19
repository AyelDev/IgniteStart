<?php
include_once __DIR__ . "/../../views/table_parser.php";
session_start();
if (!isset($_SESSION['user'])) {
    die('Access denied. User login required.');
}
$errorMsg = $_SESSION['error_message'] ?? '';
$successMsg = $_SESSION['success_message'] ?? '';
unset($_SESSION['error_message'], $_SESSION['success_message']);
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
        <span><?= htmlspecialchars($_SESSION['user']['name']) ?></span>
        <div>
            <a href="../../views/user/profile.php" class="profile">Profile</a>
            <a href="../../controllers/MainController.php?logout=true" class="logout">Logout</a>
        </div>
    </header>

    <form action="../../controllers/MainController.php" class="user-form" method="post">
        <h2>Update user <?= $_SESSION['user']['username'] ?></h2>

        <?= $errorMsg ? '<div class="error-msg">' . htmlspecialchars($errorMsg) . '</div>' : '' ?>
        <?= $successMsg ? '<div class="success-msg">' . htmlspecialchars($successMsg) . '</div>' : '' ?>

        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $_SESSION['user']['name'] ?>"
            required="required">

        <label for="ctlocation">City Location</label>
        <input type="text" name="ctlocation" id="ctlocation" value="<?= $_SESSION['user']['city_location'] ?>"
            required="required">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $_SESSION['user']['username'] ?>"
            required="required">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <input type="submit" name="userprofile" value="Update">
        <a href="dashboard.php">back</a>
    </form>

</body>

</html>