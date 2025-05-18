<?php
session_start();
class Database {
    private  $config;
    private string $dsn;
    private PDO $pdo;

    public function __construct() {
        $this->config = require 'DatabaseConfig.php';
        $this->dsn = "mysql:host=" . $this->config['host'] . ";dbname=" . $this->config['dbname'] . ";charset=" . $this->config['charset'];
    }

    public function connect(): ?PDO {
        try {
            $this->pdo = new PDO($this->dsn, $this->config['username'], $this->config['password']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //create tables for user and admin
            $this->pdo->exec($this->userTable());
            $this->pdo->exec($this->adminTable());

            //auto create admin
             $this->pdo->exec($this->createAdmin());

            // echo "Connected successfully to the database!";
            return $this->pdo; 
        } catch (PDOException $e) {
            
            $_SESSION['error_message'] = "Connection failed: " . $e->getMessage();
            return null;
        }
    }

     // CREATE: Insert a new record
    public function create(string $table, array $data): bool {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    // READ: Retrieve a single record by ID
    public function read(string $table, int $id) {
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // READ: Retrieve all records from a table
    public function readAll(string $table) {
        $sql = "SELECT * FROM $table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // UPDATE: Update an existing record by ID
    public function update(string $table, array $data, int $id): bool {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");

        $sql = "UPDATE $table SET $set WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        // Bind values
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // DELETE: Delete a record by ID
    public function delete(string $table, int $id): bool {
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function disconnect(){
        unset($this->pdo);
    }

    //auto create tables for user and admin
    private function userTable(){
        return "
        CREATE TABLE IF NOT EXISTS arielpw_user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(220) NOT NULL,
        lastname VARCHAR(220) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        contactNum VARCHAR(220) NOT NULL,
        address VARCHAR(220) NOT NULL,
        username VARCHAR(220) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";
    }

    private function adminTable(){  
        return "
            CREATE TABLE IF NOT EXISTS arielpw_admin (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(220) NOT NULL,
            email VARCHAR(220) NOT NULL UNIQUE,
            username VARCHAR(220) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        ";
    }

    private function createAdmin(){
        $hashedPassword = hash('SHA3-224', 'pass123');
                return "
            INSERT INTO arielpw_admin (name, email, username, password)
            SELECT 'pwadmin', 'admin@proweaver.com', 'admin', '$hashedPassword'
            FROM DUAL
            WHERE NOT EXISTS (
            SELECT 1
            FROM arielpw_admin
            WHERE email = 'admin@proweaver.com' OR username = 'admin'
            );";
    }
    
}

