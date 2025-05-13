<?php
include_once __DIR__ . "/header.php";
include_once __DIR__ . "../controller/ActivityController.php";
?>

<body>
    <div class="container">
        <section class="block">
            <h2>Is Prime Number?</h2>
            <form action="controller/ActivityController.php" method="post">
                <label for="numbr">Num</label>
                <input type="number" id="numbr" name="numbr">
                <input type="submit" name="ipn" value="submit">
            </form>
            <div class="result">
                <p><?= $_SESSION['ipnRes'] ?? '' ?></p>
            </div>
        </section>
    </div>
</body>

</html>