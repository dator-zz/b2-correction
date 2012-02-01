<?php 
include('boot.php');

$post = new PdoPostManager();
$posts = $post->findAllPosts();
?>
<html>
<head>
    <title>Mon blog</title>
</head>
<body>
    
    <p>Admin: <a href="add.php">Ajouter un article</a></p>
    <h1>Mon super blog</h1>
    <ul>
    <?php foreach($posts as $post): ?>
        <li>
            <span><?php echo $post->getTitle()?>, par <?php echo $post->getUser()->getFirstName();?></span>
            <p><?php echo $post->getBody();?></p>
        </li>
    <?php endforeach;?>
    </ul>
</body>
</html>