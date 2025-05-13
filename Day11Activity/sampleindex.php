<?php
include_once __DIR__ . "../controller/ActivityController.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Simplified Responsive Navbar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="navbar" id="navbar">
    <span class="icon" onclick="toggleMenu()">☰</span>
    <div class="menu">
      <a href="#section0">Part 1</a>
      <a href="#section1">Part 2</a>
      <a href="#section2">Part 3</a>
      <a href="#section3">Part 4</a>
      <a href="#section4">Part 5</a>
    </div>
  </div>
  

  <div class="section" id="section0">
        <h2>Longest Common Ending</h2>
            <form action="controller/ActivityController.php" method="post">
                <label for="Word1 ">Word1</label>
                <input type="text" id="word1" name="word1">
                <label for="word2">Word2</label>
                <input type="text" id="word2" name="word2">
                <input class="button" type="submit" name="cme" value="submit">
            </form>
            <div class="result">
                <p><?= $_SESSION['cmeRes'] ?? '' ?></p>
            </div>
  </div>

  <div class="section" id="section1">
     <h2>Construct & Deconstruct</h2>
            <form action="controller/ActivityController.php" method="post">
                <label for="input">input</label>
                <input type="text" id="input" name="input">
                <input class="button" type="submit" name="cad" value="submit">
            </form>
            <div class="result">
                <?php
                echo "[";
                if (isset($_SESSION['cadRes'])) {
                    foreach ($_SESSION['cadRes'][0] as $key => $value) {
                        echo "<pre>$value </pre>";
                    }
                }
                echo "]";
                ?>
            </div>
  </div>

  <div class="section" id="section2">
      <h2>Multiply Number</h2>
      <div class="cell_con">
<?= multiplyNum(15); ?>
      </div>
        
  </div>

  <div class="section" id="section3">
      <h2>Is Prime Number?</h2>
            <form action="controller/ActivityController.php" method="post">
                <label for="numbr">Num</label>
                <input type="number" id="numbr" name="numbr">
                <input class="button" type="submit" name="ipn" value="submit">
            </form>
            <div class="result">
                <p><?= $_SESSION['ipnRes'] ?? '' ?></p>
            </div>
  </div>

  <div class="section" id="section4">
           <h2>Sum of Digits</h2>
            <form action="controller/ActivityController.php" method="post">
                <label for="dgts">Digits</label>
                <input type="number" id="dgts" name="dgts">
                <input type="submit" name="sod" value="submit">
            </form>

            <div class="result">
                <p><?= $_SESSION['sodRes'] ?? ''; ?></p>
            </div>

  </div>

  <script>
    function toggleMenu() {
      var nav = document.getElementById("navbar");
      nav.classList.toggle("responsive");
    }
  </script>

</body>
</html>
