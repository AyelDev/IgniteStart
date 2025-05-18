<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../services/ServiceImp.php";

$database = new Database();
$services = new ServiceImp($database);

$connection = $database->connect();

if($connection == null)
{
         header('Location: ../public/error');
         exit;
}


if(isset($_POST['Login']))
{
    $username =  htmlspecialchars(trim($_POST['username'])) ?? '';
    $password = htmlspecialchars(trim($_POST['password'])) ?? '';

    if(empty($username) || empty($password))
    {
        $_SESSION['error_message'] = 'Invalid username or passsword';
        header('Location: ../views/signin');
        exit;
    }

    foreach($services->getUsers() as $user)
    {
        if($user['username'] == $username && hash_equals( $user['password'], hash( 'SHA3-224', $password)))
        {
            $_SESSION['user'] = $user; 
            header('Location: ../views/user/userdashboard');
            exit;
        }; 
    };

    foreach($services->getAdmins() as $admin)
    {
        if($admin['username'] == $username && hash_equals($admin['password'], hash( 'SHA3-224', $password)))
        {
            $_SESSION['updatedUsers'] = $services->getUsers();
            $_SESSION['admin'] = $admin; 
            header('Location: ../views/admin/admindashboard');
            exit;
        }
    }
    $database->disconnect();

    $_SESSION['error_message'] = 'Invalid username or passsword';
    header('Location: ../views/signin');
    exit;     
}

if(isset($_POST['Register']))
{
    $userFname = htmlspecialchars(trim($_POST['firstname'])) ?? '';
    $userLname =  htmlspecialchars(trim($_POST['lastname'])) ?? '';
    $userEmail = htmlspecialchars(trim($_POST['email'])) ?? '';
    $userNum = htmlspecialchars(trim($_POST['contactNum'])) ?? '';
    $userAddress = htmlspecialchars(trim($_POST['address'])) ?? '';
    $username = htmlspecialchars(trim($_POST['username'])) ?? '';
    $userpass = htmlspecialchars(trim($_POST['password'])) ?? '';
    $pattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=~`[\]{}|\\\\:;"\'<>,.?\/]).+$/';
        
    if(preg_match("/\D/",$userNum)){
        $_SESSION['error_message'] = 'Invalid input. Please enter a number.';
        header('Location: ../views/signup');
        exit;    
    }

    if(
        empty($userFname) ||
        empty($userLname) ||
        empty($userEmail) || 
        empty($userNum) ||
        empty($userAddress) ||
        empty($username) ||
        empty($userpass) 
         )
    {
        $_SESSION['error_message'] = 'Please fill in all required fields.';
        header('Location: ../views/signup');
        exit;    
    }

    if(!preg_match($pattern, $username)){
        $_SESSION['error_message'] =  'Invalid username format.';
        header('Location: ../views/signup');
        exit;    
    }

    if(strlen($username) < 5){
        $_SESSION['error_message'] = 'Username too short.';
        header('Location: ../views/signup');
        exit;
    }

    if(strlen($userpass) < 6)
    {
        $_SESSION['error_message'] = 'Password too short.';
        header('Location: ../views/signup');
        exit;
    }

    try
    {
        $isCreated = $services->addUser($userFname, $userLname, $userEmail, $userNum, $userAddress, $username, $userpass);
    
        if(!$isCreated)
        {
        $_SESSION['error_message'] = 'User not created.';
        header('Location: ../views/signup');
        exit;
        }
    
        // add success message
        $database->disconnect();
        $_SESSION['success_message'] = "User $username created.";
        header('Location: ../views/signup');
        exit;
      
    }
    catch(PDOException $e)
    {
       $duplicates = ['email', 'username'];

        foreach ($duplicates as $duplicate)
        {
            if (stripos($e->getMessage(), $duplicate) !== false)
            {
                $_SESSION['error_message'] = "$duplicate already exists.";
                header('Location: ../views/signup');
                exit;
            }
        }

    }  

}

if(isset($_POST['userUpdate']) && isset($_SESSION['userUpdate']))
{
    $id = htmlspecialchars(trim($_SESSION['userUpdate']['id'])) ?? '';
    $userFname = htmlspecialchars(trim($_POST['firstname'])) ?? '';
    $userLname =  htmlspecialchars(trim($_POST['lastname'])) ?? '';
    $userEmail = htmlspecialchars(trim($_POST['email'])) ?? '';
    $userNum = htmlspecialchars(trim($_POST['contactNum'])) ?? '';
    $userAddress = htmlspecialchars(trim($_POST['address'])) ?? '';
    $username = htmlspecialchars(trim($_POST['username'])) ?? '';
    $userpass = htmlspecialchars(trim(string: $_POST['password'])) ?? '';
    $pattern = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=~`[\]{}|\\\\:;"\'<>,.?\/]).+$/';

    if(preg_match("/\D/",$userNum)){
        $_SESSION['error_message'] = 'Invalid input. Please enter a number.';
        header('Location: ../views/admin/userupdate'); //wrong location
        exit;    
    }

    if(
        empty($userFname) ||
        empty($userLname) ||
        empty($userEmail) || 
        empty($userNum) ||
        empty($userAddress) ||
        empty($username)
         )
    {
        $_SESSION['error_message'] = 'Please fill in all required fields.';
        header('Location: ../views/admin/userupdate');
        exit;    
    }

    if(!preg_match($pattern, $username)){
        $_SESSION['error_message'] =  'Invalid username format.';
        header('Location: ../views/admin/userupdate');
        exit;    
    }

    if(strlen($username) < 5){
        $_SESSION['error_message'] = 'Username too short.';
        header('Location: ../views/admin/userupdate');
        exit;
    }

    if(strlen($userpass) < 6)
    {
        $_SESSION['error_message'] = 'Password too short.';
        header('Location: ../views/admin/userupdate');
        exit;
    }

    try
    {

        $newpass = empty($userpass) ? $_SESSION['userUpdate']['password'] : hash('SHA3-224', $userpass); 

        $isUpdated = $services->updateUser($userFname, $userLname, $userEmail, $userNum, $userAddress, $username, $newpass, $id);
    
        if(!$isUpdated)
        {
        $_SESSION['error_message'] = 'Failed to update user.';
        header('Location: ../views/admin/userupdate');
        exit;
        }
       
        $_SESSION['success_message'] = "User $username updated.";
        $_SESSION['updatedUsers'] = $services->getUsers();

        $database->disconnect();
        header('Location: ../views/admin/userupdate');
        exit;
      
    }
    catch(PDOException $e)
    {
       $duplicates = ['email', 'username'];

        foreach ($duplicates as $duplicate)
        {
            if (stripos($e->getMessage(), $duplicate) !== false)
            {
                $_SESSION['error_message'] = "$duplicate already exists.";
                header('Location: ../views/admin/userupdate');
                exit;
            }
        }

    }  

}



if(isset($_GET['userUpdate']))
{
    $userId = $_GET['id'] ?? '';
    $_SESSION['userUpdate'] = $services->getUser($userId);
    $database->disconnect();
    header('Location: ../views/admin/userupdate.php');
    exit;
}

if(isset($_GET['userDelete']))
{
    $userId = $_GET['id'] ?? '';
    $services->deleteUser($userId);
    $_SESSION['updatedUsers'] = $services->getUsers();
    $database->disconnect();
    header('Location: ../views/admin/admindashboard.php');
    exit;
}


if(isset($_GET['logout']))
{
    session_destroy();
    $database->disconnect();
    header('Location: ../views/signin');
     exit;
}