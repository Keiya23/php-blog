<?php

/**
 * @var ArticleDAO
 */
require_once("./database/database.php");
$authDAO = require_once __DIR__.'/database/security.php';

$currentUser = $authDAO->isLoggedIn();

if(!$currentUser) {
    header('Location: /');
}

$articleDAO = require_once './database/models/ArticleDAO.php';


$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';

if($id) {
    $article = $articleDAO->getOne($id);

    if ($currentUser['id'] === $article['author']) {
        $articleDAO->deleteOne($id);
    }
}
header('Location: /');
