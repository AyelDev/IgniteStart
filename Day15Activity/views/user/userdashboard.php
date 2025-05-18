<?php
include_once __DIR__ . "/../../table_parser.php";
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
        <span><?= htmlspecialchars($_SESSION['user']['firstname'] . " " . $_SESSION['user']['lastname']) ?></span>
        <a href="../../controllers/MainController.php?logout=true" class="logout">Logout</a>
    </header>

      <div class="table-wrapper">
        <?= renderTbl($_SESSION['user'], "User") ?>
      </div>



</body>
</html>