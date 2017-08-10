<?php

class Comment {

    private $author;
    private $article;
    private $texte;
    private $note;
    private $date;
    private $id;
    private $destinataire;
                function __construct($texte, $note, $author, $article, $id = NULL) {
        $this->author = $author;
        $this->article = $article;
        $this->texte = $texte;
        $this->note = $note;
        $this->date = date("Y-m-d à H:i");
        $this->id = $id;
    }

    function getDestinataire() {
        return $this->destinataire;
    }

    function setDestinataire($destinataire) {
        $this->destinataire = $destinataire;
    }
    function setDate($date) {
        $this->date = $date;
    }

    
        function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getDate() {
        return $this->date;
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


    public function asHtml() {
        return '<div style="background-color :grey"><p>' .
                $this->getTexte() . '</p><p note : ' .
                $this->getNote() . '</p><p>auteur : ' .
               $this->getAuthor() . '</p><p>date :'.
                $this->getDate().'</p></div>';
                //$this->getDestinataire() . '</p></div>';
    }

}
