<?= view('includes/login_register/head', ['title' => 'Login']);  ?>
<?= view('includes/login_register/header'); ?>

<div class="login-container">

    <div class="login-form">

        <form method="post">
            <div class="login-form-group">
                <p for="">Login</p>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button class="submit-btn" name="ignite-login">login</button>
                <a href="user/register">Register</a>

                <?php if (session()->has('error-msg')): ?>
                    <div class="alert alert-danger">
                        <?= session('error-msg') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('success-msg')): ?>
                    <div class="alert alert-success">
                        <?= session('success-msg') ?>
                    </div>
                <?php endif; ?>
            </div>
        </form>

    </div>

</div>

<?= view('includes/login_register/footer'); ?>