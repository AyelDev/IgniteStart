<?php
include_once __DIR__ . "/../../table_parser.php";
session_start();
if (!isset($_SESSION['admin'])) {
    die('Access denied. Admin login required.');
}
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

    <div class="table-wrapper">
         <?= renderTbl($_SESSION['admin'], "Admin Detail");?>
        <?= renderTbl($_SESSION['updatedUsers'], "Users");?>
    </div>
</body>
</html>
