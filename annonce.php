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
$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/modernizr.custom.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>

        <!-------------------------------------header----------------------------------->

        <?php
        include_once 'header.php';
        ?>

        <!-------------------------------------fenêtre pop up connexion----------------------------------->

        <div id="popup_name" class="popup_block">
            <div class="container-fluid">
                <form method="POST" action="login.php">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo"/>
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp"/>
                    <input type="submit" name="login"/>
                    <input type="hidden" name="url" value="<?php echo $url; ?>"/>
                </form>
            </div>
        </div>

        <?php
        if (isset($_GET['filename'])) {
            $file = htmlspecialchars($_GET['filename']);
            $post = $newdb->readPost($file);
            $author = $post->getAuthor();
            $title = $post->getTitle();
            $date = $post->getDatetitre();
            $listecomm = $newdb->readCommentsList();

            /* ------------------------affichage de l'annonce----------------- */

            echo '<div class="container col-lg-12"><div class="col lg-9">' . $post->asHtml();
            echo'<button class="btn btn-primary" style="margin-right: 10px"><span class="glyphicon glyphicon-envelope" style="margin-right : 5px"></span>Envoyer un message</button>'
            . '<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-earphone" style="margin-right : 5px"></span>Afficher le numéro</button></div>';


            /* ---------------lien vers l'espace public de l'auteur de l'annonce------------------ */

            echo '<div class= col-lg-3"><div class="row"><div class="col-lg-12"><form action="espacepublic.php" method="GET" >';
            echo '<p class="col-lg-1">' . $author . '<p>';
            echo '<input type="hidden" name="profilpub" value="' . $author . '">'
            . '<button class="btn btn-primary col-lg-2">voir profil</button>'
            . '</form></div></div></div>';

            /* -------------------------Formulaire pour laisser un avis-------------------------- */

            echo '<h2>Avis</h2>
            <p>Laissez un avis sur cette annonce.</p>';

            if (isset($_SESSION['nom'])) {
                $user = $_SESSION['nom'];

                if ($user !== $author) {
                    ?>
                    <form method="GET" action="create-comment.php">
                        <label for="title">Titre</label>
                        <input type="text" name="title"/>
                        <label for="note">Note : </label>
                        <select name="note">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option
                            <option value="5">5</option>
                        </select>
                        <textarea cols="50" rows="8" name="comm"></textarea>
                        <button name="annonce">Ajouter un avis</button><br/>
                        <input type="hidden" name="url" value="<?php echo $url; ?>"/>
                        <?php
                        echo'
                    <input type="hidden" name="filename" value="' . $date . '">';
                        ?>
                    </form>
                    <?php
                }
            } else {
                ?>
                <form method="POST" action="login.php">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo"/>
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp"/>
                    <input type="submit" name="login"/>
                    <input type="hidden" name="url" value="<?php echo $url; ?>"/>
                </form>

                <a href="register-form.php">S'inscrire</a>
                <?php
            }
            ?>

            <!--------------------affichage des commentaires/avis---------------------------------->

            <h2>Liste commentaires</h2>
            <?php
            $commentlist = $newdb->readCommentsList();
            foreach ($commentlist as $comm) {
                $destinataire = $comm->getDestinataire();
                $article = $comm->getArticle();

                if (($article == $title) && ($author == $destinataire)) {
                    echo $comm->asHtml();
                }
            }
        }
        /* --------------------footer---------------------------------- */

        include_once 'footer.php';
        ?>



        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="js/script.js"
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
        </body>
    </html>
