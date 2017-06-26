<?php

include_once 'classes/Post.php';
include_once 'classes/DataBase.php';

if (isset($_POST['newpost'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $newpost = new DataBase;
    $newpost->createPost(new Post($post['title'], $post['photo'], $post['description'], $post['price'])) ;
    $newpostdata = unserialize(file_get_contents('posts/' . $post['title'] . '.txt'));
    $instance = new DataBase();
    echo $instance->showPost($newpostdata);
    

    
} else {
    echo 'pas d\'article';
}


