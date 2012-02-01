<?php

class PdoUserManager implements UserManager
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=myphpblog', 'root', 'root');        
    }

    public function authenticate($email, $password)
    {
        $query = 'SELECT * FROM user WHERE email="%s" AND password="%s"';
        $stm = $this->pdo->query(sprintf($query, $email, $password));
        
        $r = $stm->fetch(PDO::FETCH_ASSOC);

        if($r) {
            return new User($r['id'], $r['firstName'], $r['lastName'], $r['email'], $r['password']);
        }

        return false;
    }
}