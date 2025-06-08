<?= view('templates/header',  ['title' => 'Register']); ?>

        <div>
                <?php if(session()->has('error-msg')): ?>
                    <div class="alert alert-danger">
                        <?= session('error-msg') ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors(); ?>
                    </div>
                <?php endif; ?> 
               
            
            <div class="register-form">
                    
                <form action="register" method="post">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name">    
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <button>Register</button>
                </form> 
                    <a href="/">Login</a>

            </div>



        </div>
        
<!-- ?= view('templates/footer'); ? -->