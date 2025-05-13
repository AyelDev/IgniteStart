<?php
include_once __DIR__ . "/header.php";
include_once __DIR__ . "../controller/ActivityController.php";
?>

<?php
?>

<body>
    <div class="container">
        <section class="block">
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

        </section>
    </div>
</body>

</html>