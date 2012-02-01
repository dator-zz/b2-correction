<?php
include('boot.php');
$postManager = new PdoPostManager();
$post = $postManager->findPostById($_GET['id']);
?>

<html>
<head>
    <title>Show post</title>
</head>
<body>
    <h2><?php echo $post->getTitle();?></h2>
    <span>par <?php echo $post->getUser()->getFirstName();?></span>
    <p><?php echo $post->getBody(); ?></p>

    <h4>Comments</h4>
    <ul>
        <?php foreach($post->getComments() as $comment): ?>
        <li><?php echo $comment->getBody();?></li>
        <?php endforeach;?>
    </ul>
    <div>
        <form action="comment.php?id=<?php echo $post->getId();?>" method="post">
            <textarea name="body"></textarea>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>