

<?php

session_start();
include_once 'classes/DataBase.php';
include_once 'classes/Post.php';
include_once 'classes/User.php';
$db = new DataBase();

if (isset($_POST['editpost'])) {
    $previoustitle = htmlspecialchars($_POST['previoustitle']);

    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];


        $newpost = $db->readPost($previoustitle);
        var_dump($newpost);

        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $db->updatePost($post['title'], $post['typeannonce'], $post['description'], $post['localisation'], $post['price'], $post['categories'], $previoustitle);

        header("location: espaceperso.php");
    }
} else {
    echo'<p>formulaire non envoyé</p>';
}
