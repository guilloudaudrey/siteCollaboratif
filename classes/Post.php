<?php

class Post {
    protected $title;
    protected $categorie;
    protected $photo;
    protected $date;
    protected $description;
    protected $localisation;
    protected $price;
    
    
    function __construct($title, $photo, $description, $price) {
        $this->title = $title;
        $this->photo = $photo;
        $this->date = new DateTime();
        $this->description = $description;
        $this->price = $price;
    }
    
    function getTitle() {
        return $this->title;
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

    function setTitle($title) {
        $this->title = $title;
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

    public function postData() {
        if (!is_dir('posts')) {
            mkdir('posts');
        }
        $postdata = serialize($this);
        $file = fopen('posts/' . $this->title . '.txt', 'w');
        fwrite($file, $postdata);
        fclose($file);
    }
    
    public function showHtml() {
        return '</pre><pre><img src="' .
                $this->photo . '"></pre><pre>' .
                $this->description . '</pre><pre>' .
                $this->price . '</pre>';
    }
        
    }




