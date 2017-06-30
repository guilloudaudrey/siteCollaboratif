<?php

include_once 'classes/DataBase.php';
include_once 'classes/Post.php';
include_once 'classes/User.php';
$instance = new DataBase();

$content = htmlspecialchars($_POST['filename']);

if (isset($_POST['filename'])) {

    $instance->deletePost($content);
    header("location: espaceperso.php");
}

