<?php

class Post {

    protected $title;
    protected $categorie;
    protected $photo;
    protected $date;
    protected $description;
    protected $localisation;
    protected $price;
    protected $author;

            
            
                function __construct($title, $photo, $description, $price, User $author, $categorie) {
        $this->title = $title;
        $this->photo = $photo;
        $this->date = new DateTime();
        $this->description = $description;
        $this->price = $price;
        $this->author = $author->getPseudo();
        $this->categorie = $categorie;
    }

    function getTitle() {
        return $this->title;
    }

    function getCategorie() {
        return $this->categorie;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getDate() {
        return $this->date;
    }

    function getDescription() {
        return $this->description;
    }

    function getLocalisation() {
        return $this->localisation;
    }

    function getPrice() {
        return $this->price;
    }

    function getAuthor() {
        return $this->author;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setLocalisation($localisation) {
        $this->localisation = $localisation;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setAuthor($author) {
        $this->author = $author;
    }
    
        public function asHtml() {
        return '</pre><pre><img src="' .
                $this->getPhoto() . '"></pre><pre>' .
                $this->getDescription() . '</pre><pre>' .
                $this->getPrice() . ' €</pre><pre>' .
                $this->getDate()->format('d/m/y H:i') . '</pre><pre>Auteur : ' .
                $this->getAuthor() . '</pre><pre>Catégories : ' .
                $this->getCategorie() . '</pre>';
    }

}
