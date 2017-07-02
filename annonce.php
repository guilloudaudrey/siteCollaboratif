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
        include_once 'classes/DataBase.php';
        include_once 'classes/Post.php';
        include_once 'classes/User.php';
        $newdb = new DataBase();

        if (isset($_POST['filename'])) {
            $file = htmlspecialchars($_POST['filename']);
            $post = $newdb->readPost($file);
            $author = $post->getAuthor();
            echo $post->asHtml()
                    . '<pre><button>Envoyer un message</button></pre>'
                    . '<pre><button>Afficher le numéro</button></pre><br/>';
            ?>
        
        <h2>Avis</h2>
        <p>Soyez le premier à déposer un avis sur cette annonce.</p>
        <textarea cols="40" rows="10"></textarea>
        <button>Ajouter un avis</button><br/>
        
        <?php
            
            
            
    
                echo '<p>'.$author .'<button>Voir le profil</button><p>';
              
         
        }
        ?>
    </body>
</html>
