<?php
include_once __DIR__ . "/header.php";
include_once __DIR__ . "../controller/ActivityController.php";
?>

<body>
    <div class="container">
        <section class="block">
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

        </section>
    </div>
</body>

</html>