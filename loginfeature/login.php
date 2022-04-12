<?php
require_once 'includes.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = (new Login())->login();
    die;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="loginform cf">
    <form name="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="utf-8">
        <ul>
            <li>
                <label for="usermail">Email</label>
                <input type="username" name="username" placeholder="yourname@email.com" required>
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="password" required></li>
            <li>
                <input type="submit" value="Login">
            </li>
        </ul>
    </form>
</section>
</body>
</html>