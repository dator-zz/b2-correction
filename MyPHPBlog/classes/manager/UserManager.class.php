<?php

interface UserManager
{
    function authenticate($email, $password);
}