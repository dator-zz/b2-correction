<?php
include('boot.php');

if(!isset($_GET['id'])) {
    redirect('index.php');
}

$commentManager = new PdoCommentManager();
$commentManager->addComment($_POST['body'], $_GET['id'], unserialize($_SESSION['user']));

echo "<li>".$_POST['body']."</li>";
exit;