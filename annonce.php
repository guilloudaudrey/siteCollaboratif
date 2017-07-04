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
        $newdb = new DataBase();


//lien vers le profil de l'auteur de l'annonce + boutons contact

        if (isset($_POST['filename'])) {
            $file = htmlspecialchars($_POST['filename']);
            $post = $newdb->readPost($file);
            $author = $post->getAuthor();
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
                ?>
                <form method="POST" action="create-comment.php" name="annonce">
                    <label for="note">Note : </label>
                    <select>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option
                        <option value="5">5</option>
                    </select>
                    <textarea cols="50" rows="8"></textarea>
                    <button>Ajouter un avis</button><br/>
                </form>

            <?php } else {
                ?>
                <form method="POST" action="login.php">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo"/>
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp"/>
                    <input type="submit" name="login"/>
                </form>

                <a href="register-form.php">S'inscrire</a>
                <?php
            }
        }
        ?>
    </body>
</html>
