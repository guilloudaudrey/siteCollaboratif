<?php

class DataBase {

    private $pdo;

    function __construct() {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=site_services', 'admin1', 'simplon');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'fail to connect DB: ' . $e->getMessage();
            exit(1);
        }
    }

/////////////////// CREATE //////////////////// 
//
//création d'un nouvel utilisateur

    public function createUser(User $user) {
        $mdp = $user->getMdp();
        $genre = $user->getGenre();
        $age = $user->getAge();
        $inscription = $user->getDateinscription()->format('d/m/y');
        $nom = $user->getNom();
        $prenom = $user->getPrenom();
        $cp = $user->getCP();
        $ville = $user->getVille();
        $mail = $user->getMail();
        $telephone = $user->getTelephone();
        $pseudo = $user->getPseudo();


        $stmt = $this->pdo->prepare('INSERT INTO user(mdp, genre, age, inscription, nom, prenom, cp, ville, mail, telephone, pseudo) VALUES(:mdp, :genre, :age, :inscription, :nom, :prenom, :cp, :ville, :mail, :telephone, :pseudo);');
        $stmt->bindValue('mdp', $mdp);
        $stmt->bindValue('genre', $genre);
        $stmt->bindValue('age', $age);
        $stmt->bindValue('inscription', $inscription);
        $stmt->bindValue('nom', $nom);
        $stmt->bindValue('prenom', $prenom);
        $stmt->bindValue('cp', $cp);
        $stmt->bindValue('ville', $ville);
        $stmt->bindValue('mail', $mail);
        $stmt->bindValue('telephone', $telephone);
        $stmt->bindValue('pseudo', $pseudo);

        //$stmt->execute(['mdp' => $mdp, 'genre' => $genre, 'age' => $age, 'inscription' => $inscription, 'nom' => $nom, 'prenom' => $prenom, 'cp' => $cp, 'ville' => $ville, 'mail' => $mail, 'telephone' => $telephone, 'pseudo' => $pseudo]);
        $stmt->execute();
        /*
          if (!is_dir('utilisateur')) {
          mkdir('utilisateur');
          }
          $userdata = serialize($user);
          $file = fopen('utilisateur/' . $user->getPseudo() . '.txt', 'w');
          fwrite($file, $userdata);
          fclose($file); */
    }

//création d'une nouvelle annonce

    public function createPost(Post $post) {
        $title = $post->getTitle();
        $categorie = $post->getCategorie();
        $date = $post->getDate()->format('d/m/y');
        $description = $post->getDescription();
        $localisation = $post->getLocalisation();
        $price = $post->getPrice();
        $author = $post->getAuthor();
        $typeannonce = $post->getTypeannonce();

        $stmt = $this->pdo->prepare('INSERT INTO post(title, categorie, date, description, localisation, price, typeannonce, author) VALUES(:title, :categorie, :date, :description, :localisation, :price, :typeannonce, :author);');
        $stmt->bindValue('title', $title);
        $stmt->bindValue('categorie', $categorie);
        $stmt->bindValue('date', $date);
        $stmt->bindValue('description', $description);
        $stmt->bindValue('localisation', $localisation);
        $stmt->bindValue('price', $price);
        $stmt->bindValue('author', $author);
        $stmt->bindValue('typeannonce', $typeannonce);

        $stmt->execute();

        /* if (!is_dir('posts')) {
          mkdir('posts');
          }

          $postdata = serialize($post);
          $file = fopen('posts/' . $post->getDatetitre() . '.txt', 'w');
          fwrite($file, $postdata);
          fclose($file); */
    }

    //création d'un nouveau commentaire

    public function createComment(Comment $comment) {
        if (!is_dir('comments')) {
            mkdir('comments');
        }

        $commentdata = serialize($comment);
        $file = fopen('comments/' . $comment->getDate() . '.txt', 'w');
        fwrite($file, $commentdata);
        fclose($file);
    }

    //////////////////////// LOGIN /////////////////////////////

    function login($user, $mdp) {
        $login = $this->pdo->query("SELECT COUNT(*) FROM user WHERE pseudo = '" . $user . "';");
        if ($login->fetchColumn() == 0) {
            //Pseudo inexistant
        } else {
            $login_process = $this->pdo->query("SELECT mdp FROM user WHERE pseudo ='" . $user . "' LIMIT 1;");
            $login_data = $login_process->fetch();
            if ($mdp == $login_data['mdp']) {
                return TRUE;
            }
        }
    }

////////////////////////// READ ///////////////////////////////
//
//unserialize user
    public function readUser($user) {
        $stmt = $this->pdo->query('SELECT * FROM user WHERE pseudo="' . $user . '";');
        return $stmt->fetch();
        //return unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
    }

//unserialize annonce
    public function readPost($title): Post {
        $post = unserialize(file_get_contents('posts/' . $title . '.txt'));
        return $post;
    }

//unserialize comment
    public function readComment($comment): Comment {
        return unserialize(file_get_contents('comments/' . $comment . '.txt'));
    }

//parcourir les posts
    public function readPostsList(): Array {
        $dossier = './posts/';
        $files = scandir($dossier);
        $listeAnnonces = [];
        foreach ($files as $content) {
            if (!is_dir($content)) {
                $listeAnnonces[] = unserialize(file_get_contents($dossier . $content));
            }
        }
        return $listeAnnonces;
    }

//parcourir les utilisateurs 
    public function readUsersList(): Array {
        $dossier = './utilisateur/';
        $files = scandir($dossier);
        $listeUsers = [];
        foreach ($files as $user) {
            if (!is_dir($user)) {
                $listeUsers[] = unserialize(file_get_contents($dossier . $user));
            }
        }
        return $listeUsers;
    }

//parcourir les commentaires 
    public function readCommentsList(): Array {
        $dossier = './comments/';
        $files = scandir($dossier);
        $listeComments = [];
        foreach ($files as $comment) {
            if (!is_dir($comment)) {
                $listeComments[] = unserialize(file_get_contents($dossier . $comment));
            }
        }
        return $listeComments;
    }

///////////////////////////// UPDATE /////////////////////////
//
//mofication d'un article
    public function updatePost(Post $post, $previoustitle) {

        unlink('posts/' . $previoustitle . '.txt');
        $postdata = serialize($post);
        $fichier = fopen('posts/' . $post->getDatetitre() . '.txt', 'w');
        fwrite($fichier, $postdata);
        fclose($fichier);
    }

/////////////////////////////// DELETE ////////////////////////
//
//suppression d'une annonce

    public function deletePost($post) {
        unlink('posts/' . $post . '.txt');
    }

}
