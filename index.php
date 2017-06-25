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

        <?php
        session_start();
        if (!isset($_SESSION['nom'])) {
            ?>

            <form method="POST" action="login.php">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo"/>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp"/>
                <input type="submit" name="login"/>
            </form>

            <a href="register-form.php">S'inscrire</a>
            <a href="post_form.php">Poster une annonce</a>

        <?php
        
        } else {
            echo 'Bonjour '.$_SESSION['nom'];
            echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
            echo '<a href="espaceperso.php">Espace personnel</a><br/>';
            echo '<a href="post_form.php">Poster une annonce</a>';
            
        }
            include_once 'classes/Post.php';

            $dossier = 'posts/';
            $files = scandir($dossier);
            foreach ($files as $content) {
                if (!is_dir($content)) {
                    echo '<section><h3>' . basename($content, ".txt") . '</h3>';
                    echo '<div class="text">';
                    echo file_get_contents($dossier . $content);
                    echo '</div>';
                }
            }
            ?>
    </body>
</html>
