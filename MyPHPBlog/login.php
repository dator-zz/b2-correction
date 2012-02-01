<?php
include('boot.php');
$errorMessage = null; 
if(isset($_POST['email']) && isset($_POST['password'])) {
    $userManager = new SimpleUserManager();
    $user = $userManager->authenticate($_POST['email'], $_POST['password']);
    
    if($user) {
        $_SESSION['user'] = serialize($user);
        // redirect
        redirect('index.php');
    }else{
        $errorMessage = "Bad credential";
    }
}
?>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Connection</h1>
    <p style="color:red;">
    <?php if($errorMessage): ?>
        <?php echo $errorMessage; ?>
    <?php endif; ?>
    </p>
    <form action="login.php" method="post">
        Email: <input type="text" name="email" /><br />
        Password: <input type="text" name="password" /><br />
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>