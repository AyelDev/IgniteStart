<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
        <!-- NOTE: E INLINE LANG SA ANG UI IF EVER LOL -->
        <div>

                <?php if(session()->has('error-msg')): ?>
                    <div class="alert alert-danger">
                        <?= session('error-msg') ?>
                    </div>
                <?php endif; ?>

                <?php if(session()->has('success-msg')): ?>
                    <div class="alert alert-danger">
                        <?= session('success-msg') ?>
                    </div>
                <?php endif; ?>

            <form action="register" method="post">
                <label for="name">Name</label>
                <input type="text" id="name" name="name">    
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <button>Register</button>
            </form>
        </div>
</body>
</html> 