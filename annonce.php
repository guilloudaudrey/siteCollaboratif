<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="index.php">Index</a>
        <?php
        include_once 'classes/DataBase.php';
        include_once 'classes/Post.php';
        include_once 'classes/User.php';
        include_once 'classes/Comment.php';
        $newdb = new DataBase();
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


//lien vers le profil de l'auteur de l'annonce + boutons contact

        if (isset($_GET['filename'])) {
            $file = htmlspecialchars($_GET['filename']);
            $post = $newdb->readPost($file);
            $author = $post->getAuthor();
            $title = $post->getTitle();
            $listecomm = $newdb->readCommentsList();

            echo '<p>' . $author . '<button>Voir le profil</button><p>';
            echo $post->asHtml()
            . '<pre><button>Envoyer un message</button></pre>'
            . '<pre><button>Afficher le numéro</button></pre><br/>';
            ?>

            <h2>Avis</h2>
            <p>Laissez un avis sur cette annonce.</p>
            <?php
//formulaire commentaires

            session_start();
            if (isset($_SESSION['nom'])) {
                $user = $_SESSION['nom'];
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
                    <input type="hidden" name="filename" value="' . $title . '">';
                    ?>
                </form>

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
                ?>

            <?php } else {
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
        }
        ?>
    </body>
</html>
