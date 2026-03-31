<?php
require '../autoload.php';

use App\Services\AuthService;

$auth = new AuthService();

if ($_POST) {
    echo $auth->login($_POST['email'], $_POST['password']);
}
?>

<form method="POST">
<input name="email" placeholder="Email"><br>
<input name="password" type="password"><br>
<button>Login</button>
</form>