<!DOCTYPE html>
<!---->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modification</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    </head>
    <body>
        <?php
            session_start();
        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        include_once 'classes/DataBase.php';
        include_once 'classes/User.php';
        include_once 'classes/Post.php';
        $instance = new DataBase();


            if (isset($_POST['filename'])) {
                $file = htmlspecialchars($_POST['filename']);
                $post = $instance->readPost($file);

                $title = $post->getTitle();
                $description = $post->getDescription();
                $categorie = $post->getCategorie();
                $ville = $post->getLocalisation();
                $price = $post->getPrice();

                include_once 'html/header.php';
                ?>
                <div class="container">
                    <div class="container espacepersocont ">

                        <h1>Modification de l'article</h1>
                        <form action="edit.php" method="POST" class="col-lg-8 col-lg-offset-2">
                            <div class="form-group">
                                <label for="Type">Type</label>
                                <select name ="typeannonce" required="required" class="form-control">
                              
                                    <option value="Offre" selected="selected">Offre</option>
                                    <option value="Demande">Demande</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Titre</label>
                                <input type="text" name="title" value=" <?php echo $title ?>" class="form-control"/>
                                <input type="hidden" name="previoustitle" value="<?php echo $title ?>"/>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>               
                                <textarea class="col-lg-12" rows="10" name="description" ><?php echo $description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories">Catégories</label>
                                <select name ="categories" required="required" class="form-control">
                                    
                                    <option value="animaux">Animaux</option>
                                    <option value="petitstravaux">Petits travaux</option>
                                    <option value="cours" >Cours</option>
                                    <option value="enfants">Garde d\'enfants</option>
                                    <option value = "déménagement">Déménagement</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="localisation">Localisation</label>
                                <input type="text" name="localisation" placeholder="ville" required="required" value=" <?php echo $ville ?>" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for = "price">Prix</label>
                                <input type = "number" name = "price" value = "<?php echo $price ?>" class="form-control"/> 
                            </div>
                            <button class="btn btn-primary" name = "editpost"/>Envoyer</button>


                        </form>
                    </div>
                </div>
                <?php
                include_once 'html/footer.php';
            }
        
        ?>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
