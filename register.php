<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'classes/User.php';
include_once 'classes/DataBase.php';

if (isset($_POST['inscription'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if (isset($_POST['inscription'])) {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (empty($post['pseudo']) || empty($post['mdp']) || empty($post['confirm']) || empty($post['nom']) || empty($post['prenom']) || empty($post['mail']) || empty($post['num']) || empty($post['ville']) || empty($post['postal'])) {
            $_SESSION['erreur'] = "Veillez a bien remplir tout les champ avant d'envoyer votre inscription !";

            exit();
        }
    }
    $user = new DataBase();
    $user->createUser(new User($post['pseudo'], md5($post['mdp']), $post['avatar'], $post['genre'], $post['age'], $post['nom'], $post['prenom'], $post['mail'], $post['telephone'], $post['CP'], $post['ville']));
    header("location:index.php");

    session_start();
    $_SESSION['nom'] = $post['pseudo'];
}
    