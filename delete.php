<?php
include_once 'classes/DataBase.php';
include_once 'classes/Post.php';
include_once 'classes/User.php';

$content = htmlspecialchars($_POST['filename']);
   
 if(isset($_POST['filename'])){
     $instance = new DataBase();
     $instance->deletePost($content);
     header("location: espaceperso.php");
 }

