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
            <input type="text" name ="pseudo" required="required"/>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp" required="required"/>
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar" required="required"/>
            <label for="genre">Genre</label>
            <div><input type="radio" name="genre" value="feminin" required="required"/>Féminin
                <input type="radio" name="genre" value="masculin" required="required"/>Masculin</div>
            <label for="age">Age</label>
            <input type="number" name="age"/>
            <label for="nom">Nom</label>
            <input type="text" name="nom"/>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom"/>
            <label for="CP">CP</label>
            <input type ="number" name="CP"/>
            <label for="ville">Ville</label>
            <input type="text" name="ville"/>
            <label for="mail">Mail</label>
            <input type="email" name="mail"/>
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone"/>
            <input type="submit" name="inscription" value="Valider" />


        </form>
    </body>
</html>
