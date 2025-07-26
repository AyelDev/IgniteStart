    <?= view('includes/head');  ?>
    <?= view('includes/header'); ?>


    <?= view('includes/sidebar'); ?>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        main {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            margin-top: 30px;
            flex: 1 1 200px;
            padding: 20px;
            border-radius: 8px;
            background-color: #f8f9fa;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h2 {
            margin: 0;
            font-size: 2.5rem;
            color: #007bff;
        }

        .card p {
            margin-top: 10px;
            font-size: 1.2rem;
            color: #333;
        }
    </style>

    <main>
        <div class="card">
            <h2 id="activeUsers">--</h2>
            <p>Active Users</p>
        </div>
        <div class="card">
            <h2 id="inactiveUsers">--</h2>
            <p>Inactive Users</p>
        </div>
        <div class="card">
            <h2 id="tasksCount">--</h2>
            <p>Tasks</p>
        </div>

    </main>

    <?= view('includes/footer'); ?>