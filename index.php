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
        <script src="js/modernizr.custom.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>Index</title>
    </head>
    <body>

        <!-------------------------------------header----------------------------------->

        <?php
        include_once 'header.php';
        ?>

        <!-------------------------------------bannière----------------------------------->

        <div class="intro-header ">
            <div class="container">

                <div class="col-lg-8 col-lg-offset-5" style="margin-top: 60px">

                    <h3 style="margin-bottom : 20px" class="pull-left">Besoin d'un service près de chez vous ?</h3>


                    <form class="recherche col-md-7" method="POST" action="index.php">
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
                        <input type="submit" value="Rechercher" name="search" class="btn btn-primary"/>
                    </form>

                </div>



            </div>
        </div>

    </div>

    <!-------------------------------------poster une annonce----------------------------------->

    <div class="container">
        <form action="post_form.php" method="POST" class="col-md-3" style="margin-top: 30px">
            <input type="submit" class="btn btn-danger navbar-btn" value="Poster une annonce">
        </form>
    </div>

    <!----------------------------------fenêtre pop up connexion ------------------------------>

    <div id="popup_name" class="popup_block">
        <div class="container-fluid">
            <form method="POST" action="login.php">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo"/>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp"/>
                <input type="submit" name="login"/>
                <input type="hidden" name="url" value="<?php echo $url; ?>"/>
            </form>
        </div>
    </div>

    <!-------------------------------------affichage des annonces----------------------------------->

    <?php
    include_once 'classes/Post.php';
    include_once 'classes/DataBase.php';
    $instance = new DataBase();
    $listeAnnonces = $instance->readPostsList();
    ?>
    <div class="container">
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
                            <div class="well-lg">
                                <div class="col-sm-10 col-md-9 col-lg-8">
                                    <div class="card" style="margin-top: 20px">
                                        <?php
                                        echo $annonce->asHtml();
                                        echo '<form action="annonce.php" method="GET">'
                                        . '<input type="submit" value="en savoir plus" class="btn btn-outline-info" style="margin-right: 5px">'
                                        . '<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>'
                                        . '<input type="hidden" name="filename" value="' . $annonce->getDatetitre() . '"></form>';
                                        ?>
                                    </div>
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
                                <div class="col-sm-10 col-md-9">
                                    <div class="card" style="margin-top: 20px">
                                        <?php
                                        echo $annonce->asHtml();
                                        echo '<form action="annonce.php" method="GET">'
                                        . '<input type="submit" value="en savoir plus" class="btn btn-outline-info" style="margin-right: 5px">'
                                        . '<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>'
                                        . '<input type="hidden" name="filename" value="' . $annonce->getDatetitre() . '"></form>';
                                        ?>
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
                            <div class="col-sm-10 col-md-10">
                                <div class="card " style="margin-top: 20px">
                                    <?php
                                    echo $annonce->asHtml();
                                    echo '<form action="annonce.php" method="GET">'
                                    . '<input type="submit" value="en savoir plus" class="btn btn-outline-info" style="margin-right: 5px">'
                                    . '<button class="like btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span></button>'
                                    . '<input type="hidden" name="filename" value="' . $annonce->getDatetitre() . '"></form>';
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
    </div>

    <!-------------------------------------footer----------------------------------->
    <?php
    include_once 'footer.php';
    ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script src="js/script.js"
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>