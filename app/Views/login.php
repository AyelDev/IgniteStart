<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css'); ?>">    
    <title>Login</title>
</head>

<body>

    <header>
        <h1>Ignite Start</h1>
    </header>
    <div class="container">

        <div class="login-form">
            <form action="login" method="post">

                <?php if(session()->has('error-msg')): ?>
                    <div class="alert alert-danger">
                        <?= session('error-msg') ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>

                    <button class="submit-btn" name="ignite-login">login</button>
                    <a href="register">Register</a>
                </div>
            </form>
        </div>
    </div>

    <script src="<?=base_url('js/main.js'); ?>"></script>
</body>

</html>