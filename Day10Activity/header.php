<?php include_once "auth.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>System Template User</title>

</head>

<header>
    <?= isset($_SESSION['user']) ? print_r($_SESSION['user']) : '' ?>
    <h1>Applicant Training System</h1>
    <p><strong>Day 10 - Weekly Activity</strong></p>
</header>