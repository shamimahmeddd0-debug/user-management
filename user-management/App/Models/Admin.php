<?php
namespace App\Models;

use App\Core\AbstractUser;
use App\Core\AuthInterface;
use App\Core\LoggerTrait;

class Admin extends AbstractUser implements AuthInterface {
    use LoggerTrait;

    public function userRole() {
        return "Admin";
    }

    public function login($email, $password) {
        if ($email === $this->email && password_verify($password, $this->password)) {

            session_start();
            $_SESSION['user'] = [
                'name' => $this->name,
                'email' => $this->email,
                'role' => 'admin'
            ];

            $this->logActivity("Admin {$this->name} logged in.");

            return "Admin logged in successfully.";
        }
        return "Invalid credentials.";
    }

    public function logout() {
        session_start();
        session_destroy();

        $this->logActivity("Admin {$this->name} logged out.");

        return "Admin logged out.";
    }
}