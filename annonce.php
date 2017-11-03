<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
include_once 'classes/DataBase.php';
include_once 'classes/Post.php';
include_once 'classes/User.php';
include_once 'classes/Comment.php';
$newdb = new DataBase();
session_start();
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">      
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
        <script src="js/modernizr.custom.js"></script>
        <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>

    </head>
    <body>

        <!-------------------------------------header----------------------------------->

        <?php
        include_once 'html/header.php';
        ?>

        <?php
        if (isset($_GET['filename'])) {
            $file = htmlspecialchars($_GET['filename']);
            $post = $newdb->readPost($file);

            $author = $post->getAuthor();
            $title = $post->getTitle();
            //$date = $post->getDatetitre();
            ?>
            <!------------------------affichage de l'annonce----------------->
            <div class="container annoncecont">

                <?php
                echo $post->asHtmlAnnonce();
                ?>


                <!---------------lien vers l'espace public de l'auteur de l'annonce------------------>

                <div class= "col-lg-3 " style="margin-top: 15px;  height: 200px">
                    <form action="espacepublic.php" method="GET" >
                        <p class="col-lg-6 col-lg-offset-3" style="text-align: center">
                            <?php echo $author ?>
                        <p>
                        <div class="col-lg-6 col-lg-offset-2">
                            <img src="images/profil.png" class="img-fluid" alt="Responsive image" style="width: 150%;height: auto">
                        </div>
                        <input type="hidden" name="profilpub" value="<?php echo $author ?>">
                        <button class="btn btn-secondary col-lg-6 col-lg-offset-3" style="margin-top: 10px">
                            voir profil
                        </button>
                    </form>
                </div>
                <div class="col-lg-3" style="margin-top: 15px;">
                    <button class="btn btn-primary col-lg-10 col-lg-offset-1" style="margin-top: 10px">
                        <span class="glyphicon glyphicon-envelope" style="margin-right : 5px"></span>
                        Envoyer un message
                    </button>
                    <button type="button" class="btn btn-primary col-lg-10 col-lg-offset-1" style="margin-top: 10px">
                        <span class="glyphicon glyphicon-earphone" style="margin-right : 5px"></span>
                        Afficher le numéro
                    </button>
                </div>


                <!-------------------------Formulaire pour laisser un avis-------------------------->


                <div class="container">
                    <div class="row">
                        <div class="container col-lg-9">
                            <h2>Avis</h2>
                            <hr class="my-4">
                        </div>
                    </div>

                    <?php
                    if (isset($_SESSION['nom'])) {
                        $user = $_SESSION['nom'];


                        if ($user !== $author) {
                            ?>
     


                            <div class="container">
                                <form method="GET" action="create-comment.php">
                                    <label for="note">Note : </label>
                                    <select name="note">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option
                                        <option value="5">5</option>
                                    </select>


                                    <div class="row">
                                        <div class="container">
                                            <textarea cols="50" rows="8" name="comm"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container">
                                            <button name="annonce" class="btn btn-danger">
                                                Ajouter un avis
                                            </button><br/>
                                            <input type="hidden" name="url" value="<?php echo $url; ?>"/>                       
                                            <input type="hidden" name="filename" value="<?php echo $title; ?>">                                  
                                        </div>                           
                                    </div>
                                </form>
                            </div>
                        </div>


                        <?php
                    }
                }
                ?>

                <!--------------------affichage des commentaires/avis---------------------------------->



                <div class="container col-lg-10">
                    <h2>Liste commentaires</h2>
                    <?php
                    $commentlist = $newdb->readCommentsList();
                    foreach ($commentlist as $comment) {

                        if ($comment->getArticle() == $post->getId()) {
                            echo $comment->asHtml();
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <?php
    /* --------------------footer---------------------------------- */

    include_once 'html/footer.php';
    ?>




    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
