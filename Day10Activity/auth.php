<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST['register'] === 'register') {     
    $name = htmlspecialchars($_REQUEST['name']);
    $date = htmlspecialchars($_REQUEST['date']);
    $age = htmlspecialchars($_REQUEST['age']);
    $contactNo = htmlspecialchars($_REQUEST['contactNo']);
    $email = htmlspecialchars($_REQUEST['email']);
    $password = htmlspecialchars($_REQUEST['password']);
    
    // if (empty(trim($email)) || empty(trim($password)) || empty(trim($))){
    //     header('Location: register.php?error=' . urlencode('invalid try again'));
    //     exit;
    // }

    if(strlen(trim($password)) < 5){
        header('Location: register.php?error='. urlencode('password too short'));
        exit;
    }

    $user = array(
            "name" => $name,
            "date" => $date,
            "age" => $age,
            "contactNo" => $contactNo,
            "email" => $email,
            "password" => $password
    );

    unset($_SESSION['user']);
    if(!isset($_SESSION['user'])){
        $_SESSION["user"] = $user;
        header('Location: register.php?success='. urlencode('User has been registered'));
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST['login'] === 'login') {

    $userCred = $_SESSION['user'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if($userCred['email'] !== $email || $userCred['password'] !== $password){
        header('Location: index.php?error=' . urlencode('login error'));
        exit;
    }

    $_SESSION['login'] = true;
    header('Location: dashboard.php');
    exit;
}

if(isset($_GET['logout'])){
    unset($_SESSION['login']);
    header('Location: index.php');
    exit;
}


