<?php
session_start();
$errorMessage = null;

if(isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    header('Location: translatorauth.php');
    exit();
}

if(isset($_POST['username']) && isset($_POST['password'])) {
    if($_POST['username'] == 'Plop' && $_POST['password'] == "1234") {
        if(isset($_POST['remember_me'])) {
            setcookie('username', 'Plop', time() + 3600*24*30);    
        }
        
        $_SESSION['username'] = $_POST['username'];
        header('Location: translatorauth.php');
        exit();
    } else {
        $errorMessage = "Bad credential";
    }
}

?>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login page</h1>
    <p style="color:red;">
    <?php if($errorMessage): ?>
        <?php echo $errorMessage; ?>
    <?php endif; ?>
    </p>
    <form action="login.php" method="post">
        Username: <input type="text" name="username" /><br />
        Password: <input type="password" name="password" /><br />
        <input type="checkbox" name="remember_me" /> Remember me<br />
        <input type="submit" value="Submit">
    </form>
</body>
</html>