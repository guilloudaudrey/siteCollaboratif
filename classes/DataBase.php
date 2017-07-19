<?php

class DataBase {

/////////////////// CREATE //////////////////// 
//
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
        $file = fopen('posts/' . $post->getDatetitre() . '.txt', 'w');
        fwrite($file, $postdata);
        fclose($file);
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

////////////////////////// READ ///////////////////////////////
//
//unserialize user

    public function readUser($user): User {
        return unserialize(file_get_contents('utilisateur/' . $user . '.txt'));
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
