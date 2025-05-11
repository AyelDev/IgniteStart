<?php
include_once "header.php";
?>

<body>
    <div class="container">

        <div class="frm-grp">
            <form action="auth.php" method="post">
                <label for="">email address</label>
                <input type="email" name="email" required="required">
                <label for="">password</label>
                <input type="password" name="password" required="required">
                <input type="submit" name="login" value="login">
            </form>

            <?= isset($_GET['error']) ? '<p class="error">'.$_GET['error'] . '<p>' : ''; ?>
            <a href="register.php">Register</a>
        </div>

    </div>


</body>

</html>