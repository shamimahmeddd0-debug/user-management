<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome " . $_SESSION['user']['name'] . "<br>";
echo "Role: " . $_SESSION['user']['role'] . "<br>";

if ($_SESSION['user']['role'] === 'admin') {
    echo "Admin Panel Access";
}
    echo "<p>Login Successful ✔</p>";
?>

<br><a href="logout.php">Logout</a>
