<?php

interface PostManager
{
    function addPost($title, $body, User $user);
    function findAllPosts();
    function findPostById($id);
    function removePost($id);
}