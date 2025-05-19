<?php
session_start();
$errorMsg = $_SESSION['error_message'] ?? '';
$successMsg = $_SESSION['success_message'] ?? '';
unset($_SESSION['error_message'], $_SESSION['success_message']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Training Guide - Signup</title>
    <link rel="stylesheet" href="../public/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <main>
        <div class="container">
            <header>
                <h1>Applicant Training Guide<span>SYSTEM</span></h1>
            </header>
            <div class="signin-form-container">

                <?= $errorMsg ? '<div class="error-msg">' . htmlspecialchars($errorMsg) . '</div>' : '' ?>
                <?= $successMsg ? '<div class="success-msg">' . htmlspecialchars($successMsg) . '</div>' : '' ?>

                <form action="../controllers/MainController.php" method="post">
                    <h2>Basic Information</h2>
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter here.." required="required">

                    <label for="lastname">City Location</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Enter here.." required="required">

                    <h2>Login Credential</h2>
                    <label for="sgnup-username">Username <span id="userVal"></span></label>
                    <input type="text" id="sgnup-username" name="username" placeholder="Enter here.."
                        required="required">
                    <label for="sgnup-password">Password <span id="passVal"></span></label>
                    <input type="password" id="sgnup-password" name="password" placeholder="Enter here.."
                        required="required">

                    <input class=".button-signin" type="submit" name="Register" value="Sign Up">
                </form>
                <p>Click here to <a href="signin">Sign-In</a></p>
            </div>
        </div>
    </main>
    <script src="../public/main.js"></script>
</body>

</html>