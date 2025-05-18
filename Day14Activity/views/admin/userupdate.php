<?php
include_once __DIR__ . "/../../table_parser.php";
session_start();
if (!isset($_SESSION['admin']) && !isset($_SESSION['userUpdate'])) {
    die('Access denied. Admin login required.');
}
$errorMsg = $_SESSION['error_message'] ?? '';
$successMsg = $_SESSION['success_message'] ?? '';
unset($_SESSION['error_message'],$_SESSION['success_message']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/page_style.css">
    <title>Admin Dashboard</title>
  
</head>
<body class="container">
    <header>
        <span><?= htmlspecialchars($_SESSION['admin']['name']) ?></span>
        <a href="../../controllers/MainController.php?logout=true" class="logout">Logout</a>
    </header>

    <form action="../../controllers/MainController.php" class="user-form" method="post">
    <h2>Update user <?= $_SESSION['userUpdate']['username'] ?></h2>

    <?= $errorMsg ? '<div class="error-msg">' . htmlspecialchars($errorMsg) . '</div>' : '' ?>
    <?= $successMsg ? '<div class="success-msg">' . htmlspecialchars($successMsg) . '</div>' : '' ?>
    
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname" value="<?= $_SESSION['userUpdate']['firstname'] ?>" required="required">

    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" id="lastname" value="<?= $_SESSION['userUpdate']['lastname'] ?>" required="required">

    <label for="email">Email Address</label>
    <input type="text" name="email" id="email" value="<?= $_SESSION['userUpdate']['email'] ?>" required="required">

    <label for="contactNum">Contact Number</label>
    <input type="text" name="contactNum" id="contactNum" value="<?= $_SESSION['userUpdate']['contactNum'] ?>" required="required">

    <label for="address">Address</label>
    <input type="text" name="address" id="address" value="<?= $_SESSION['userUpdate']['address'] ?>" required="required">

    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<?= $_SESSION['userUpdate']['username'] ?>" required="required">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" name="userUpdate" value="Update">
    <a href="admindashboard.php">back</a>
</form>

</body>
</html>
