<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nouvel article</title>
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
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (isset($_SESSION['nom'])) {
            ?>
            <div class="container col-lg-6 col-md-offset-3 col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2" id="formulaire">
                <form action="create-post.php" method="POST">
                    <div class="form-group">
                        <label for="Type">Type</label>
                        <select name ="type" required="required" class="form-control">
                            <option value="Offre" selected="selected">Offre</option>
                            <option value="Demande">Demande</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" required="required" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea cols="30" rows="10" name="description" required="required" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="categories">Catégories</label>
                        <select name ="categories" required="required" class="form-control">
                            <option value="toutes categories" selected="selected">Toutes les catégories</option>
                            <option value="animaux" name="animaux">Animaux</option>
                            <option value="petitstravaux" name="travaux">Petits travaux</option>
                            <option value="cours" name="cours">Cours</option>
                            <option value="enfants" name="enfants">Garde d'enfants</option>
                            <option value="déménagement" name="demenagement">Déménagement</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="localisation">Localisation</label>
                        <input type="text" name="localisation" placeholder="ville" required="required" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Prix</label>
                        <input type="number" name="price" required="required" class="form-control"/> €
                    </div>

                    <input type="submit" value="Envoyer" name="newpost"/>
                </form>
            </div>
            <?php
        } else {
         
            ?>
   

    

            <?php
        }
        ?>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
