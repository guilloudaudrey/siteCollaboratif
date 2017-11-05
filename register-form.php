<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    </head>

    <?php
    include_once 'html/header.php';
    ?>
    <body>
        <div class="container">
            <div class="container espacepersocont ">
                <h1>Inscription</h1>
                <form action="register.php" method="POST" class="col-lg-8 col-lg-offset-2">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" name ="pseudo" required="required" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" required="required" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input type="radio" name="genre" value="feminin" required="required"/>Féminin
                        <input type="radio" name="genre" value="masculin" required="required" />Masculin
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" name="age" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="CP">CP</label>
                        <input type ="number" name="CP" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" name="ville" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="email" name="mail" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="text" name="telephone" class="form-control"/>
                    </div>
                    <input type="submit" name="inscription" value="Valider"  class="btn btn-primary" />


                </form>
            </div>
        </div>
        <?php
        include_once 'html/footer.php';
        ?>
    </body>
</html>
