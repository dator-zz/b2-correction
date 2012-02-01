<?php

class PdoCommentManager extends AbstractPdoManager implements CommentManager
{
    public function addComment($body, $post, $user)
    {
        
        $query = 'INSERT INTO comment (body, post_id, user_id) VALUES (:body, :postid, :userid)';

        $stm = $this->pdo->prepare($query);
        
        $stm->execute(array(
            ':body' => $body,
            ':postid' => $post,
            ':userid'=> $user->getId()
        ));
    }
}