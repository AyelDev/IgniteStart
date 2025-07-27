    <?= view('includes/head') ?>
    <?= view('includes/header'); ?>


    <?= view('includes/sidebar'); ?>

    <style>
            #myTable button{
                display: inline-flex;
                justify-items: center;
            }
            .icon {
                    width: 20px;
                    height: 20px;
                    display: inline-block;
                    background-size: contain;
                    background-repeat: no-repeat;
            }

            .delete-icon {
                    background-image: url('/images/icons/delete-icon.svg');
            }

            .lock-icon {
                    background-image: url('/images/icons/lock-icon.svg');
            }

            .unlock-icon {
                    background-image: url('/images/icons/unlock-icon.svg');
            }

            .view-open-icon {
                    background-image: url('/images/icons/view-open-icon.svg');
            }

            .view-close-icon {
                    background-image: url('/images/icons/view-close-icon.svg');
            }

            .assign-icon {
                    background-image: url('/images/icons/assign-icon.svg');
            }
    </style>

    <main>
            <div class="table-container">
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
            </div>

    </main>

    <?= view('includes/footer'); ?>