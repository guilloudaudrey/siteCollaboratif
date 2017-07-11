<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">      
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/modernizr.custom.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <title>Index</title>
        <style>

            h1{
                text-align: center;
            }
            .recherche{
                text-align: center;
            }
        </style>
    </head>
    <body>


        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
                <div class="container topnav ">
                    <div class="navbar-header col-md-7">
                        <a class="navbar-brand " href="index.php">WebSiteName</a>
                    </div>
                    <?php
                    session_start();
                    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    if (!isset($_SESSION['nom'])) {
                        ?>
                        <ul class="nav navbar-nav col-md-3">
                            <li><a href="register-form.php">S'inscrire</a></li>
                            <li><a href="#?w=500" rel="popup_name" class="poplight">Se connecter</a></li>
                        </ul>
                        <?php
                    } else {
                        echo '<div class="col-md-1"> Bonjour ' . $_SESSION['nom'];
                        echo '</div><div class="col-md-2" style="margin-top: 8px" ><form action="logout.php" method="POST"><button class="btn btn-danger ">Se déconnecter</button></form></div>';
                        echo '<div class="col-md-2" style="margin-top: 8px"><a class = "btn btn-link" href="espaceperso.php">Espace personnel</a></div>';
                        ;
                    }
                    ?>
                </div>
            </nav>
        </div>

        <div class="intro-header ">
            <div class="container">
                <div class="row col-lg-6 col-lg-offset-1">
                    <div class="col-lg-12 col-lg-offset-7" style="margin-top: 60px">
                        <div class="intro-message col-lg-12">
                            <h3 style="margin-bottom : 20px">Besoin d'un service près de chez vous ?</h3>
                            <div class="container col-md-10 col-xs-6">
                                <form class="recherche col-md-12" method="POST" action="index.php">
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
            </div>
            <form action="post_form.php" method="POST" class="col-md-3" style="margin-top: 30px">
                <input type="submit" class="btn btn-danger navbar-btn" value="Poster une annonce">
            </form>
        </div>

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
                                    <div class="col-sm-10 col-md-9">
                                        <div class="card" style="margin-top: 20px">
                                            <?php
                                            echo $annonce->asHtml();
                                            echo '<form action="annonce.php" method="GET">'
                                            . '<input type="submit" value="en savoir plus" class="btn btn-outline-info">'
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
                                            . '<input type="submit" value="en savoir plus" class="btn btn-outline-info">'
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
                    $categorie = $annonce->getCategorie();?>
                           <div class="container">
                            <div class="row">
                                <div class="well-lg">
                                    <div class="col-sm-10 col-md-10">
                                        <div class="card " style="margin-top: 20px">
                                            <?php
                                            echo $annonce->asHtml();
                                            echo '<form action="annonce.php" method="GET">'
                                            . '<input type="submit" value="en savoir plus" class="btn btn-outline-info">'
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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="js/script.js"
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="js/bootstrap.min.js"></script>
        </body>
    </html>