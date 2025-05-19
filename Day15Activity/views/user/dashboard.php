<?php
include_once __DIR__ . "/../../views/table_parser.php";
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
        <span><?= htmlspecialchars($_SESSION['user']['name']); ?></span>
        <div class="nav-list">
            <a href="../../views/user/profile.php" class="profile">Profile</a>
            <a href="../../controllers/MainController.php?logout=true" class="logout">Logout</a>
        </div>
    </header>

    <div class="table-wrapper">
    <h3>Task</h3>
    <table cellpadding='5' cellspacing='0'>
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <!-- <th>Description</th> -->
            <th>Status</th>
            <th>Due Date</th>
            <!-- <th>User ID</th> -->
            <!-- <th>Created by Admin</th> -->
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_SESSION['userTodos']) && !empty($_SESSION['userTodos'])){
                foreach ($_SESSION['userTodos'] as $task) {
                echo "<tr>";
                echo "<td>{$task['id']}</td>";
                echo "<td>{$task['title']}</td>";
                // echo "<td>" . nl2br(htmlspecialchars($task['description'])) . "</td>";
                echo "<td>{$task['status']}</td>";
                echo "<td>".date('F j, Y', strtotime($task['due_date']))."</td>";
                // echo "<td>{$task['user_id']}</td>";
                // echo "<td>{$task['created_by_admin']}</td>";
                echo "<td>".date('F j, Y', strtotime($task['created_at']))."</td>";
                echo '<td><a id="openModal" href="../../views/user/task.php?id=' . urlencode($task['id']) . '&taskUpdate=true" class="btn btn-update">View</a></td>';
                echo "</tr>";
                }
            }else{
                echo "<tr><td>No Task Available</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>



</body>

</html>