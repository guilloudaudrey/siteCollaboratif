<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
        session_start();
        if (!isset($_SESSION['nom'])){
        ?>
        
        <form method="POST" action="login.php">
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo"/>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp"/>
            <input type="submit" name="login"/>
        </form>
        <?php } else {
            echo 'Bonjour '.$_SESSION['nom'];
            echo '<form action="logout.php" method="POST"><button>Se déconnecter</button></form>';
        }
?>
    </body>
</html>