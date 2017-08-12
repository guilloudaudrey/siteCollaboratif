<?php
session_start();
include_once 'classes/User.php';
include_once 'classes/DataBase.php';
$db = new DataBase();

if (isset($_POST['pseudo']) && (isset($_POST['mdp']))) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $pseudo = $post['pseudo'];
    $mdp = md5($post['mdp']);
    $url = $post['url'];

    // if (is_file('utilisateur/' . $pseudo . '.txt')) {
    //   $user = $instance->readUser($pseudo);
    //  $mdp_data = $user->getMdp();

    if ($db->login($pseudo, $mdp) == TRUE) {
        $_SESSION['nom'] = $pseudo;
        header("location:$url");
    } else {
        echo "Mauvais pseudo ou mdp";
    }
}
        

    

    