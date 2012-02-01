<?php 

include('boot.php');
// check session
if(!isset($_SESSION['user'])){
    redirect('login.php');
}
// Ajout 
if(isset($_POST) && !empty($_POST)) {
    $postManager = new PdoPostManager();
    $postManager->addPost($_POST["title"], $_POST['body'], unserialize($_SESSION['user']));
    //redirect('index.php');
}
?>
<html>
<head>
    <title>Ajout d'un post</title>
</head>
<body>
    <h1>Ajout d'un post</h1>
    <form action="add.php" method="post">
        Title: <input type="text" name="title" /><br />
        Body: <br />
        <textarea name="body"></textarea>
        <input type="submit" value="creer" />
    </form>
</body>
</html>