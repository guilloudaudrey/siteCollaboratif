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

    function __construct($title, $description, $price, $author, $categorie, $localisation, $typeannonce, $date, $id = NULL) {
        $this->title = $title;
        $this->date = $date;
        $this->description = $description;
        $this->price = $price;
        $this->author = $author;
        $this->categorie = $categorie;
        $this->localisation = $localisation;
        $this->typeannonce = $typeannonce;
        $this->id = $id;
    }

    public function getId() {
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

        if ($this->categorie == "animaux") {
            $image = 'images/paw.png';

            return
                    '<figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<h3>' . $this->getTitle() . '</h3>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté par ' . $this->getAuthor() . '</p>'
            ;
        } else if ($this->categorie == "cours") {
            $image = 'images/book.png';

            return
                    '<figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<h3>' . $this->getTitle() . '</h3>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté par ' . $this->getAuthor() . '</p>'
            ;
        } else if ($this->categorie == "déménagement") {
            $image = 'images/carton.png';

            return
                    '<figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<h3>' . $this->getTitle() . '</h3>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté par ' . $this->getAuthor() . '</p>'
            ;
        } else if ($this->categorie == "petitstravaux") {
            $image = 'images/travaux.png';

            return
                    '<figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<h3>' . $this->getTitle() . '</h3>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté par ' . $this->getAuthor() . '</p>'
            ;
        } else if ($this->categorie == "enfants") {
            $image = 'images/kid.png';

            return
                    '<figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<h3>' . $this->getTitle() . '</h3>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté par ' . $this->getAuthor() . '</p>'
            ;
        }
    }

    public function asHtmlAnnonce() {
        if ($this->categorie == "animaux") {
            $image = 'images/paw.png';
            return '<div class="row" style="text-align: center"><h3>' . $this->getTitle() . '</h3></div>'
                    . '<div class="card col-lg-9" style="margin-top: 15px"><figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté le ' . $this->getDate() . ' par ' . $this->getAuthor() . '</p></div>'
            ;
        } else if ($this->categorie == "cours") {
            $image = 'images/book.png';
            return '<div class="row" style="text-align: center"><h3>' . $this->getTitle() . '</h3></div>'
                    . '<div class="card col-lg-9" style="margin-top: 15px"><figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté le ' . $this->getDate(). ' par ' . $this->getAuthor() . '</p></div>'
            ;
        } else if ($this->categorie == "déménagement") {
            $image = 'images/carton.png';
            return '<div class="row" style="text-align: center"><h3>' . $this->getTitle() . '</h3></div>'
                    . '<div class="card col-lg-9" style="margin-top: 15px"><figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté le ' . $this->getDate(). ' par ' . $this->getAuthor() . '</p></div>'
            ;
        } else if ($this->categorie == "petitstravaux") {
            $image = 'images/travaux.png';
            return '<div class="row" style="text-align: center"><h3>' . $this->getTitle() . '</h3></div>'
                    . '<div class="card col-lg-9" style="margin-top: 15px"><figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté le ' . $this->getDate() . ' par ' . $this->getAuthor() . '</p></div>'
            ;
        } else if ($this->categorie == "enfants") {
            $image = 'images/kid.png';
            return '<div class="row" style="text-align: center"><h3>' . $this->getTitle() . '</h3></div>'
                    . '<div class="card col-lg-9" style="margin-top: 15px"><figure class="pull-left col-sm-5 col-md-5">'
                    . '<div><img src="' . $image . '" class="img-fluid" alt="Responsive image" style="width: 100%;height: auto"></div></figure>'
                    . '<span class="badge" style="margin-right : 5px">' . $this->getTypeannonce() . '</span><span class="badge badge-info" style="margin-right : 5px">' . $this->getCategorie() . '</span><span class="badge badge-info">' . $this->getLocalisation() . '</span>'
                    . '<p>' . $this->getDescription() . '</p>'
                    . '<p>' . $this->getPrice() . ' €</p>'
                    . '<p>Posté le ' . $this->getDate() . ' par ' . $this->getAuthor() . '</p></div>'
            ;
        }
    }

}
