<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">      
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
        <script src="js/modernizr.custom.js"></script>
        <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
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
            <div class="container">

                <?php
            }

            include_once 'html/header.php';
            ?>
            <div class="container espacepersocont ">
                <h2>Ses annonces</h2>
                <?php
                $listeAnnonces = $newdb->readPostsList();
                $pseudo = $user->getPseudo();


                foreach ($listeAnnonces as $annonce) {
                    $auteur = $annonce->getAuthor();
                    if ($pseudo == $auteur) {
                        ?>
                        <div class="row" >
                            <div class="col-lg-12" style="margin-top: 10px">
                                <?php
                                echo $annonce->asHtml();
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php
      include_once 'html/footer.php';
      ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>