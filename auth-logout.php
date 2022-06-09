<?php

$pdo = require_once __DIR__.'/database/database.php';
$authDAO = require_once './database/security.php';
$sessionId = $_COOKIE['session'];
print_r($sessionId);

if ($sessionId) {
    $authDAO->logout($sessionId);
    header('Location: /');
}