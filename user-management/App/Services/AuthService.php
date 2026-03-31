<?php
namespace App\Services;

use App\Database\Database;
use PDO;

class AuthService {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function register($name, $email, $password, $role) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare(
            "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)"
        );

        return $stmt->execute([$name, $email, $hashedPassword, $role]);
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;

            return "Login successful!";
        }

        return "Invalid credentials!";
    }

    public function logout() {
        session_start();
        session_destroy();
    }
}