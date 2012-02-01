<?php
session_start();

include('classes/manager/UserManager.class.php');
include('classes/manager/PostManager.class.php');
include('classes/manager/SimpleUserManager.class.php');
include('classes/manager/SimplePostManager.class.php');
include('classes/domain/User.class.php');
include('classes/domain/Post.class.php');

function redirect($page)
{
    header('Location: '.$page);
    exit;
}