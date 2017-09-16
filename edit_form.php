<!DOCTYPE html>
<!---->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'classes/DataBase.php';
        include_once 'classes/User.php';
        include_once 'classes/Post.php';
        $instance = new DataBase();

        if (isset($_POST['filename'])) {
            $file = htmlspecialchars($_POST['filename']);
            $post = $instance->readPost($file);

            $title = $post->getTitle();
            $description = $post->getDescription();
            $price = $post->getPrice();

            echo'
                <form action="edit.php" method="POST">
                    <label for="Type">Type</label>
                    <select name ="type" required="required" class="form-control">
                        <option value="Offre" selected="selected">Offre</option>
                        <option value="Demande">Demande</option>
                    </select>
                    <label for="title">Titre</label>
                    <input type="text" name="title" value="' . $title . '"/>
                    <input type="hidden" name="previoustitle" value="' . $title . '"/>
                    <label for="description">Description</label>
                    <textarea cols="30" rows="10" name="description" >' . $description . '</textarea>
                    <label for="categories">Catégories</label>
                    <select name ="categories" required="required" class="form-control">
                            <option value="toutes categories" selected="selected">Toutes les catégories</option>
                            <option value="animaux">Animaux</option>
                            <option value="petitstravaux">Petits travaux</option>
                            <option value="cours" >Cours</option>
                            <option value="enfants">Garde d\'enfants</option>
                            <option value = "déménagement">Déménagement</option>
                    </select>
                    <label for="localisation">Localisation</label>
                    <input type="text" name="localisation" placeholder="ville" required="required" class="form-control"/>
                    <label for = "price">Prix</label>
                    <input type = "number" name = "price" value = "' . $price . '"/> €
                    <input type = "submit" value = "Envoyer" name = "editpost"/>
                    </form>';
        }
        ?>
    </body>
</html>
