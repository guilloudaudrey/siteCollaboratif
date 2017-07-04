<?php

class Comment {

    private $author;
    private $article;
    private $texte;
    private $note;
    private $title;
            
            function __construct($title, $texte, $note, User $author, Post $article) {
        $this->author = $author->getPseudo();
        $this->article = $article->getTitle();
        $this->texte = $texte;
        $this->note = $note;
        $this->title = $title;
    }
    
    function getAuthor() {
        return $this->author;
    }

    function getArticle() {
        return $this->article;
    }

    function getTexte() {
        return $this->texte;
    }

    function getNote() {
        return $this->note;
    }

    function getTitle() {
        return $this->title;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

    function setArticle($article) {
        $this->article = $article;
    }

    function setTexte($texte) {
        $this->texte = $texte;
    }

    function setNote($note) {
        $this->note = $note;
    }

    function setTitle($title) {
        $this->title = $title;
    }

   public function asHtml() {
        return '<br/><pre><h3>' . $this->getTitle() . '</h3></pre><pre>'.
                $this->getNote() . '</pre><pre>' .
                $this->getTexte() . '</pre><pre>';
}}
