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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css"
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
                            <option value="animaux">Animaux</option>
                            <option value="petits travaux">Petits travaux</option>
                            <option value="cours" >Cours</option>
                            <option value="enfants">Garde d'enfants</option>
                            <option value="déménagement">Déménagement</option>
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
                    <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file"name="photo" required="required" class="form-control"/>
                    </div>
                    <input type="submit" value="Envoyer" name="newpost"/>
                </form>
            </div>
            <?php
        } else {
            echo 'connectez-vous !';
            ?>

            <form method="POST" action="login.php">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo"/>
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp"/>
                <input type="submit" name="login"/>
                <input type="hidden" name="url" value="<?php echo $url; ?>"/>
            </form>
            <a href="register-form.php">S'inscrire</a>

            <?php
        }
        ?>
    </body>
</html>
