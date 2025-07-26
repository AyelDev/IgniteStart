    <!-- Header -->
    <header>
        <h3>Ignite Start
        </h3>
        <div>
            <?php
            $userRole = (esc($session->get('user_login')['user_type']) > 1) ? 'user' : 'admin';
            ?>
            <span id="userName"><?= esc($session->get('user_login')['name']); ?></span>
            <span id="">Role: <?= $userRole ?></span>
            <button id="logout">Logout</button>
        </div>
    </header>
    <!-- End header  -->