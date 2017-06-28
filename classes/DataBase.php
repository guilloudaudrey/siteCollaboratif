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

//affichage des informations de l'utilisateur

    public function showUser(User $user) {
        return '<pre>Pseudo : ' . $user->getPseudo() . '</pre><pre><img src="' .
                $user->getAvatar() . '"></pre><pre>' .
                $user->getGenre() . '</pre><pre>' .
                $user->getAge() . '</pre>';
    }

//création et stockage d'un nouvel article

    public function createPost(Post $post) {
        if (!is_dir('posts')) {
            mkdir('posts');
        }
        $postdata = serialize($post);
        $file = fopen('posts/' . $post->getTitle() . '.txt', 'w');
        fwrite($file, $postdata);
        fclose($file);
    }

//parcourir les posts

    public function browsePosts() {
        $dossier = './posts/';
        $files = scandir($dossier);
        foreach ($files as $content) {
            if (!is_dir($content)) {
                unserialize(file_get_contents($dossier . $content));
            }
        }
    }

//affichage de l'annonce

    public function showPost(Post $post) {
        return '</pre><pre><img src="' .
                $post->getPhoto() . '"></pre><pre>' .
                $post->getDescription() . '</pre><pre>' .
                $post->getPrice() . '</pre><pre>' .
                $post->getDate()->format('d/m/y H:i') . '</pre><pre>Auteur : ' .
                $post->getAuthor() . '</pre>';
    }

//récupération des propriétés de la classe Post

    public function getAuthor(Post $post) {
        return $post->getAuthor();
    }
    
    public function getTitle(Post $post){
        return $post->getTitle();
    }
    
    public function getDescription(Post $post){
        return $post->getDescription();
    }
    
    public function getPrice(Post $post){
        return $post->getPrice();
    }

    public function getPhoto(Post $post){
        return $post->getPhoto();
    }

//suppression d'une annonce

    public function deletePost($post) {
        unlink('posts/' . $post);
    }

//modification d'une annonce

    public function editPost($previoustitle, $title, $message) {
        unlink('posts/' . $previoustitle . '.txt');
        $fichier = fopen('posts/' . $title . '.txt', 'w');
        fwrite($fichier, $message);
        fclose($fichier);
    }

    public function parcourirDossier() {
        
    }

}
