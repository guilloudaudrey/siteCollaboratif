<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'class/User.php';

if (isset($_POST['inscription'])){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $user = new User($post['pseudo'], $post['mdp'], $post['avatar'], $post['genre'],
            $post['age']);
    $user->serialize(); 
    echo $user->showHtml();
}
  