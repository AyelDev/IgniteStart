<?php include "functions.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP Function Sections</title>
</head>
<body>

<div class="container">

    <section class="block">
        <h2>Longest Common Ending</h2>
        <label for="">Word</label>
        <input type="text">
        <label for="">Word</label>
        <input type="text">
        <p><?= longestCommonEnding(["multiplication", "ration"]); ?></p>
    </section>

    <section class="block">
        <h2>Construct & Deconstruct</h2>
        <label for="">Word</label>
        <input type="text">
        <pre><?php print_r(constructDeconstruct("edabit")); ?></pre>
    </section>

    <section class="block">
        <h2>Multiply Number</h2>
       <?= multiplyNum(15); ?>
    </section>

    <section class="block">
        <h2>Is Prime Number?</h2>
         <label for="">Word</label>
        <input type="text">
        <p><?= isPrimeNum(5); ?></p>
    </section>

    <section class="block">
        <h2>Sum of Digits</h2>
        <p><?= sumOfDigit(12345); ?></p>
    </section>

</div>

</body>
</html>
