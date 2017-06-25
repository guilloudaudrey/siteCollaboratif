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
        // put your code here
        ?>

        <form action="create-post.php" method="POST">
            <label for="title">Titre</label>
            <input type="text" name="title"/>
            <label for="description">Description</label>
            <textarea cols="30" rows="10" name="description"></textarea>
            <label for="price">Prix</label>
            <input type="number" name="price"/> €
            <label for="photo">Photo</label>
            <input type="file"name="photo"/>
            <input type="submit" value="Envoyer" name="newpost"/>
        </form>
    </body>
</html>
