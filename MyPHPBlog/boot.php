<?php
session_start();

// Abstract
include('classes/manager/AbstractPdoManager.class.php');

// Interfaces
include('classes/manager/UserManager.class.php');
include('classes/manager/PostManager.class.php');
include('classes/manager/CommentManager.class.php');

// User
include('classes/manager/PdoUserManager.class.php');
include('classes/manager/SimpleUserManager.class.php');

// Post
include('classes/manager/PdoPostManager.class.php');
include('classes/manager/SimplePostManager.class.php');

// Comment
include('classes/manager/PdoCommentManager.class.php');

// Domain
include('classes/domain/User.class.php');
include('classes/domain/Post.class.php');
include('classes/domain/Comment.class.php');

function redirect($page)
{
    header('Location: '.$page);
    exit;
}