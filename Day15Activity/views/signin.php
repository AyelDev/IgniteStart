<?php
session_start();
$errorMessage = $_SESSION['error_message'] ?? '';
unset($_SESSION['error_message']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Training Guide - Signin</title>
    <link rel="stylesheet" href="../public/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <main>
        <div class="container">

            <!-- default admin account -->
            <?= print_r(["username" => "admin", "password" => "pass123"]); ?>

            <header>
                <h1>Applicant Training Guide<span>SYSTEM</span></h1>
            </header>
            <div class="form-container">

                <?= $errorMessage ? '<div class="error-msg">' . htmlspecialchars($errorMessage) . '</div>' : '' ?>

                <form action="../controllers/MainController" method="post">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter here.." required="required">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter here.." required="required">
                    <input class=".button-signin" type="submit" name="Login" value="Login">
                </form>
                <p>Click here to <a href="signup">Sign-Up</a></p>
            </div>
        </div>
    </main>

    <script src="../public/main.js"></script>
</body>

</html>