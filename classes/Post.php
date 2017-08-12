<?php

class Post {

    protected $title;
    protected $categorie;
    protected $date;
    protected $description;
    protected $localisation;
    protected $price;
    protected $author;
    protected $typeannonce;
    protected $id;
            

    function __construct($title, $description, $price, $author, $categorie, $localisation, $typeannonce, $id=NULL) {
        $this->title = $title;
        $this->date = date("Y-m-d à H:i");
        $this->description = $description;
        $this->price = $price;
        $this->author = $author;
        $this->categorie = $categorie;
        $this->localisation = $localisation;
        $this->typeannonce = $typeannonce;
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    
    function getTitle() {
        return $this->title;
    }

    function getCategorie() {
        return $this->categorie;
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

    function getTypeannonce() {
        return $this->typeannonce;
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
        return
                '<figure class="pull-left col-sm-5 col-md-5">'
                . '<div><img src="images/travaux.png" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                . '<h3>' . $this->getTitle() . '</h3>'
                . '<p>' . $this->getDescription() . '</p>'
                . '<p>' . $this->getPrice() . ' €</p>'
                . '<p>Posté le ' . $this->getDate(). ' par ' . $this->getAuthor() . '</p>'
        ;
    }

    public function asHtmlAnnonce() { 
        return '<div class="row" style="background: yellow"><h3>' . $this->getTitle() . '</h3></div>' 
                . '<div class="card col-lg-9" style="margin-top: 15px"><figure class="pull-left col-sm-5 col-md-5">'
                . '<div><img src="images/travaux.png" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                . '<span class="label label-warning" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px>' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                . '<p>' . $this->getDescription() . '</p>'
                . '<p>' . $this->getPrice() . ' €</p>'
                . '<p>Posté le ' . $this->getDate() . ' par ' . $this->getAuthor() . '</p></div>'
        ;
    }

}