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

        <?php
        session_start();
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (!isset($_SESSION['nom'])) {
            ?>
            <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
                <div class="container topnav ">
                    <div class="navbar-header col-md-9">
                        <a class="navbar-brand " href="#">WebSiteName</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="register-form.php">S'inscrire</a></li>
                        <li><a href="#?w=500" rel="popup_name" class="poplight">Se connecter</a></li>
                    </ul>

                </div>
            </nav>
            <div class="intro-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="intro-message">
                                <h2 style="color:grey" >Besoin d'un service près de chez vous ?</h2>
                                <form action="post_form.php" method="POST">
                                    <button type="button" class="btn btn-danger navbar-btn" >Poster une annonce</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <a href="#?w=500" rel="popup_name" class="poplight">En savoir plus</a>

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
    } else {
        echo 'Bonjour ' . $_SESSION['nom'];
        echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
        echo '<a href="espaceperso.php">Espace personnel</a><br/>';
        echo '<a href="post_form.php">Poster une annonce</a>';
    }
    ?>

    <h1>Accueil</h1>
    <form class="recherche" method="POST" action="index.php">
        <select name ="categories">
            <option value="toutes categories" selected="selected">Toutes les catégories</option>
            <option value="animaux">Animaux</option>
            <option value="petits travaux">Petits travaux</option>
            <option value="cours" >Cours</option>
            <option value="enfants">Garde d'enfants</option>
            <option value="déménagement">Déménagement</option>
        </select>
        <select name ="type" required="required">
            <option value="Offre" selected="selected">Offre</option>
            <option value="Demande">Demande</option>
        </select>
        <input type="text" placeholder="mot-clé"/>
        <input type="text" placeholder="Localisation"/>
        <input type="submit" value="Rechercher" name="search"/>
    </form>

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
                    echo $annonce->asHtml();
                    echo '<form action="annonce.php" method="GET">'
                    . '<input type="submit" value="en savoir plus">'
                    . '<input type="hidden" name="filename" value="' . $annonce->getDatetitre() . '"></form>';
                } else if ($inputcat == "toutescategories") {
                    echo $annonce->asHtml();
                    echo '<form action="annonce.php" method="GET">'
                    . '<input type="submit" value="en savoir plus">'
                    . '<input type="hidden" name="filename" value="' . $annonce->getDatetitre() . '"></form>';
                }
            }
        } else {

            foreach ($listeAnnonces as $annonce) {
                $categorie = $annonce->getCategorie();
                echo $annonce->asHtml();
                echo '<form action="annonce.php" method="GET">'
                . '<input type="submit" value="en savoir plus">'
                . '<input type="hidden" name="filename" value="' . $annonce->getDatetitre() . '"></form>';
            }
        }
        ?>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script src="js/script.js"
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>F
    </body>
</html>