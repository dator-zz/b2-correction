<?php

class PdoUserManager extends AbstractPdoManager  implements UserManager
{
    public function authenticate($email, $password)
    {
        $query = 'SELECT * FROM user WHERE email = :email AND password = :password';
        $stm = $this->pdo->prepare($query);
        
        $stm->execute(array(
            ':email' => $email,
            ':password' => $password
        ));

        $r = $stm->fetch(PDO::FETCH_ASSOC);
        if($r) {
            return new User($r['id'], $r['firstName'], $r['lastName'], $r['email'], $r['password']);
        }

        return false;
    }
}