<?php

include_once 'classes/Post.php';

if (isset($_POST['newpost'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $newpost = new Post($post['title'], $post['photo'], $post['description'], $post['price']);
    $newpost->postData();
    $newpostdata = unserialize(file_get_contents('posts/' . $post['title'] . '.txt'));
    echo $newpostdata->showHtml();
} else {
    echo 'pas d\'article';
}


