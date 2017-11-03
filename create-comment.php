<?php

include_once 'classes/Post.php';
include_once 'classes/DataBase.php';
include_once 'classes/User.php';
include_once 'classes/Comment.php';
$instance = new DataBase();


if (isset($_GET['annonce'])) {
    $url = htmlspecialchars($_GET['url']);
    $title = htmlspecialchars($_GET['filename']);
    session_start();
    if (isset($_SESSION['nom'])) {
        $user = $_SESSION['nom'];

        $postdata = $instance->readPost($title);
        $userdata = $instance->readUser($user);
        
        

   
     $number =  intval($postdata->getId()) ;
        
        
        $post = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

          $date = date("Y-m-d H:i:s");
          $newcomm = new Comment($post['comm'], $post['note'], $date, $userdata->getId(), $number);
      
          //var_dump($newcomm);
        $instance->createComment($newcomm);
        
       header("location:$url");
    
    }
} else {
    echo 'pas d\'article';
}


