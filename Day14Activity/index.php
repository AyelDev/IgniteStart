<?php
include_once __DIR__ . '../services/ServiceImp.php';
include_once __DIR__ . '../config/Database.php';

$database = new Database();

$connection = $database->connect();

switch($connection){
    case null:  
        header('Location: public/error');
        break;
    default:
        header("Location: views/signin");
        break;
}
