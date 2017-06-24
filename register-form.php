<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            form{
                display: flex;
                flex-direction: column;
                width: 50%;
            }
            
            label{
               margin-top: 20px;
               margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <h1>INSCRIPTION</h1>
        <form action="register.php" method="POST">
            <label for="pseudo">Pseudo</label>
            <input type="text" name ="pseudo"/>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp"/>
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar"/>
            <label for="genre">Genre</label>
            <div><input type="radio" name="genre" value="feminin"/>Féminin
                <input type="radio" name="genre" value="masculin"/>Masculin</div>
            <label for="age">Age</label>
            <input type="number" name="age"/>
            <label for="evaluation">Evaluation</label>
            <input type="submit" name="inscription" value="Valider" />
            

        </form>
    </body>
</html>
