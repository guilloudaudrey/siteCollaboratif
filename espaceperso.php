<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <?php
        include_once 'classes/User.php';
        include_once 'classes/DataBase.php';
        include_once 'classes/Post.php';
        include_once 'classes/Comment.php';

        $instance = new DataBase;
        session_start();

        include_once 'html/header.php';

        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];
            if (is_file('utilisateur/' . $user . '.txt')) {
                $contenu = $instance->readUser($user);
                ?>
                <div class="container" style="margin-top: 70px">

                    <?php
                    echo $contenu->asHtml();
                    ?>

                    <div id="exTab2" class="container">	
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a  href="#1" data-toggle="tab">Overview</a>
                            </li>
                            <li><a href="#2" data-toggle="tab">Without clearfix</a>
                            </li>
                            <li><a href="#3" data-toggle="tab">Solution</a>
                            </li>
                        </ul>

                        <div class="tab-content ">
                            <div class="tab-pane active" id="1">
                                <h2>Mes annonces</h2>
                                <?php
                                $listeAnnonces = $instance->readPostsList();
                                foreach ($listeAnnonces as $annonce) {
                                    $author = $annonce->getAuthor();

                                    if ($author == $user) {
                                        ?>


                                        <?php
                                        echo $annonce->asHtml();
                                        ?>


                                        <div class="boutons">
                                            <form method="POST" action="delete.php">
                                                <input type="hidden" name="filename" value="<?php echo $annonce->getDatetitre() ?>" class="text">
                                                <input type="submit" value="supprimer">
                                            </form>

                                            <form method="POST" action="edit_form.php">
                                                <input type="hidden" name="filename" value="<?php echo $annonce->getDatetitre() ?>">
                                                <input type="submit" value="modifier">
                                            </form>
                                        </div>


                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="tab-pane" id="2">
                                <h2>Evaluations émises</h2>
                                <?php
                                $listecomm = $instance->readCommentsList();

                                foreach ($listecomm as $comm) {
                                    $authorcomm = $comm->getAuthor();


                                    if ($authorcomm == $user) {
                                        echo $comm->asHtml();
                                    }
                                }
                                ?>
                            </div>
                            <div class="tab-pane" id="3">
                                <h2>Evaluations reçues</h2>
                                <?php
                                foreach ($listecomm as $comm) {
                                    $destinataire = $comm->getDestinataire();
                                    if ($destinataire == $user) {

                                        echo $comm->asHtml();
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>




                    <?php
                }
            }
            ?>




            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="js/jquery.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>