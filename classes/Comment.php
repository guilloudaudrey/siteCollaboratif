<?php

class Comment {

    private $author;
    private $article;
    private $texte;
    private $note;
    private $destinataire;
    private $date;
    private $id;
    
                function __construct($texte, $note, User $author, Post $article, $destinataire) {
        $this->author = $author->getPseudo();
        $this->article = $article->getTitle();
        $this->texte = $texte;
        $this->note = $note;
        $this->destinataire = $destinataire;
        $this->date = new DateTime();
        $this->id = $id;
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
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


    function setDestinataire($destinataire) {
        $this->destinataire = $destinataire;
    }

    public function asHtml() {
        return '<div style="background-color :grey"><p>' .
                $this->getTexte() . '</p><p note : ' .
                $this->getNote() . '</p><p>auteur : ' .
                $this->getAuthor() . '</p><p>destinataire : ' .
                $this->getDestinataire() . '</p></div>';
    }

}
