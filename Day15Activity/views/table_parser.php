<?php
function renderTbl(array $data, string $title = '', string $tableClass = 'data-table'): void
{
    if (empty($data)) {
        echo '<p class="table-message">No data available.</p>';
        return;
    }

    echo '<div class="table-wrapper">';

    if ($title) {
        echo '<h3 class="table-title">' . htmlspecialchars($title) . '</h3>';
    }

    echo '<table class="' . htmlspecialchars($tableClass) . '">';

    // Remove 'password' key (case-insensitive)
    $filterPassword = function ($arr) {
        return array_filter($arr, function ($key) {
            return strtolower($key) !== 'password';
        }, ARRAY_FILTER_USE_KEY);
    };

    $filterId = function ($arr) {
        return array_filter($arr, function ($key) {
            return strtolower($key) !== 'id';
        }, ARRAY_FILTER_USE_KEY);
    };

    // Multi-row
    if (isset($data[0]) && is_array($data[0])) {
        $filteredFirst = $filterPassword($data[0]);

        // Table headers
        echo '<thead><tr>';
        foreach (array_keys($filteredFirst) as $header) {
            echo '<th>' . htmlspecialchars(ucfirst($header)) . '</th>';
        }
        echo '<th>Actions</th>'; // Action column
        echo '</tr></thead><tbody>';

        foreach ($data as $row) {
            $row = $filterPassword($row);
            echo '<tr>';
            foreach ($row as $value) {
                echo '<td>' . htmlspecialchars($value) . '</td>';
            }

            // Assuming each row has a unique 'id' key
            $id = $row['id'] ?? null;
            echo '<td>';
            if ($id !== null) {
                echo '<a id="openModal" href="../../controllers/MainController.php?id=' . urlencode($id) . '&userUpdate=true" class="btn btn-update">Update</a> ';
                echo '<a href="../../controllers/MainController.php?id=' . urlencode($id) . '&userDelete=true" class="btn btn-delete" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</a>';
            } else {
                echo 'N/A';
            }
            echo '</td>';

            echo '</tr>';
        }

    } else {

        // Single associative array
        $data = $filterPassword($data);
        $data = $filterId($data);
        // echo '<thead><tr><th>Key</th><th>Value</th><th>Actions</th></tr></thead><tbody>';
        echo '<thead><tr><th>Field</th><th>Details</th></tr></thead><tbody>';
        echo '<tr>';
        foreach ($data as $key => $value) {
            echo '<td>' . htmlspecialchars($key) . '</td>';
            echo '<td>' . htmlspecialchars($value) . '</td>';
            // echo '<td><a href="admindashboard?id=' . urlencode($key) . '" class="btn btn-update">Change</a></td>';
            echo '</tr>';
        }
    }

    echo '</tbody></table></div>';
}

