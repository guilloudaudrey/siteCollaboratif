<?php

include_once 'classes/User.php';
include_once 'classes/DataBase.php';
$instance = new DataBase();

if (isset($_POST['pseudo']) && (isset($_POST['mdp']))) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $pseudo = $post['pseudo'];
    $mdp = md5($post['mdp']);

    echo $instance->connexion($pseudo, $mdp);
    header("location:index.php");
    
} else {
    echo 'pas de données';
}
    

    