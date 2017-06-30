<?php

include_once 'classes/User.php';
include_once 'classes/DataBase.php';
$instance = new DataBase();

if (isset($_POST['pseudo']) && (isset($_POST['mdp']))) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $pseudo = $post['pseudo'];
    $mdp = md5($post['mdp']);

    if (is_file('utilisateur/' . $pseudo . '.txt')) {
        $user = $instance->readUser($pseudo);
        $mdp_data = $user->getMdp();

        if ($mdp_data === $mdp) {
            session_start();
            $_SESSION['nom'] = $pseudo;
        } else {
            return 'pas connecté';
        }
    } else {
        return 'l\'utilisateur ' . $identifiant . ' n\'existe pas';
    }
    header("location:espaceperso.php");
} else {
    echo 'pas de données';
}
    

    