<?php

class Comment {

    private $author;
    private $article;
    private $texte;
    private $note;
            
            function __construct($texte, $note, User $author, Post $article) {
        $this->author = $author->getPseudo();
        $this->article = $article->getTitle();
        $this->texte = $texte;
        $this->note = $note;
    }
    
    function getAuthor() {
        return $this->author;
    }

    function getArticle() {
        return $this->article;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setArticle($article) {
        $this->article = $article;
    }


}
