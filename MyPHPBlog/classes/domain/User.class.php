<?php

class User
{
    private $id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;

    public function __construct($id, $firstname, $lastname, $email, $password)
    {
        $this->id = $id;
        $this->firstName = $firstname;
        $this->lastName = $lastname;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstname()
    {
        return $this->firstName;
    }
    
    public function setFirstname($firstname)
    {
        $this->firstName = $firstname;
    }

    public function getLastname()
    {
        return $this->lastName;
    }
    
    public function setLastname($lastname)
    {
        $this->lastName = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
}