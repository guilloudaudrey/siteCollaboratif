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
        $newdb = new DataBase();

        if (isset($_GET['profilpub'])) {

            $profil = htmlspecialchars($_GET['profilpub']);
            echo $profil;



            if (is_file('utilisateur/' . $profil . '.txt')) {
                $user = $newdb->readUser($profil);
                echo '</br>Membre inscrit depuis le : ' . $user->getDateinscription()->format('d/m/y');
            }
        }
        ?>
        
        <h2>Ses annonces</h2>
        <?php
        $listeAnnonces = $newdb->readPostsList();
        $pseudo = $user->getPseudo();
        
        foreach ($listeAnnonces as $annonce){
            $auteur = $annonce->getAuthor();
            if ($pseudo == $auteur){
                echo $annonce->asHtml();
            }
        }
        ?>
        
        <h2>Evaluations reçues</h2>
        <?php
        $listecomm = $newdb->readCommentsList();
        foreach ($listecomm as $comm){
            $destinataire = $comm->getDestinataire();
            if ($pseudo == $destinataire){
                echo $comm->asHtml();
            }
        }
        ?>
    </body>
</html>