<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $instance = new DataBase;
        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];

            $contenu = $instance->readUser($user);

//-----------------------------header------------------------------//

            include_once 'html/header.php';
            ?>
            <div class="container espacepersocont ">
                <div class="row">
                    <div class= "col-lg-5">
                        <?php
                        echo $contenu->asHtml();
                    } else {
                        // include_once 'html/connexion-html.php';
                    }
                    ?>
                </div>
                <div class="container col-lg-6">
                    <h2>Mes annonces</h2>

                    <?php
                    $listeAnnonces = $instance->readPostsList();
                    foreach ($listeAnnonces as $annonce) {
                        $author = $annonce->getAuthor();

                        if ($author == $user) {
                            ?>
                            <div class="container col-lg-12"><?php echo $annonce->asHtml() ?>
                                <div class="boutons">
                                    <form method="POST" action="delete.php">
                                        <input type="hidden" name="filename" value="<?php echo $annonce->getTitle() ?>" class="text">
                                        <input type="submit" value="supprimer">
                                    </form>

                                    <form method="POST" action="edit_form.php">
                                        <input type="hidden" name="filename" value="<?php $annonce->getTitle() ?>">
                                        <input type="submit" value="modifier">
                                    </form>
                                </div></div>
                            <?php
                        }
                    }
                    ?>
                    <h2>Evaluations émises</h2>
                    <?php
                    $listecomm = $instance->readCommentsList();
                    $listepost = $instance->readPostsList();

                    foreach ($listecomm as $comm) {
                        if ($user == $comm->getAuthor()) {

                            echo $comm->asHtml();
                        }
                    }
                    ?>
                    <h2>Evaluations reçues</h2>
                    <?php
                    foreach ($listecomm as $comm) {

                        if ($user == $author) {


                            echo $comm->asHtml();
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
        include_once 'html/footer.php';
        ?>


    </body>
</html>