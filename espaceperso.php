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
                              
                            echo $annonce->asHtml();
                            ?>
                            <div class="row boutons col-lg-12" style="margin-bottom: 10px; margin-top: 10px;">
                                <form method="POST" action="delete.php">
                                    <input type="hidden" name="filename" value="<?php echo $annonce->getTitle() ?>" class="text">
                                    <input type="submit" class="btn btn-default col-lg-3" style="margin-right: 5px" value="supprimer">
                                </form>

                                <form method="POST" action="edit_form.php">
                                    <input type="hidden" name="filename" value="<?php echo $annonce->getTitle() ?>">
                                    <input type="submit" class="btn btn-default col-lg-3" value="modifier">
                                </form>

                            </div>
                            <?php
                        }
                    }
                    ?>


                    <h2 style="margin-top: 100px">Evaluations émises</h2>
                    <?php
                    $listecomm = $instance->readCommentsList();
                    $listepost = $instance->readPostsList();

                    foreach ($listecomm as $comm) {
                        if ($user == $comm->getAuthor()) {

                            echo $comm->asHtml();
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


    <?php
    include_once 'html/footer.php';
    ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>