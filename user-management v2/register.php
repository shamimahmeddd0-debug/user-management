<?php
session_start();
require 'autoload.php';

use App\Config\Database;

$db = (new Database())->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $role = "User";

    $stmt = $db->prepare("INSERT INTO users(name,email,password,role) VALUES(?,?,?,?)");
    $stmt->execute([$name, $email, $hashed, $role]);

    echo "Registration successful!";
}
?>

<form method="POST">
    <input name="name" placeholder="Name" required><br>
    <input name="email" placeholder="Email" required><br>

    <!-- ✅ Password hidden -->
    <input name="password" type="password" placeholder="Password" required><br>

    <button type="submit">Register</button>
</form>
