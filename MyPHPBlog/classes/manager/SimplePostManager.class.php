<?php

class SimplePostManager implements PostManager
{
    public function __construct() 
    {
        if(!isset($_SESSION['posts'])) {
            $_SESSION['posts'] = array();
        }

        if(!isset($_SESSION['counter'])) {
            $_SESSION['counter'] = 0;
        };
    }

    public function addPost($title, $body, User $user)
    {
        $id = $_SESSION['counter'] += 1;
        $post = new Post($id, $title, $body, time(), $user);

        $_SESSION['posts'][$id] = serialize($post);

        return $id;
    }

    public function findAllPosts()
    {
        return $_SESSION['posts'];
    }
    
    public function findPostById($id)
    {
        if(isset($_SESSION['posts'][$id])) {
            return $_SESSION['posts'][$id];
        }

        throw new Exception('post ' . $id . ' does not exists');
    }
    
    function removePost($id)
    {
        unset($_SESSION['posts'][$id]);
    }
}