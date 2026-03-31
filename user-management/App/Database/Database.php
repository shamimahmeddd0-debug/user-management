<?php
namespace App\Database;

use PDO;

class Database {
    private $conn;

    public function connect() {
        $this->conn = new PDO("mysql:host=localhost;dbname=user_system", "root", "");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn;
    }
}