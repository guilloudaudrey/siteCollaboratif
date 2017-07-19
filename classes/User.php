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
        return '<div><p>' . $this->getPseudo() . '<img src="images/profil.png" width= 120px></p><p>Inscription : ' .
                $this->getDateinscription()->format('d/m/y') . '</p><p>Sexe : '.
                $this->getGenre() . '</p><p>Age : ' . 
                $this->getAge() . '</p><p>Prénom : '.
                $this->prenom . '</p><p>Nom : '.
                $this->nom . '</p><p>Mail : '.
                $this->mail . '</p><p>Téléphone : ' .
                $this->telephone . '</p><p>CP : ' .
                $this->CP . '</p><p>Ville : ' .
                $this->ville . '</p></div>';
    }

}
