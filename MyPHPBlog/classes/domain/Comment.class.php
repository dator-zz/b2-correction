<?php

class Comment
{
    private $id;
    private $user;
    private $body;
    private $publicationDate;

    public function __construct($id, $user, $body, $publicationDate) {
        
        $this->id = $id;
        $this->user = $user;
        $this->body = $body;
        $this->publicationDate = $publicationDate;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUser()
    {
        return $this->user;
    }
    
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getBody()
    {
        return $this->body;
    }
    
    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getPublicationDate()
    {
        return $this->publicationDate;
    }
    
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }
}