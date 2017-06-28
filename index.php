<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">      
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Index</title>
        <style>

            h1{
                text-align: center;
            }
            .recherche{
                text-align: center;
            }
        </style>
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
            echo 'Bonjour ' . $_SESSION['nom'];
            echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
            echo '<a href="espaceperso.php">Espace personnel</a><br/>';
            echo '<a href="post_form.php">Poster une annonce</a>';
        }
        ?>

        <h1>Accueil</h1>
        <form class="recherche">
            <select>
                <option value="0" selected="">catégories</option>
                <option value="1">1</option>
            </select>
            <input type="text" placeholder="mot-clé"/>
            <input type="text" placeholder="Localisation"/>
            <input type="submit" value="Rechercher"/>
        </form>

        <?php
        include_once 'classes/Post.php';
        include_once 'classes/DataBase.php';
        $instance = new DataBase();

        $dossier = 'posts/';
        $files = scandir($dossier);
        foreach ($files as $content) {
            if (!is_dir($content)) {
                echo '<section><h3>' . basename($content, ".txt") . '</h3>';
                echo '<div class="text">';
                $contenu = unserialize(file_get_contents($dossier . $content));

                echo $instance->showPost($contenu);
                echo '</div>';
            }
        }
        ?>
    </body>
</html>
