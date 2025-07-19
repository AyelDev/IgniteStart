    <?= view('includes/head', ['title' => 'admin - dashboard']);  ?>
    <!-- <= view('includes/header'); ?> -->


    <style>
         html, body {
        height: 100%;
        margin: 0;
        font-family: sans-serif;
    }

    header {
        background: #ceddecff;
        color: white;
        padding: 0.5rem;
    }

    .wrapper {
        display: flex;
        min-height: 100vh;
    }

    aside {
        width: 250px;
        background: #f8f9fa;
        padding: 0.5rem;
        border-right: 1px solid #dee2e6;
    }

    main {
        flex-grow: 1;
        padding: 2rem;  
        background: #fff;
    }
    </style>
    <?= view('includes/sidebar'); ?>



    </body>

    </html>