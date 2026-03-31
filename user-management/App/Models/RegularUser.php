<?php
namespace App\Models;

use App\Core\AbstractUser;
use App\Core\AuthInterface;

class RegularUser extends AbstractUser implements AuthInterface {

    public function userRole() {
        return "Regular User";
    }

    public function login($email, $password) {
        if ($email === $this->email && password_verify($password, $this->password)) {

            session_start();
            $_SESSION['user'] = [
                'name' => $this->name,
                'email' => $this->email,
                'role' => 'user'
            ];

            return "User logged in successfully.";
        }
        return "Invalid credentials.";
    }

    public function logout() {
        session_start();
        session_destroy();

        return "User logged out.";
    }
}