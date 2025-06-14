<?= view('templates/head', ['title' => 'Register']);  ?>
<?= view('templates/header'); ?>

        <div class="register-container">
               
            
            <div class="register-form">
             
                <form action="register" method="post">
                  
                <div class="register-form-group">
                      <p for="">Register</p>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name">    
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <button class="submit-btn">Register</button>
                    <a href="/">Login</a>
                </div>
                    
                </form> 
                
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
            </div>

        </div>
        
<?= view('templates/footer'); ?>