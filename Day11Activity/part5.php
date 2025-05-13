<?php
include_once __DIR__ . "/header.php";
include_once __DIR__ . "../controller/ActivityController.php";
?>

<body>
    <div class="container">
        <section class="block">
            <h2>Sum of Digits</h2>
            <form action="controller/ActivityController.php" method="post">
                <label for="dgts">Digits</label>
                <input type="number" id="dgts" name="dgts">
                <input type="submit" name="sod" value="submit">
            </form>

            <div class="result">
                <p><?= $_SESSION['sodRes'] ?? ''; ?></p>
            </div>

        </section>
    </div>
</body>

</html>