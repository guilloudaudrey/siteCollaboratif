<?php

class User {

    private $pseudo;
    private $mdp;
    private $avatar;
    private $genre;
    private $age;
    private $dateinscription;

    function __construct($pseudo, $mdp, $avatar, $genre, $age) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->avatar = $avatar;
        $this->genre = $genre;
        $this->age = $age;
        $this->dateinscription = new DateTime();
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function getGenre() {
        return $this->genre;
    }

    function getAge() {
        return $this->age;
    }

    function getDateinscription() {
        return $this->dateinscription;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    function setGenre($genre) {
        $this->genre = $genre;
    }

    function setAge($age) {
        $this->age = $age;
    }

    public function getData() {
        return $this->mdp;
    }

    public function asHtml() {
        return '<pre>Pseudo : ' . $this->getPseudo() . '</pre><pre><img src="' .
                $this->getAvatar() . '"></pre><pre>' .
                $this->getGenre() . '</pre><pre>' .
                $this->getAge() . '</pre><pre>'. 
                $this->getDateinscription()->format('d/m/y') . '</pre>';
    }

}
