<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style>
    /*https://colorhunt.co/palette/c7db9cfff0bdfdab9ee50046*/
    @import url('https://fonts.googleapis.com/css2?family=Caesar+Dressing&display=swap');

    body {
        margin: 0;
        padding: 0;
        font-family: "Caesar Dressing", system-ui;
    }

    .container {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* login page */

    .login-form {
        padding: 31px;
        width: 20%;
        border: solid 1px #C7DB9C;
        box-shadow: 0px 12px 12px 1px #C7DB9C;
    }

    .form-group {
        background: white;
    }

    input {
        font-family: "Caesar Dressing", system-ui;
        display: block;
        width: 100%;
        line-height: 40px;
        margin-bottom: 20px;
    }

    .login-form label {
        line-height: 40px;
    }

    header {
        display: flex;
        justify-content: center;
    }

    .submit-btn {
        background-color: #C7DB9C;
        font-size: 23px;
        border-style: none;
        width: 44%;
        border-radius: 12px;
        margin: auto;
        text-transform: uppercase;
        font-family: "Caesar Dressing", system-ui;
        transition: background 0.3s ease, color 0.3s ease;
    }

    .submit-btn:hover {
        background: rgb(113, 133, 102);
        color: #FFF0BD;
    }

    .alert {
  padding: 5px;
  margin-top: 10px;
  border-radius: 5px;
  font-size: 14px;
  text-align: center;
}

.alert-danger {
  background-color: #f8d7da;
  color: #721c24;
}
</style>

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

</body>

</html>