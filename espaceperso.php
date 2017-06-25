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
        include_once 'classes/User.php';
        session_start();

        if (isset($_SESSION['nom'])) {
            $user = $_SESSION ['nom'];

            if (is_file('utilisateur/' . $user . '.txt')) {
                $contenu = unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
                echo $contenu->showHtml();
                echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
            }
        } else {
            echo'
        <form method="POST" action="login.php">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo"/>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp"/>
            <input type="submit" name="login"/>
        </form>';
        }
        ?>
    </body>
</html>
