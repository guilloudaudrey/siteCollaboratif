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
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
        <script src="js/modernizr.custom.js"></script>
        <script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>

        <title>Index</title>
    </head>
    <body>

        <!-------------------------------------header----------------------------------->

        <?php
        include_once 'html/header.php';
        ?>

        <!-------------------------------------bannière------------------------------------>

        <div class="intro-header" style="margin-bottom: 40px">
            <div class="container">
                <div class="row">
                    <h3 class=" text-ban col-lg-7 col-lg-offset-4"><span class="rouge">Cherchez</span> et <span class="rouge">proposez</span> des services <br>près de chez vous</h3>
                </div>
                <div class="col-lg-5 col-lg-offset-5 col-md-7 col-md-offset-3 col-xs-10 col-xs-offset-1 rechercheinputs" >
                    <div class="row">
                        <form class="recherche col-md-10 col-md-offset-1" style ="margin-top: 40px" method="POST" action="index.php">
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
                                <input type="text" placeholder="Localisation" class="form-control" id="sel4" />
                            </div>
                            <input type="submit" value="Rechercher" name="search" class="btn btn-primary btn-lg" style="margin-bottom: 20px"/>
                        </form>
                    </div>
                </div>



            </div>
            <div class="container">
                <form action="post_form.php" method="POST" class="col-lg-12" style="margin-top: 50px">
                    <input type="submit" class="btn btn-danger navbar-btn  btn-lg col-lg-offset-3" value="Poster une annonce">
                </form>
            </div>
        </div>
    </div>



    <!-------------------------------------affichage des annonces------------------------------------>

    <?php
    include_once 'classes/Post.php';
    include_once 'classes/DataBase.php';
    $db = new DataBase();
    $listeAnnonces = $db->readPostsList();
    //var_dump($listeAnnonces);




    foreach ($listeAnnonces as $annonce) {
        //    $categorie = $annonce->getCategorie();
        ?>
        <div class="container" id="annonces">
            <div class="row">
    
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <div class="card ">
                            <?php
                            echo $annonce->asHtml();
                            ?>
                            <div class="row">
                                <form action="annonce.php" method="GET">
                                    <input type="submit" value="en savoir plus" class="btn btn-outline-info" style="margin-right: 5px">
                                    <button class="like btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span></button>
                                    <input type="hidden" name="filename" value="<?php echo $annonce->getTitle()?>">
                                </form>
                            </div>
                        </div>
                    </div>
           
            </div>
        </div>



        <?php
    }
// }
    ?>
    <div class="loadmore btn btn-danger col-lg-offset-4">
        <a href="#" id="loadMore">Load More</a>
    </div>

    <!-------------------------------------footer------------------------------------>
    <?php
    include_once 'html/footer.php';
    ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>