
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav ">
        <div class="navbar-header col-md-9 col-lg-6" >
            <a class="navbar-brand " href="index.php">HLP</a>
        </div>
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
            echo '<div class="col-lg-5 col-md-7 pull-right"><div class="col-lg-4" style="margin-top: 14px"> Bonjour ' . $_SESSION['nom'] . ' !';
            echo '</div><form action="logout.php" method="POST" class="col-lg-4 pull-right" style="margin-top: 8px; text-align: center"><button class="btn btn-default ">Se déconnecter</button></form>';
            echo '<div class="col-lg-4 pull-right" style="margin-top: 8px"><a class = "btn btn-default" href="espaceperso.php" role="button">Espace personnel</a></div></div>';
            ;
        }
        ?>
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
                    <div class="container">
                        <div class="row main">
                            <div class="main-login main-center">
                                <div class="form-group col-lg-12">
                                    <label for="pseudo" class="col-sm-1 col-lg-2 control-label">Pseudo</label>
                                    <div class="cols-sm-10 col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                            
                                            <input type="text" name="pseudo" class="form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="mdp" class="col-sm-1 col-lg-2 control-label">Mot de passe</label>
                                    <div class="cols-sm-10 col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                            <input type="password" name="mdp" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" class="col-sm-2 control-label">
                                    <input type="submit" name="login"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="url" value="<?php echo $url; ?>"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


