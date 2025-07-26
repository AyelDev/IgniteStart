    <?= view('includes/head') ?>
    <?= view('includes/header'); ?>


    <?= view('includes/sidebar'); ?>

    <main>
            <table id="myTable" class="compact row-border stripe hover">
                    <thead>
                            <tr>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>status</th>
                                    <th>created at</th>
                                    <th>action</th>
                            </tr>
                    </thead>
            </table>
    </main>

    <?= view('includes/footer'); ?>