<?php

include_once 'classes/User.php';

if (isset($_POST['pseudo']) && (isset($_POST['mdp']))) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $pseudo = $post['pseudo'];
    $mdp = md5($post['mdp']);

    if (is_file('utilisateur/' . $pseudo . '.txt')) {
        $contenu = unserialize(file_get_contents('utilisateur/' . $pseudo . '.txt'));
        $mdp_data = $contenu->getData();
        
        if ($mdp_data == $mdp) {
            session_start();
            $_SESSION['nom'] = $pseudo;
            echo 'connecté';
            header("location:login-form.php");
        } else {
            echo 'pas connecté';
        }
    } else {
        echo 'l\'utilisateur ' . $pseudo . ' n\'existe pas';
    }
} else {
    echo 'pas de données';
}
    

    