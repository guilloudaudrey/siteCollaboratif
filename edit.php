

<?php

include_once 'classes/DataBase.php';
include_once 'classes/Post.php';
include_once 'classes/User.php';
$newpost = new DataBase();

if (isset($_POST['editpost'])) {

    session_start();
    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];

        if (is_file('utilisateur/' . $user . '.txt')) {
            $previoustitle = htmlspecialchars($_POST['previoustitle']);
            $contenu = unserialize(file_get_contents('utilisateur/' . $user . '.txt'));

            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $newpost->editPost(new Post($post['title'], $post['photo'], $post['description'], $post['price'], $contenu), $previoustitle);



            header("location: espaceperso.php");
        }
    }
} else {
    echo'<p>formulaire non envoyé</p>';
}
?>
