<?php

include_once 'classes/Post.php';
include_once 'classes/DataBase.php';
include_once 'classes/User.php';

if (isset($_POST['newpost'])) {
    session_start();
    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];
        $instance = new DataBase();

        //if (is_file('utilisateur/' . $user . '.txt')) {
        var_dump($contenu = $instance->readUser($user));
        
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $newpost = new Post($post['title'], $post['description'], $post['price'], $contenu['id'], $post['categories'], $post['localisation'], $post['type']);
            $instance->createPost($newpost);
            header("location:index.php");
        }
    //}
} else {
    echo 'pas d\'article';
}


    
