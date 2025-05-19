<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../services/ServiceImp.php";

$database = new Database();
$services = new ServiceImp($database);

$connection = $database->connect();

if ($connection == null) {
    header('Location: ../public/error');
    exit;
}


if (isset($_POST['Login'])) {
    $username = trim($_POST['username']) ?? '';
    $password = trim($_POST['password']) ?? '';

    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = 'Invalid username or passsword';
        header('Location: ../views/signin');
        exit;
    }

    foreach ($services->getUsers() as $user) {
        if ($user['username'] == $username && hash_equals($user['password'], hash('SHA3-224', $password))) {

            $_SESSION['userTodos'] = $services->userTodos($user['id']);

            $_SESSION['user'] = $user;

            header('Location: ../views/user/dashboard');

            exit;
        }
        ;
    }
    ;

    foreach ($services->getAdmins() as $admin) {
        if ($admin['username'] == $username && hash_equals($admin['password'], hash('SHA3-224', $password))) {

            $_SESSION['updatedUsers'] = $services->getUsers();

            $_SESSION['todoLists'] = $services->getTodos();

            $_SESSION['admin'] = $admin;

            header('Location: ../views/admin/dashboard');
            exit;
        }
    }

    $database->disconnect();

    $_SESSION['error_message'] = 'Invalid username or passsword';
    header('Location: ../views/signin');
    exit;
}

if (isset($_POST['Register'])) {
    $name = trim($_POST['name']) ?? '';
    $ctlocation = trim($_POST['ctlocation']) ?? '';
    $username = trim($_POST['username']) ?? '';
    $userpass = trim($_POST['password']) ?? '';
    $pattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=~`[\]{}|\\\\:;"\'<>,.?\/]).+$/';

    if (
        empty($name) ||
        empty($ctlocation) ||
        empty($username) ||
        empty($userpass)
    ) {
        $_SESSION['error_message'] = 'Please fill in all required fields.';
        header('Location: ../views/signup');
        exit;
    }

    if (!preg_match($pattern, $username)) {
        $_SESSION['error_message'] = 'Invalid username format.';
        header('Location: ../views/signup');
        exit;
    }

    if (strlen($username) < 5) {
        $_SESSION['error_message'] = 'Username too short.';
        header('Location: ../views/signup');
        exit;
    }

    if (strlen($userpass) < 6) {
        $_SESSION['error_message'] = 'Password too short.';
        header('Location: ../views/signup');
        exit;
    }

    try {

        $isCreated = $services->addUser($name, $ctlocation, $username, $userpass);

        if (!$isCreated) {
            $_SESSION['error_message'] = 'User not created.';
            header('Location: ../views/signup');
            exit;
        }

        // add success message
        $database->disconnect();
        $_SESSION['success_message'] = "User $username created.";
        header('Location: ../views/signup');
        exit;

    } catch (PDOException $e) {

        $duplicates = ['email', 'username'];

        foreach ($duplicates as $duplicate) {
            if (stripos($e->getMessage(), $duplicate) !== false) {
                $_SESSION['error_message'] = "$duplicate already exists.";
                header('Location: ../views/signup');
                exit;
            }
        }

    }
}

if (isset($_POST['userUpdate']) && isset($_SESSION['userUpdate'])) {
    $id = trim($_SESSION['userUpdate']['id']) ?? '';
    $name = trim($_POST['name']) ?? '';
    $ctlocation = trim($_POST['ctlocation']) ?? '';
    $username = trim($_POST['username']) ?? '';
    $userpass = trim($_POST['password']) ?? '';
    $pattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=~`[\]{}|\\\\:;"\'<>,.?\/]).+$/';

    if (
        empty($id) ||
        empty($name) ||
        empty($ctlocation) ||
        empty($username)
    ) {
        $_SESSION['error_message'] = 'Please fill in all required fields.';
        header('Location: ../views/admin/userupdate');
        exit;
    }

    if (!preg_match($pattern, $username)) {
        $_SESSION['error_message'] = 'Invalid username format.';
        header('Location: ../views/admin/userupdate');
        exit;
    }

    if (strlen($username) < 5) {
        $_SESSION['error_message'] = 'Username too short.';
        header('Location: ../views/admin/userupdate');
        exit;
    }

    $newpass = empty($userpass) ? $_SESSION['userUpdate']['password'] : hash('SHA3-224', $userpass);

    if (strlen($newpass) < 6) {
        $_SESSION['error_message'] = 'Password too short.';
        header('Location: ../views/admin/userupdate');
        exit;
    }

    try {

        $isUpdated = $services->updateUser($name, $ctlocation, $username, $newpass, $id);

        if (!$isUpdated) {
            $_SESSION['error_message'] = 'Failed to update user.';
            header('Location: ../views/admin/userupdate');
            exit;
        }

        $_SESSION['success_message'] = "User $username updated.";
        $_SESSION['updatedUsers'] = $services->getUsers();

        $database->disconnect();
        header('Location: ../views/admin/userupdate');
        exit;

    } catch (PDOException $e) {

        $duplicates = ['username'];

        foreach ($duplicates as $duplicate) {
            if (stripos($e->getMessage(), $duplicate) !== false) {
                $_SESSION['error_message'] = "$duplicate already exists.";
                header('Location: ../views/admin/userupdate');
                exit;
            }
        }

    }

}

///////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['userprofile']) && isset($_SESSION['user'])) {
    $id = trim($_SESSION['user']['id']) ?? '';
    $name = trim($_POST['name']) ?? '';
    $ctlocation = trim($_POST['ctlocation']) ?? '';
    $username = trim($_POST['username']) ?? '';
    $userpass = trim($_POST['password']) ?? '';
    $pattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=~`[\]{}|\\\\:;"\'<>,.?\/]).+$/';

    if (
        empty($id) ||
        empty($name) ||
        empty($ctlocation) ||
        empty($username)
    ) {
        $_SESSION['error_message'] = 'Please fill in all required fields.';
        header('Location: ../views/user/profile');
        exit;
    }

    if (!preg_match($pattern, $username)) {
        $_SESSION['error_message'] = 'Invalid username format.';
        header('Location: ../views/user/profile');
        exit;
    }

    if (strlen($username) < 5) {
        $_SESSION['error_message'] = 'Username too short.';
        header('Location: ../views/user/profile');
        exit;
    }

    $newpass = empty($userpass) ? $_SESSION['user']['password'] : hash('SHA3-224', $userpass);

    if (strlen($newpass) < 6) {
        $_SESSION['error_message'] = 'Password too short.';
        header('Location: ../views/user/profile');
        exit;
    }

    try {

        $isUpdated = $services->updateUser($name, $ctlocation, $username, $newpass, $id);

        if (!$isUpdated) {
            $_SESSION['error_message'] = 'Failed to update user.';
            header('Location: ../views/user/profile');
            exit;
        }

        $_SESSION['success_message'] = "User $username updated.";
        $_SESSION['user'] = $services->getUser($id);

        $database->disconnect();
         header('Location: ../views/user/profile');
         exit;

    } catch (PDOException $e) {

        $duplicates = ['username'];

        foreach ($duplicates as $duplicate) {
            if (stripos($e->getMessage(), $duplicate) !== false) {
                $_SESSION['error_message'] = "$duplicate already exists.";
                 header('Location: ../views/user/profile');
                 exit;
            }
        }

    }

}



if (isset($_POST['assignTask']) && isset($_SESSION['admin'])) {
    $title = trim($_POST['title']) ?? '';
    $description = trim($_POST['description']) ?? '';
    $dueDate = trim($_POST['date']) ?? '';
    $userId = trim($_POST['user']) ?? '';
    $adminId = $_SESSION['admin']['id'];

    $assigned = $services->addTodos($title, $description, $dueDate, $userId, $adminId);

    if (!$assigned) {
        $_SESSION['error_message'] = 'Task not assigned.';
        header('Location: ../views/admin/dashboard.php');
        exit;
    }
    
    $_SESSION['todoLists'] = $services->getTodos();
    $_SESSION['success_message'] = "Task assigned to user.";
    header('Location: ../views/admin/dashboard.php');
    exit;
}



if (isset($_GET['userUpdate'])) {
    $userId = $_GET['id'] ?? '';
    $_SESSION['userUpdate'] = $services->getUser($userId);
    $database->disconnect();
    header('Location: ../views/admin/userupdate.php');
    exit;
}

if (isset($_GET['userDelete'])) {
    $userId = $_GET['id'] ?? '';
    $services->deleteUser($userId);
    $_SESSION['updatedUsers'] = $services->getUsers();
    $database->disconnect();
    header('Location: ../views/admin/dashboard.php');
    exit;
}

if (isset($_GET['logout'])) {
    session_destroy();
    $database->disconnect();
    header('Location: ../views/signin');
    exit;
}