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

            // user
            $query = 'SELECT * FROM user WHERE id=:id';
            $stm = $this->pdo->prepare($query);
            
            $stm->execute(array(
                ':id' => $p['user_id']
            ));

            $r = $stm->fetch(PDO::FETCH_ASSOC);
            $user = new User($r['id'], $r['firstName'], $r['lastName'], $r['email'], $r['password']);
            //user
            $post = new Post($p['id'], $p['title'], $p['body'], $p['publicationDate'], $user, array());
            $posts[$p['id']] = $post;
        }
        return $posts;
    }

    public function findPostById($id)
    {
        // post
        $query = 'SELECT * FROM post WHERE id = :id';
        $stm = $this->pdo->prepare($query);
        
        $stm->execute(array(
            ':id' => $id
        ));

        $p = $stm->fetch(PDO::FETCH_ASSOC);
        if(!$p) {
            throw new Exception('post not found');
        }
        //user

        $query = 'SELECT * FROM user WHERE id=:id';
        $stm = $this->pdo->prepare($query);
        
        $stm->execute(array(
            ':id' => $p['user_id']
        ));

        $r = $stm->fetch(PDO::FETCH_ASSOC);
        $user = new User($r['id'], $r['firstName'], $r['lastName'], $r['email'], $r['password']);
    
        //comments

        $query = 'SELECT * FROM comment WHERE post_id = :postid';
        $stm = $this->pdo->prepare($query);
        
        $stm->execute(array(
            ':postid' => $p['id']
        ));

        $comments = $stm->fetchAll(PDO::FETCH_ASSOC);
        $Ac = array();

        foreach ($comments as $c) {
            $Ac[] = new Comment($c['id'], $c['user_id'], $c['body'], $c['publicationDate']);
        }
        return new Post($p['id'], $p['title'], $p['body'], $p['publicationDate'], $user, $Ac);
    }

    public function removePost($id)
    {
        
    }
}