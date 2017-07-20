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
    $user = new DataBase();
    $user->createUser(new User($post['pseudo'], md5($post['mdp']), $post['genre'], $post['age'], $post['nom'], $post['prenom'], $post['mail'], $post['telephone'], $post['CP'], $post['ville']));
    header("location:index.php");

    session_start();
    $_SESSION['nom'] = $post['pseudo'];
}
  