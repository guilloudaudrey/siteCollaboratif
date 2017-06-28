<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'classes/User.php';
        include_once 'classes/DataBase.php';
        session_start();

        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];

            if (is_file('utilisateur/' . $user . '.txt')) {
                $contenu = unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
                $instance = new DataBase;
                echo $instance->showUser($contenu);
                echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
                echo '<a href="post_form.php">Créer une nouvelle annonce</a><br/>';
                echo '<a href="index.php">Index</a>';
            }
        } else {
            include_once 'html/connexion-html.php';
        }
        ?>

        <h2>Mes annonces</h2>

        <?php
        include_once 'classes/Post.php';
        include_once 'classes/DataBase.php';
        include_once 'classes/User.php';

        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];


            $dossier = 'posts/';
            $files = scandir($dossier);
            foreach ($files as $content) {
                if (!is_dir($content)) {
                    $contenu = unserialize(file_get_contents($dossier . $content));


                    $author = $instance->getAuthor($contenu);

                    if ($author === $user) {
                        echo '<section><h3>' . basename($content, ".txt") . '</h3>';
                        echo $instance->showPost($contenu);
                        echo'

                                    <div class="boutons">
            <form method="POST" action="delete.php">
            <input type="hidden" name="filename" value="' . $content . '" class="text">
            <input type="submit" value="supprimer">
            </form>
    
            <form method="POST" action="edit_form.php">
            <input type="hidden" name="filename" value="' . $content . '">
                <input type="submit" value="modifier">
            </form>
            </div>';
                    }
                }
            }
        }
        ?>
 
    </body>
</html>
