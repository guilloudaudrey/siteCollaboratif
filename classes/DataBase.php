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

    public function createUser(User $user): bool {
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

        if ($stmt->execute()) {

            $user->setId(intval($this->pdo->lastInsertId()));
            return TRUE;
        }
        return FALSE;
    }

//création d'une nouvelle annonce

    public function createPost(Post $post): bool {
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

        if ($stmt->execute()) {

            $post->setId(intval($this->pdo->lastInsertId()));
            return TRUE;
        }
        return FALSE;
    }

//création d'un nouveau commentaire

    public function createComment(Comment $comment): bool {

        $texte = $comment->getTexte();
        $note = $comment->getNote();
        $date = $comment->getDate();
        $author = $comment->getAuthor();
        $article = $comment->getArticle();

        $stmt = $this->pdo->prepare('INSERT INTO comment(texte, note, date, author, article) VALUES(:texte, :note, :date, :author, :article);');
        $stmt->bindValue('texte', $texte);
        $stmt->bindValue('note', $note);
        $stmt->bindValue('date', $date);
        $stmt->bindValue('author', $author);
        $stmt->bindValue('article', $article);

        if ($stmt->execute()) {

            $comment->setId(intval($this->pdo->lastInsertId()));
            return TRUE;
        }
        return FALSE;
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
    public function readUser($user): User {
        $stmt = $this->pdo->query('SELECT * FROM user WHERE pseudo="' . $user . '";');
        $user = $stmt->fetch();

        $pseudo = $user['pseudo'];
        $mdp = $user['mdp'];
        $genre = $user['genre'];
        $age = $user['age'];
        $nom = $user['nom'];
        $prenom = $user['prenom'];
        $mail = $user['mail'];
        $telephone = $user['telephone'];
        $CP = $user['cp'];
        $ville = $user['ville'];
        $id = $user['id'];

        $newuser = new User($pseudo, $mdp, $genre, $age, $nom, $prenom, $mail, $telephone, $CP, $ville, $id);
        return $newuser;
    }

//unserialize annonce
    public function readPost($title): Post {
        $stmt = $this->pdo->query('SELECT *, post.id as post_id FROM post LEFT JOIN user ON post.author = user.id WHERE title="' . $title . '";');
        //$stmt = $this->pdo->query('SELECT * FROM post INNER JOIN user ON post.author = user.id WHERE title="' . $tit . '";');
        $post = $stmt->fetch();
        $title = $post['title'];
        $categorie = $post['categorie'];
        //$date = $post['date'];
        $description = $post['description'];
        $localisation = $post['localisation'];
        $price = $post['price'];
        $typeannonce = $post['typeannonce'];
        $author = $post['pseudo'];
        $id = $post['post_id'];

        $newpost = new Post($title, $description, $price, $author, $categorie, $localisation, $typeannonce, $id);
        return $newpost;
    }

//unserialize comment
    public function readComment($id): Comment {
        //$stmt = $this->pdo->query('SELECT * FROM comment INNER JOIN user ON comment.author = user.id WHERE id="' . $id . '";');
         $stmt = $this->pdo->query('SELECT * FROM comment INNER JOIN user ON comment.author = user.id INNER JOIN post ON comment.article = post.id  WHERE id="' . $comment . '";');
        $post = $stmt->fetch();
        
        $texte = $post['texte'];
        $note = $post['note'];
        $date = $post['date'];
        $author = $post['pseudo'];
        $article = $post['article'];
        $id = $post['id'];


        $newpost = new Post($texte, $note, $date, $author, $article,  $id);
        return $newpost;
    }

    //    return unserialize(file_get_contents('comments/' . $comment . '.txt'));
//parcourir les posts
    public function readPostsList(): Array {

        $stmt = $this->pdo->query('SELECT * FROM post INNER JOIN user ON post.author = user.id');
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $postslist = [];
        foreach ($posts as $post) {
            $title = $post['title'];
            $categorie = $post['categorie'];
            $date = $post['date'];
            $description = $post['description'];
            $localisation = $post['localisation'];
            $price = $post['price'];
            $typeannonce = $post['typeannonce'];
            $author = $post['pseudo'];
            $id = $post['id'];

            $newpost = new Post($title, $description, $price, $author, $categorie, $localisation, $typeannonce, $id);
            $postslist[] = $newpost;
        }
        return $postslist;
    }

//parcourir les utilisateurs 

    public function readUsersList(): Array {

        $stmt = $this->pdo->query('SELECT * FROM user');
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $userslist = [];
        foreach ($users as $user) {
            $pseudo = $user['pseudo'];
            $mdp = $user['mdp'];
            $genre = $user['genre'];
            $age = $user['age'];
            $nom = $user['nom'];
            $prenom = $user['prenom'];
            $mail = $user['mail'];
            $telephone = $user['telephone'];
            $CP = $user['cp'];
            $ville = $user['ville'];

            $newuser = new User($pseudo, $mdp, $genre, $age, $nom, $prenom, $mail, $telephone, $CP, $ville);
            $userslist[] = $newuser;
        }
        return $userslist;
    }

//parcourir les commentaires 
    public function readCommentsList(): Array {


        $stmt = $this->pdo->query('SELECT * FROM comment INNER JOIN user ON comment.author = user.id ');
        $comms = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $commslist = [];
        foreach ($comms as $comm) {
            $texte = $comm['texte'];
            $note = $comm['note'];
            $date = $comm['date'];
            $author = $comm['pseudo'];
            $article = $comm['article'];



            $newcomm = new Comment($texte, $note, $date, $author, $article);
            $commslist[] = $newcomm;
        }
        return $commslist;
    }

///////////////////////////// UPDATE /////////////////////////
//
//mofication d'un article
    public function updatePost($title, $typeannonce, $description, $localisation, $price, $categories, $previoustitle) {
        $edit = $this->pdo->prepare('UPDATE post SET title = :title, '
                . 'typeannonce = :typeannonce,'
                . 'description = :description,'
                . 'localisation = :localisation,'
                . 'price = :price,'
                . 'categorie = :categorie WHERE title = :previoustitle ');
        $edit->execute(array(
            'title' => $title,
            'typeannonce' => $typeannonce,
            'description' => $description,
            'localisation' => $localisation,
            'price' => $price,
            'categorie' => $categories,
            'previoustitle' => $previoustitle
        ));
    }

/////////////////////////////// DELETE ////////////////////////
//
//suppression d'une annonce

    public function deletePost($title) {
//unlink('posts/' . $post . '.txt');
        $stmt = $this->pdo->prepare('DELETE FROM post WHERE title = :title');
        $stmt->bindValue('title', $title);
        $stmt->execute();
    }

}
