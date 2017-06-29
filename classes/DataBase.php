<?php

class DataBase {

//création et stockage d'un nouvel utilisateur

    public function createUser(User $user) {
        if (!is_dir('utilisateur')) {
            mkdir('utilisateur');
        }
        $userdata = serialize($user);
        $file = fopen('utilisateur/' . $user->getPseudo() . '.txt', 'w');
        fwrite($file, $userdata);
        fclose($file);
    }

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

//unserialize des données user

    public function readUser($user) : User {
        return unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
    }

//affichage des informations de l'utilisateur
//TODO bouger dans User
    public function showUser(User $user) {
        return '<pre>Pseudo : ' . $user->getPseudo() . '</pre><pre><img src="' .
                $user->getAvatar() . '"></pre><pre>' .
                $user->getGenre() . '</pre><pre>' .
                $user->getAge() . '</pre>';
    }

//création et stockage d'une nouvelle annonce

    public function createPost(Post $post) {
        if (!is_dir('posts')) {
            mkdir('posts');
        }
        $postdata = serialize($post);
        $file = fopen('posts/' . $post->getTitle() . '.txt', 'w');
        fwrite($file, $postdata);
        fclose($file);
    }

//unserialize d'une annonce
    public function readPost($title) : Post {
        $post = unserialize(file_get_contents('posts/' . $title . '.txt'));
        return $post;
    }

//mofication d'un article
//TODO edit = update
    public function editPost(Post $post, $previoustitle) {

        unlink('posts/' . $previoustitle . '.txt');
        $postdata = serialize($post);
        $fichier = fopen('posts/' . $post->getTitle() . '.txt', 'w');
        fwrite($fichier, $postdata);
        fclose($fichier);
    }

//parcourir les posts



//parcourir l'annonce
    public function readPostsList() :Array {
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

    //TODO déplacer dans Post


//récupération des propriétés de la classe Post

    public function getAuthor(Post $post) {
        return $post->getAuthor();
    }

    public function getTitle(Post $post) {
        return $post->getTitle();
    }

    public function getDescription(Post $post) {
        return $post->getDescription();
    }

    public function getPrice(Post $post) {
        return $post->getPrice();
    }

    public function getPhoto(Post $post) {
        return $post->getPhoto();
    }

//suppression d'une annonce

    public function deletePost($post) {
        unlink('posts/' . $post);
    }

}
