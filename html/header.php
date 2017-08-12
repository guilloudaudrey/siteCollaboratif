<nav class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">HLP</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class=" dropdown"><a href="#annonces" class="dropdown-toggle ">Annonces </a></li>              
                        <li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" >Rechercher </a></li>       
                        <li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Poster </a></li>              
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <?php
                        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                        if (!isset($_SESSION['nom'])) {
                            ?>

                                       
                            <li class=" dropdown"><a href="#?w=500" rel="popup_name" data-toggle="modal" data-target="#myModal">Se connecter </a></li>              

                        </ul>
                    <?php } else {
                        ?>

                        <div class="col-lg-4" style="margin-top: 14px"> Bonjour <?php echo $_SESSION['nom'] ?>!</div>
                        <form action="logout.php" method="POST" class="col-lg-4 pull-right" style="margin-top: 8px; text-align: center"><button class="btn btn-default ">Se déconnecter</button></form>
                        <div class="col-lg-4 pull-right" style="margin-top: 8px"><a class = "btn btn-default" href="espaceperso.php" role="button">Espace personnel</a></div>    
                    <?php }
                    ?>

                </div>
            </div>
        </nav>
    </div>
</nav>






<!-------------------------------------fenêtre pop up connexion----------------------------------->

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" >
            
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <div class="modal-body">
                <form method="POST" action="login.php">
                    <label for="pseudo">Pseudo</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Pseudo" required autofocus>
                    <label for="mdp">Mot de passe</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Valider</button>
                    <input type="hidden" name="url" value="<?php echo $url; ?>"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
            <a href="register-form.php" class="forgot-password">
                Pas encore inscrit ? Créez votre compte.
            </a>
        </div>
    </div>
</div>







