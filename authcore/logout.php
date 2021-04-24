<?php
require __DIR__ . '/auth.php';
if (!empty($_COOKIE)) {
    setcookie('login', '', -10, '/');
    setcookie('password', '', -10, '/');
    header('Location: login.php');
}
