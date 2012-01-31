<?php

session_start();
session_destroy();
setcookie('username', '',1); 
header('Location: login.php');
exit;