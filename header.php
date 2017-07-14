
            <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
                <div class="container topnav ">
                    <div class="navbar-header col-md-9 col-lg-6" >
                        <a class="navbar-brand " href="index.php">WebSiteName</a>
                    </div>
                    <?php
                    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    if (!isset($_SESSION['nom'])) {
                        ?>
                        <ul class="nav navbar-nav col-lg-6" >
                            <li class="pull-right"><a href="register-form.php">S'inscrire</a></li>
                            <li class="pull-right"><a href="#?w=500" rel="popup_name" class="poplight">Se connecter</a></li>
                        </ul>
                        <?php
                    } else {
                        echo '<div class="col-lg-5 col-md-7 pull-right"><div class="col-lg-4" style="margin-top: 14px"> Bonjour ' . $_SESSION['nom'] .' !';
                        echo '</div><form action="logout.php" method="POST" class="col-lg-4 pull-right" style="margin-top: 8px; text-align: center"><button class="btn btn-default ">Se déconnecter</button></form>';
                        echo '<div class="col-lg-4 pull-right" style="margin-top: 8px"><a class = "btn btn-default" href="espaceperso.php" role="button">Espace personnel</a></div></div>';
                        ;
                    }
                    ?>
                </div>
            </nav>
 

