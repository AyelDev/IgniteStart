<?= view('includes/login_register/head', ['title' => 'Register']);  ?>
<?= view('includes/login_register/header'); ?>

<div class="register-container">


    <div class="register-form">

        <form action="#" method="post">
            
            <div class="register-form-group">
                <p for="">Register</p>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
                <label for="email">Email</label>
                <input type="text" id="email" name="email">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <button class="submit-btn" id="register">Register</button>
                <a href="/">Login</a>
            </div>
           
        </form>

        <?php if (session()->has('error-msg')): ?>
            <div class="alert alert-danger">
                <?= session('error-msg') ?>
            </div>
        <?php endif; ?>

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<?= view('includes/login_register/footer'); ?>