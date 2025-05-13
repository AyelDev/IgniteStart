<?php include_once __DIR__ . "/../class/functions.php";
session_start();

if (isset($_POST["cme"])) {
    $word1 = $_POST["word1"];
    $word2 = $_POST["word2"];
    $_SESSION['cmeRes'] = longestCommonEnding([$word1, $word2]);
    Header('Location: ../sampleindex.php#section0');
    exit;
}

if (isset($_POST["cad"])) {
    $input = $_POST["input"];
    $_SESSION['cadRes'] = constructDeconstruct($input);
    Header('Location: ../sampleindex.php#section1');
    exit;
}

if (isset($_POST["ipn"])) {
    $numbr = $_POST["numbr"];
    $_SESSION['ipnRes'] = isPrimeNum($numbr);
    Header('Location: ../sampleindex.php#section3');
    exit;
}

if (isset($_POST["sod"])) {
    $dgts = $_POST["dgts"];
    $_SESSION['sodRes'] = sumOfDigit($dgts);
    Header('Location: ../sampleindex.php#section4');
    exit;
}

