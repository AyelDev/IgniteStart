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
<style>
     html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      font-size: 24px;
    }

   .navbar {
  background-color: #333;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  padding: 0 7px;
  position: sticky;
  top: 0;
  z-index: 1000;
}


    .navbar a {
      color: white;
      padding: 11px 30px;
      text-decoration: none;
      display: block;
    }

    .navbar a:hover {
      background-color: #111;
    }

    .navbar .menu {
      display: flex;
      flex-direction: row;
      flex-grow: 1;
      justify-content: center;
      align-items: center;
    }

    .navbar .icon {
      display: none;
      font-size: 20px;
      cursor: pointer;
      padding: 14px 16px;
    }

    .section {
      height: 600px;
      padding: 20px;
      color: white;
    }

    #section0 { background-color: #4CAF50; }
    #section1 { background-color: #2196F3; }
    #section2 { background-color: #f44336; }
    #section3 { background-color: #FF9800; }
    #section4 { background-color: #9C27B0; }

    /* Responsive style */
    @media screen and (max-width: 768px) {
      .navbar .menu {
        display: none;
        flex-direction: column;
        width: 100%;
      }

      .navbar.responsive .menu {
        display: flex;
      }

      .navbar .icon {
        display: block;
      }
    }
</style>
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
                <input type="submit" name="cme" value="submit">
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
                <input type="submit" name="cad" value="submit">
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
        <?= multiplyNum(15); ?>
  </div>

  <div class="section" id="section3">
      <h2>Is Prime Number?</h2>
            <form action="controller/ActivityController.php" method="post">
                <label for="numbr">Num</label>
                <input type="number" id="numbr" name="numbr">
                <input type="submit" name="ipn" value="submit">
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
