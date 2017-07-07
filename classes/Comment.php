<?php

class Comment {

    private $author;
    private $article;
    private $texte;
    private $note;
    private $title;
    private $destinataire;
    private $date;

    function __construct($title, $texte, $note, User $author, Post $article, $destinataire) {
        $this->author = $author->getPseudo();
        $this->article = $article->getTitle();
        $this->texte = $texte;
        $this->note = $note;
        $this->title = $title;
        $this->destinataire = $destinataire;
        $this->date = new DateTime();
    }

    function getDate() {
        return $this->date->format('dmyhis');;
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

    function getDestinataire() {
        return $this->destinataire;
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

    function setDestinataire($destinataire) {
        $this->destinataire = $destinataire;
    }

    public function asHtml() {
        return '<br/><pre><h3>titre : ' . $this->getTitle() . '</h3></pre><pre> note : ' .
                $this->getNote() . '</pre><pre>' .
                $this->getTexte() . '</pre><pre>auteur : ' .
                $this->getAuthor() . '</pre><pre>destinataire : ' .
                $this->getDestinataire() . '</pre>';
    }

}

