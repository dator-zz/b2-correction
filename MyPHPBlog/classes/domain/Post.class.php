<?php

class Post 
{
    private $id;
    private $title;
    private $body;
    private $publicationDate;
    private $user;

    public function __construct($id, $title, $body, $publicationDate, $user)
    {
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
        $this->publicationDate = $publicationDate;
        $this->user = $user;
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $thi->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
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

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

}