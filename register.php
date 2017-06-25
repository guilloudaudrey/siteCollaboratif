<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'classes/User.php';

if (isset($_POST['inscription'])) {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $user = new User($post['pseudo'], md5($post['mdp']), $post['avatar'], $post['genre'], $post['age']);
    $user->userData();
    header("location:login-form.php");

    session_start();
    $_SESSION['nom'] = $post['pseudo'];
    $_SESSION['avatar'] = $post['avatar'];
    $_SESSION['genre'] = $post['genre'];
    $_SESSION['age'] = $post['age'];
}
  