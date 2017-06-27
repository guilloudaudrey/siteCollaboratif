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
    $user->createUser(new User($post['pseudo'], md5($post['mdp']), $post['avatar'], $post['genre'], $post['age']));
    header("location:index.php");

    session_start();
    $_SESSION['nom'] = $post['pseudo'];
  //  $_SESSION['avatar'] = $post['avatar'];
  //  $_SESSION['genre'] = $post['genre'];
  //  $_SESSION['age'] = $post['age'];
}
  