<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Management System</title>
</head>
<body>

<h1>Welcome to User Management System</h1>

<?php if (isset($_SESSION['user'])): ?>

    <p>Hello, <?php echo $_SESSION['user']['name']; ?> 👋</p>
    
    <a href="dashboard.php">Go to Dashboard</a><br><br>
    <a href="logout.php">Logout</a>

<?php else: ?>

    <a href="login.php">Login</a><br><br>
    <a href="register.php">Register</a>

<?php endif; ?>

</body>
</html>