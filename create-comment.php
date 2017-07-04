<?php

include_once 'classes/Post.php';
include_once 'classes/DataBase.php';
include_once 'classes/User.php';
        $instance = new DataBase();

if (isset($_POST['annonce'])) {

    session_start();
    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];


        if (is_file('utilisateur/' . $user . '.txt')) {
            $userdata = $instance->readUser($user);
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $instance->createComment(new Comment($userdata, $article));
            header("location:index.php");
        }
    }
} else {
    echo 'pas d\'article';
}


