<?php
session_start();

// Grab the error message and then clear it from the session
$errorMessage = $_SESSION['error_message'] ?? 'An unexpected error occurred.';
unset($_SESSION['error_message']); // Prevent reuse
?>
<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #dc3545;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            background-color: #fff3f3;
            color: #a94442;
            padding: 15px 25px;
            border: 1px solid #ebccd1;
            border-radius: 5px;
            display: inline-block;
            max-width: 600px;
            margin-top: 10px;
        }

        a{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Something went wrong</h1>
    <p><?= htmlspecialchars($errorMessage) ?></p>
    <a href="/Day14Activity/">Go Back</a>
</body>
</html>
