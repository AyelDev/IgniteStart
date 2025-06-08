<?= view('templates/header', ['title' => 'Login']); ?>

<div class="login-container">
    
    <div class="login-form">

        <form action="login" method="post">

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

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button class="submit-btn" name="ignite-login">login</button>
                <a href="user/register">Register</a>
            </div>

        </form>

    </div>

</div>

<!-- ?= view('templates/footer'); ? -->