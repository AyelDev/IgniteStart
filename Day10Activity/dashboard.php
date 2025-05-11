<?php
include_once "header.php";

if (!isset($_SESSION['login'])) {
    die("<div class='container'>403 Forbidden – You do not have permission to view this page</div>");
}

?>

<body>
    <div class="container">
        <p>User Dashboard</p>

        <div class="info">
            <h2>User Profile Information</h2>

            <div class="info-row">
                <p>Basic Info</p>
            </div>

            <div class="info-row">
                <label>Full Name:</label>
                <div><?= htmlspecialchars($_SESSION['user']['name']); ?></div>
            </div>

            <div class="info-row">
                <label>Birth Date:</label>
                <div><?= date("F j, Y", strtotime($_SESSION['user']['date'])); ?></div>
            </div>

            <div class="info-row">
                <label>Age:</label>
                <div><?= htmlspecialchars($_SESSION['user']['age']); ?></div>
            </div>

            <div class="info-row">
                <label>Contact No:</label>
                <div><?= htmlspecialchars($_SESSION['user']['contactNo']); ?></div>
            </div>

            <div class="info-row">
                <label>Email Address:</label>
                <div><?= htmlspecialchars($_SESSION['user']['email']); ?></div>
            </div>
        </div>
           <a href="auth.php?logout=true">LogOut</a>
    </div>

</body>

</html>