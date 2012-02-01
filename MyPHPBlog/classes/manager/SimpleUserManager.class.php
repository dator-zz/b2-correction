<?php

class SimpleUserManager implements UserManager
{
    public function authenticate($email, $password)
    {
        if($email == "test@test.com" && 
            $password == "1234") {
            return new User(1, 'test', 'test', 'test@test.com', md5('1234'));
        }

        return false;
    }
}