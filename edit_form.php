<!DOCTYPE html>

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
                    <label for="title">Titre</label>
                    <input type="text" name="title" value="' . $title . '"/>
                    <input type="hidden" name="previoustitle" value="' . $title . '"/>
                    <label for="description">Description</label>
                    <textarea cols="30" rows="10" name="description" >' . $description . '</textarea>
                    <label for="price">Prix</label>
                    <input type="number" name="price" value="' . $price . '"/> €
                    <input type="submit" value="Envoyer" name="editpost"/>
                </form>';
        }
        ?>
    </body>
</html>
