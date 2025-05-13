<?php include_once "functions.php" ;
session_start();

if(isset($_POST["cme"]))
{
    $word1 = $_POST["word1"];
    $word2 = $_POST["word2"];
    $_SESSION['cmeRes'] = longestCommonEnding([$word1, $word2]);
    Header('Location: index.php');
    exit;
}

if(isset($_POST["cad"]))
{
    $input = $_POST["input"];
    $_SESSION['cadRes'] = constructDeconstruct($input);
    Header('Location: index.php');
    exit;
}

if(isset($_POST["ipn"]))
{
    $numbr = $_POST["numbr"];
    $_SESSION['ipnRes'] = isPrimeNum($numbr);
    Header('Location: index.php');
    exit;
}

if(isset($_POST["sod"]))
{
    $dgts = $_POST["dgts"];
    $_SESSION['sodRes'] = sumOfDigit($dgts);
    Header('Location: index.php');
    exit;
}

