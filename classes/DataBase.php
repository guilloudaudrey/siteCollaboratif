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
    
    //affichage de l'annonce

    public function showPost(Post $post) {
        return '</pre><pre><img src="' .
                $post->getPhoto() . '"></pre><pre>' .
                $post->getDescription() . '</pre><pre>' .
                $post->getPrice() . '</pre><pre>' .
                $post->getDate()->format('d/m/y H:i') . '</pre><pre>'.
                $post->getAuthor() .'</pre>';
    }

}
