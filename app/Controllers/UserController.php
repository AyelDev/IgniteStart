<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function getstudents(): void
    {
        
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM user");
        $result = $query->getResult();

        $db->close();
        // Set the correct header for JSON output
        header('Content-Type: application/json');

        // Output the result as JSON
        echo json_encode($result);
            // return view('index_file');
    }
}