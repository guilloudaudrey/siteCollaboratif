<?php

class User {

    private $pseudo;
    private $mdp;
    private $avatar;
    private $genre;
    private $age;
    private $dateinscription;
    private $nom;  
    private $prenom; 
    private $CP;
    private $ville;
    private $mail;
    private $telephone;

    function __construct($pseudo, $mdp, $avatar, $genre, $age, $nom, $prenom, $mail, $telephone, $CP, $ville) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->avatar = $avatar;
        $this->genre = $genre;
        $this->age = $age;
        $this->dateinscription = new DateTime();
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->telephone = $telephone;
        $this->CP = $CP;
        $this->ville = $ville;
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
        return '<pre>' . $this->getPseudo() . '</pre><pre><img src="images/profil.png" width= 120px></pre><pre>' .
                $this->getDateinscription()->format('d/m/y') . '</pre><pre>Sexe : '.
                $this->getGenre() . '</pre><pre>Age : ' . 
                $this->getAge() . '</pre><pre>Prénom : '.
                $this->prenom . '</pre><pre>Nom : '.
                $this->nom . '</pre><pre>Mail : '.
                $this->mail . '</pre><pre>Téléphone : ' .
                $this->telephone . '</pre><pre>CP : ' .
                $this->CP . '</pre><pre>Ville : ' .
                $this->ville . '</pre>';
    }

}
