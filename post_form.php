<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['nom'])) {
            ?>


            <form action="create-post.php" method="POST">
                <label for="title">Titre</label>
                <input type="text" name="title" required="required"/>
                <label for="description">Description</label>
                <textarea cols="30" rows="10" name="description" required="required"></textarea>
                <label for="categories">Catégories</label>
                <select name ="categories" required="required">
                    <option value="toutescategories" selected="selected">Toutes les catégories</option>
                    <option value="animaux">Animaux</option>
                    <option value="artisanat">Artisanat</option>
                    <option value="cours" >Cours</option>
                    <option value="enfants">Garde d'enfants</option>
                    <option value="informatique">Informatique</option>
                </select>
                <label for="localisation">Localisation</label>
                <input type="text" name="localisation" placeholder="ville" required="required"/>
                <label for="price">Prix</label>
                <input type="number" name="price" required="required"/> €
                <label for="photo">Photo</label>
                <input type="file"name="photo" required="required"/>
                <input type="submit" value="Envoyer" name="newpost"/>
            </form>

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
            </form>
            <a href="register-form.php">S'inscrire</a>
            <?php
        }
        ?>
    </body>
</html>
