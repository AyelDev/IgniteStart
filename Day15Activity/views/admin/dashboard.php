<?php
include_once __DIR__ . "/../../views/table_parser.php";
session_start();
if (!isset($_SESSION['admin'])) {
    die('Access denied. Admin login required.');
}

$errorMsg = $_SESSION['error_message'] ?? '';
$successMsg = $_SESSION['success_message'] ?? '';
unset($_SESSION['error_message'], $_SESSION['success_message']);
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
        <div>
            <?php include_once "nav_buttons.php"; ?>
        </div>
    </header>

    <div class="table-wrapper">
        <?= renderTbl($_SESSION['updatedUsers'], "Users"); ?>
    </div>

    <div class="todo-container">

        <?= $errorMsg ? '<div class="error-msg">' . htmlspecialchars($errorMsg) . '</div>' : '' ?>
        <?= $successMsg ? '<div class="success-msg">' . htmlspecialchars($successMsg) . '</div>' : '' ?>

        <h2>Create todo</h2>

        <div class="todos">

            <div class="box">
                <form action="../../controllers/MainController.php" method="post">
                    <label for="title">title</label>
                    <input type="text" name="title" id="title">

                    <label for="description">description</label>
                    <textarea name="description" id="description" placeholder="Type your quote here..."></textarea>

                    <label for="date">Due Date</label>
                    <input type="date" name="date" id="date">

                    <label for="user">Assign User</label>
                    <select name="user" id="user" onfocus='this.size=4;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                        <?php foreach ($_SESSION['updatedUsers'] as $userId): ?>
                            <option value="<?php echo htmlspecialchars($userId['id']); ?>">
                                <?php echo htmlspecialchars($userId['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input type="submit" name="assignTask" value="Assign">
                </form>
            </div>

            <div class="box">
                <?= renderTbl($_SESSION['todoLists']) ?>
            </div>

        </div>
    </div>

</body>

<style>

    .box input, .box textarea, .box select{
    margin-bottom: 20px;
    height: 33%;
    min-height: 33px;
    }

    .box input, .box textarea{
    width: 50%;
    max-width: 400px;
    }

    .box select {
    width: 40%;
    max-width: 162px;
    }
</style>

</html>