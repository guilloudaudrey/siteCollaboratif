<?php

include_once 'classes/Post.php';
include_once 'classes/DataBase.php';
include_once 'classes/User.php';

if (isset($_POST['newpost'])) {

    session_start();
    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];

        if (is_file('utilisateur/' . $user . '.txt')) {
            $contenu = unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
           
            //création et stockage de l'annonce
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $newpost = new DataBase();
            $newpost->createPost(new Post($post['title'], $post['photo'], $post['description'], $post['price'], $contenu));
            $newpostdata = unserialize(file_get_contents('posts/' . $post['title'] . '.txt'));

            //affichage de l'annonce créée
            $instance = new DataBase();
            echo $instance->showPost($newpostdata);
            header("location:index.php");
        }
    }
} else {
    echo 'pas d\'article';
}


    