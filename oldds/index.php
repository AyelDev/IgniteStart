<?php include_once("controller.php");?>
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
        <form action="controller.php" method="post">
            <label for="Word1 ">Word1</label>
            <input type="text" id="word1" name="word1" >
            <label for="word2">Word2</label>
            <input type="text" id="word2" name="word2">
            <input type="submit" name="cme" value="submit">
        </form>
        <p><?= $_SESSION['cmeRes'] ?? '' ?></p>
    </section>

     <section class="block">
        <h2>Construct & Deconstruct</h2>
        <form action="controller.php" method="post">
            <label for="input">input</label>
            <input type="text" id="input" name="input">
            <input type="submit" name="cad" value="submit">
        </form>
      
        <pre><?= print_r($_SESSION['cadRes']) ?? ''; ?></pre>
    </section>

      <section class="block">
        <h2>Multiply Number</h2>
       <?= multiplyNum(15); ?>
    </section>

    <section class="block">
        <h2>Is Prime Number?</h2>
        <form action="controller.php" method="post">
            <label for="numbr">Num</label>
            <input type="number" id="numbr" name="numbr">
            <input type="submit" name="ipn" value="submit">
        </form>

        <p><?= $_SESSION['ipnRes'] ?? '' ?></p>
    </section>
   
    <section class="block">
        <h2>Sum of Digits</h2>
        <form action="controller.php" method="post">
            <label for="dgts">Digits</label>
            <input type="number" id="dgts" name="dgts">
            <input type="submit" name="sod" value="submit">
        </form>
    
        <p><?= $_SESSION['sodRes'] ?? ''; ?></p>
    </section>

</div>

</body>
</html>
