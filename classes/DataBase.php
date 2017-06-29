<?php

class DataBase {

/////////////////// CREATE //////////////////// 
//création d'un nouvel utilisateur

    public function createUser(User $user) {
        if (!is_dir('utilisateur')) {
            mkdir('utilisateur');
        }
        $userdata = serialize($user);
        $file = fopen('utilisateur/' . $user->getPseudo() . '.txt', 'w');
        fwrite($file, $userdata);
        fclose($file);
    }

//création d'une nouvelle annonce

    public function createPost(Post $post) {
        if (!is_dir('posts')) {
            mkdir('posts');
        }
        $postdata = serialize($post);
        $file = fopen('posts/' . $post->getTitle() . '.txt', 'w');
        fwrite($file, $postdata);
        fclose($file);
    }

////////////////////////// READ ///////////////////////////////
//unserialize user

    public function readUser($user): User {
        return unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
    }

//unserialize annonce
    public function readPost($title): Post 
    {
        $post = unserialize(file_get_contents('posts/' . $title . '.txt'));
        return $post;
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
    public function readUsersList() : Array {
        $dossier = './utilisateur/';
        $files = scandir($dossier);
        $listeUsers = [];
        foreach ($files as $user){
            if(!is_dir($user)){
                $listeUsers[] = unserialize(file_get_contents($dossier . $user));
            }
        }
        return $listeUsers;
    }


///////////////////////////// UPDATE /////////////////////////

//mofication d'un article
    public function updatePost(Post $post, $previoustitle) {

        unlink('posts/' . $previoustitle . '.txt');
        $postdata = serialize($post);
        $fichier = fopen('posts/' . $post->getTitle() . '.txt', 'w');
        fwrite($fichier, $postdata);
        fclose($fichier);
    }

  
/////////////////////////////// DELETE ////////////////////////
//suppression d'une annonce

    public function deletePost($post) {
        unlink('posts/' . $post);
    }

    
////////////////////////////// TODO /////////////////////////
    //connexion
    // TODO : remove from this class
    public function connexion($identifiant, $mdp) {
        if (is_file('utilisateur/' . $identifiant . '.txt')) {
            $user = unserialize(file_get_contents('utilisateur/' . $identifiant . '.txt'));
            $mdp_data = $user->getData();

            if ($mdp_data === $mdp) {
                session_start();
                $_SESSION['nom'] = $identifiant;
            } else {
                return 'pas connecté';
            }
        } else {
            return 'l\'utilisateur ' . $identifiant . ' n\'existe pas';
        }
    }


//récupération des propriétés de la classe Post

    public function getAuthor(Post $post) {
        return $post->getAuthor();
    }

 
}
