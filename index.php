<!DOCTYPE html>
<?php
session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">      
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Chango" rel="stylesheet">
        <script src="js/modernizr.custom.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>Index</title>
    </head>
    <body>

        <!-------------------------------------header----------------------------------->

        <?php
        include_once 'html/header.php';
        ?>

        <!-------------------------------------bannière----------------------------------->

        <div class="intro-header ">
            <div class="container">
                <div class="row">
                    <h3  class="pull-left col-lg-5 col-lg-offset-5" style="margin-top: 50px; margin-bottom: -20px">800 000 personnes se rendent service !</h3></div>
                <div class="col-lg-5 col-lg-offset-5 col-md-7 col-md-offset-3 col-xs-10 col-xs-offset-1 rechercheinputs" >
                    <div class="row">
                        <form class="recherche col-md-10 col-lg-offset-1" style ="margin-top: 40px" method="POST" action="index.php">
                            <div class="form-group">
                                <select class="form-control" id="sel1" name ="categories">
                                    <option value="toutes categories" selected="selected">Toutes les catégories</option>
                                    <option value="animaux">Animaux</option>
                                    <option value="petits travaux">Petits travaux</option>
                                    <option value="cours" >Cours</option>
                                    <option value="enfants">Garde d'enfants</option>
                                    <option value="déménagement">Déménagement</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="sel2" name ="type" required="required">
                                    <option value="Offre" selected="selected">Offre</option>
                                    <option value="Demande">Demande</option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <input type="text" placeholder="mot-clé" class="form-control" id="sel3"/>
                            </div>

                            <div class="form-group ">
                                <input type="text" placeholder="Localisation" class="form-control" id="sel4" />
                            </div>
                            <input type="submit" value="Rechercher" name="search" class="btn btn-primary" style="margin-bottom: 20px"/>
                        </form>
                    </div>
                </div>



            </div>
            <div class="container">
                <form action="post_form.php" method="POST" class="col-lg-12" style="margin-top: 50px">
                    <input type="submit" class="btn btn-danger navbar-btn  btn-lg col-lg-offset-3" value="Poster une annonce">
                </form>
            </div>
        </div>
    </div>

    <!-------------------------------------poster une annonce----------------------------------->



    <!-------------------------------------fenêtre pop up connexion----------------------------------->

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Connexion</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="login.php">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name="pseudo"/>
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp"/>
                        <input type="submit" name="login"/>
                        <input type="hidden" name="url" value="<?php echo $url; ?>"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------------------affichage des annonces----------------------------------->

    <?php
    include_once 'classes/Post.php';
    include_once 'classes/DataBase.php';
    $instance = new DataBase();
    $listeAnnonces = $instance->readPostsList();
    ?>

    <?php
    if (isset($_POST['search'])) {
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $inputcat = $post['categories'];

        foreach ($listeAnnonces as $annonce) {
            $categorie = $annonce->getCategorie();

            if ($categorie == $inputcat) {
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-10 col-lg-8">
                            <div class="card" >
                                <?php
                                echo $annonce->asHtml();
                                ?>
                                <form action="annonce.php" method="GET">
                                    <input type="submit" value="en savoir plus" class="btn btn-outline-info" style="margin-right: 5px">
                                    <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                    <input type="hidden" name="filename" value="<?php $annonce->getDatetitre() ?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            } else if ($inputcat == "toutescategories") {
                ?>
                <div class="container">
                    <div class="row">
                        <div class="well-lg">
                            <div class="col-sm-12 col-md-10 col-lg-8">
                                <div class="card" style="margin-top: 20px">
                                    <?php
                                    echo $annonce->asHtml();
                                    ?>
                                    <form action="annonce.php" method="GET">
                                        <input type="submit" value="en savoir plus" class="btn btn-outline-info" style="margin-right: 5px">
                                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                                        <input type="hidden" name="filename" value="<?php $annonce->getDatetitre() ?>"></form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <?php
            }
        }
    } else {

        foreach ($listeAnnonces as $annonce) {
            $categorie = $annonce->getCategorie();
            ?>
            <div class="container">
                <div class="row">
                    <div class="well-lg">
                        <div class="col-sm-12 col-md-10 col-lg-8">
                            <div class="card " style="margin-top: 10px">
                                <?php
                                echo $annonce->asHtml();
                                echo '<div class="row"><form action="annonce.php" method="GET">'
                                . '<input type="submit" value="en savoir plus" class="btn btn-outline-info" style="margin-right: 5px">'
                                . '<button class="like btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span></button>'
                                . '<input type="hidden" name="filename" value="' . $annonce->getDatetitre() . '"></form></div>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        }
    }
    
    ?>


    <!-------------------------------------footer----------------------------------->
    <?php
    include_once 'html/footer.php';
    ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">

     <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>