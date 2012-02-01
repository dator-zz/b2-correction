<?php

abstract class AbstractPdoManager
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=myphpblog', 'root', 'root');        
    }
}