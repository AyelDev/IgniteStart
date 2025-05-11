<?php
include_once "header.php";
?>

<body>
    <div class="container">
        <form action="auth.php" method="POST">
            <div class="frm-grp">

                <label for="Name">Name</label>
                <input type="text" name="name" placeholder="Enter Name" required="required">

                <label for="Name">BirthDate</label>
                <input type="date" name="date" required="required">

                <label for="Age">Age</label>
                <input type="text" name="age" placeholder="Enter Age" required="required">

                <label for="contactNo">Contact No.</label>
                <input type="number" name="contactNo" placeholder="Enter Contact No." required="required">

                <label for="email">Email Address</label>
                <input type="email" name="email" placeholder="Enter Email" required="required">

                <label for="password">password</label>
                <input type="password" name="password" required="required">

                <input type="submit" name="register" value="register">
        </form>

          <?= isset($_GET['error']) ? '<p class="error">'. $_GET['error'] . '</p>' : ''; ?>
          <?= isset($_GET['success']) ? '<p class="success">' . $_GET['success'] . '</p>' : ''; ?>
    <a href="index.php">Login</a>
    </div>
    </div>

  
</body>

</html>