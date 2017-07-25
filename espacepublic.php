<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Chango" rel="stylesheet">
        <script src="js/modernizr.custom.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <?php
        session_start();
        include_once 'classes/User.php';
        include_once 'classes/DataBase.php';
        include_once 'classes/Post.php';
        include_once 'classes/Comment.php';
        $newdb = new DataBase();

        if (isset($_GET['profilpub'])) {

            $profil = htmlspecialchars($_GET['profilpub']);

                $user = $newdb->readUser($profil);
                ?>
                <div class="container" style="margin-top: 100px">
                    <p>Membre inscrit depuis le : <?php echo $user->getDateinscription() ?></p>
                    <?php
            }

            include_once 'html/header.php';
            ?>

            <h2>Ses annonces</h2>
            <?php
            $listeAnnonces = $newdb->readPostsList();
            $pseudo = $user->getPseudo();


            foreach ($listeAnnonces as $annonce) {
                $auteur = $annonce->getAuthor();
                if ($pseudo == $auteur) {
                    echo $annonce->asHtml();
                }
            }
            ?>

            <h2>Evaluations reçues</h2>
            <?php
            $listecomm = $newdb->readCommentsList();
            foreach ($listecomm as $comm) {
               // $destinataire = $comm->getDestinataire();
                //if ($pseudo == $destinataire) {
                    echo '<div>'. $comm->asHtml() . '</div>';
                }
          //  }
            ?>
        </div>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
     <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>