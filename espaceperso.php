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
        include_once 'classes/Post.php';
        include_once 'classes/Comment.php';
        
        $instance = new DataBase;
        session_start();

        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];
            if (is_file('utilisateur/' . $user . '.txt')) {
                $contenu = $instance->readUser($user);
                echo $contenu->asHtml();
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
            $listeAnnonces = $instance->readPostsList();
            foreach ($listeAnnonces as $annonce) {
                $author = $annonce->getAuthor();

                if ($author == $user) {
                    echo $annonce->asHtml();

                    echo'

            <div class="boutons">
            <form method="POST" action="delete.php">
            <input type="hidden" name="filename" value="' . $annonce->getTitle() . '" class="text">
            <input type="submit" value="supprimer">
            </form>
    
            <form method="POST" action="edit_form.php">
            <input type="hidden" name="filename" value="' . $annonce->getTitle() . '">
                <input type="submit" value="modifier">
            </form>
            </div>';
                }
            }
        }
        ?>

        <h2>Evaluations émises</h2>
        <?php
        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];
            $listecomm = $instance->readCommentsList();
         
           foreach ($listecomm as $comm) {
               $authorcomm = $comm->getAuthor();
             

               if ($author == $user) {
                   echo $comm->asHtml();
               }
   
            }
        }
        ?>
    </body>
</html>