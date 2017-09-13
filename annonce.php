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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Chango" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    </head>
    <body style="background: #c0c0c0">

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
            $listecomm = $newdb->readCommentsList();
            ?>
            <!------------------------affichage de l'annonce----------------->

            <div class="row"><div class="container" style="background: white; margin-top: 60px">
                    <div class="row">
                        <div class="container">

                            <?php
                            echo $post->asHtmlAnnonce();
                            ?>


                            <!---------------lien vers l'espace public de l'auteur de l'annonce------------------>

                            <div class= "col-lg-3 " style="margin-top: 15px; background: grey; height: 200px">
                                <form action="espacepublic.php" method="GET" >
                                    <p class="col-lg-6 col-lg-offset-3" style="text-align: center"><?php echo $author ?><p>
                                    <div class="col-lg-6 col-lg-offset-3"><img src="images/profil.png" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div>
                                    <input type="hidden" name="profilpub" value="<?php echo $author ?>">
                                    <button class="btn btn-primary col-lg-6 col-lg-offset-3" style="margin-top: 10px">voir profil</button>
                                </form>
                            </div>
                            <div class="col-lg-3">
                                <button class="btn btn-primary col-lg-10 col-lg-offset-1" style="margin-top: 10px">
                                    <span class="glyphicon glyphicon-envelope" style="margin-right : 5px">
                                    </span>Envoyer un message
                                </button>
                                <button type="button" class="btn btn-primary col-lg-10 col-lg-offset-1" style="margin-top: 10px">
                                    <span class="glyphicon glyphicon-earphone" style="margin-right : 5px"></span>Afficher le numéro
                                </button>
                            </div>
                        </div>







                        <!-------------------------Formulaire pour laisser un avis-------------------------->

                        <div class="row"><div class="container" >
                                <h2>Avis</h2>
                                <hr class="my-4"></div></div>
                        <div class="row"><div class="container" ><p>Laissez un avis sur cette annonce.</p></div></div>

                        <?php
                        if (isset($_SESSION['nom'])) {
                            $user = $_SESSION['nom'];


                            if ($user !== $author) {
                                ?>

                                <div class="row"><div class="container"><form method="GET" action="create-comment.php">

                                            <label for="note">Note : </label>
                                            <select name="note">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option
                                                <option value="5">5</option>
                                            </select></div>
                                    <div class="row"><div class="container"><textarea cols="50" rows="8" name="comm"></textarea></div></div>
                                    <div class="row"><div class="container"><button name="annonce" class="btn btn-danger">Ajouter un avis</button><br/>
                                            <input type="hidden" name="url" value="<?php echo $url; ?>"/>
                                            <input type="hidden" name="filename" value="<?php echo $title ?>">
                                            </form></div></div>
                                    <?php
                                }
                            } else {
                                ?>
                                <div class="row"><div class="container">
                                        <form method="POST" action="login.php">
                                            <label for="pseudo">Pseudo</label>
                                            <input type="text" name="pseudo"/>
                                            <label for="mdp">Mot de passe</label>
                                            <input type="password" name="mdp"/>
                                            <input type="submit" name="login"/>
                                            <input type="hidden" name="url" value="<?php echo $url; ?>"/>
                                        </form>

                                        <a href="register-form.php">S'inscrire</a></div>
                                    <?php
                                }
                                ?>

                                <!--------------------affichage des commentaires/avis---------------------------------->


                                <div class="row"><div class="container"><h2>Liste commentaires</h2></div></div>

                                <?php
                                $commentlist = $newdb->readCommentsList();

                                foreach ($commentlist as $comm) {
                                    ?>
                                    <div class="container">
                                        <?php
                                
                                        echo $comm->asHtml();
                                        ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
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
