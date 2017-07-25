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
        $userdata = $instance->readUser($user);
        
        echo $userdata->getId();
        echo $postdata->getId();
      
        
        
        $post = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
          echo $post['comm'];
          echo $post['note'];
        $instance->createComment(new Comment($post['comm'], $post['note'], $userdata->getId(), $postdata->getId()));
        
        header("location:$url");
    
    }
} else {
    echo 'pas d\'article';
}


