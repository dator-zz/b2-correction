<?php

class PdoPostManager extends AbstractPdoManager implements PostManager
{
    public function addPost($title, $body, User $user)
    {
        $query = 'INSERT INTO post (title, body, user_id) VALUES (:title, :body, :userid)';

        $stm = $this->pdo->prepare($query);
        
        $stm->execute(array(
            ':title' => $title,
            ':body' => $body,
            ':userid'=>$user->getId()
        ));
    }

    public function findAllPosts()
    {
        $stm = $this->pdo->prepare('SELECT * FROM post');
        $stm->execute();
        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        $posts = array();

        foreach($results as $p) {
            $query = 'SELECT * FROM user WHERE id=:id';
            $stm = $this->pdo->prepare($query);
            
            $stm->execute(array(
                ':id' => $p['user_id']
            ));

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