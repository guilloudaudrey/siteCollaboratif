<?php

include_once 'classes/Post.php';
include_once 'classes/DataBase.php';
include_once 'classes/User.php';
include_once 'classes/Comment.php';
$instance = new DataBase();


if (isset($_GET['annonce'])) {
    $url = htmlspecialchars($_GET['url']);
    $title = htmlspecialchars($_GET['filename']);
    session_start();
    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];

        $postdata = $instance->readPost($title);
        $destinataire = $postdata->getAuthor();
        $userdata = $instance->readUser($user);
        $post = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        var_dump($userdata->getId());
        $julien = new Comment($post['comm'], $post['note'], $userdata, $postdata, $destinataire);
        var_dump($julien);
        $instance->createComment($julien);
        //header("location:$url");
    
    }
} else {
    echo 'pas d\'article';
}


