<?php $user = session()->get('user_login'); ?>

<div class="wrapper" style="display:flex">

    <aside>
        <nav>
            <ul>
                <?php if (isset($user) && $user['user_type'] == 1): ?>
                    <li><a href="#">Users</a></li>
                <?php endif; ?>

                <li><a href="/">Dashboard</a></li>
                  <li><a href="/logout">Logout</a></li>
            </ul>
        </nav>
    </aside>
</div>