<?php

class PdoPostManager implements PostManager
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=myphpblog', 'root', 'root');        
    }

    public function addPost($title, $body, User $user)
    {
        $query = 'INSERT INTO post (title, body, user_id) VALUES ("%s", "%s", "%s")';

        $this->pdo->exec(sprintf($query, $title, $body, $user->getId()));
    }

    public function findAllPosts()
    {
        $stm = $this->pdo->query('SELECT * FROM post');
        $posts = array();
        $results = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $p) {
            $stm = $this->pdo->query(sprintf('SELECT * FROM user WHERE id=%s', $p['user_id']));
            
            $r = $stm->fetch(PDO::FETCH_ASSOC);
            $user = new User($r['id'], $r['firstName'], $r['lastName'], $r['email'], $r['password']);
            $post = new Post($p['id'], $p['title'], $p['body'], $p['publicationDate'], $user);
            $posts[$p['id']] = $post;
        }
        return $posts;
    }

    public function findPostById($id)
    {
        
    }

    public function removePost($id)
    {
        
    }
}