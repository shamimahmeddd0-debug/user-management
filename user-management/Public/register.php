<?php
require '../autoload.php';

use App\Services\AuthService;

$auth = new AuthService();

if ($_POST) {
    $auth->register($_POST['name'], $_POST['email'], $_POST['password'], "user");
    echo "Registered successfully!";
}
?>

<form method="POST">
<input name="name" placeholder="Name"><br>
<input name="email" placeholder="Email"><br>
<input name="password" type="password"><br>
<button>Register</button>
</form>