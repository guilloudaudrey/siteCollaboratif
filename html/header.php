
<nav class="navbar navbar-default navbar-fixed-top topnav .navbar-expand{-sm}" role="navigation">
    <div class="container topnav ">
        <div class="navbar-header col-md-12 col-lg-12 col-sm-12" >
            <a class="navbar-brand " href="index.php">HLP</a>
        
        <?php
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (!isset($_SESSION['nom'])) {
            ?>
            <ul class="nav navbar-nav col-lg-6" >
                <li class="pull-right"><a href="register-form.php">S'inscrire</a></li>
                <li class="pull-right"><a href="#?w=500" rel="popup_name" data-toggle="modal" data-target="#myModal">Se connecter</a></li>
            </ul>
            <?php
        } else {
            ?>
            <div class="col-lg-5 col-md-7 col-sm-5 pull-right"><div class="col-lg-4 col-md-6 col-sm-4" style="margin-top: 14px"> Bonjour <?php echo $_SESSION['nom'] ?> !</div>
                <form action="logout.php" method="POST" class="col-lg-4 pull-right" style="margin-top: 8px; text-align: center">
                    <button class="btn btn-default ">Se déconnecter</button>
                </form>
                <div class="col-lg-4 pull-right" style="margin-top: 8px"><a class = "btn btn-default" href="espaceperso.php" role="button">Espace personnel</a></div>
            </div>
            <?php
        }
        ?>
    </div>
    </div>
</nav>


<!-------------------------------------fenêtre pop up connexion----------------------------------->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Connexion</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="login.php">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="pseudo">Pseudo</label>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="pseudo" aria-describedby="basic-addon1" class="form-control"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-3" >
                            <label for="mdp">Mot de passe</label>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name="mdp" aria-describedby="basic-addon1" class="form-control"/>
                        </div>
                    </div>
                    <div  style="text-align: center; margin-top: 20px" >
                        <input type="submit" name="login" class="btn btn-primary"/>
                        <input type="hidden" name="url" value="<?php echo $url; ?>"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>



