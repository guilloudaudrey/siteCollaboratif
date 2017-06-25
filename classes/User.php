<?php

class User {

    private $pseudo;
    private $mdp;
    private $avatar;
    private $genre;
    private $age;
    private $annonces;

    function __construct($pseudo, $mdp, $avatar, $genre, $age) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->avatar = $avatar;
        $this->genre = $genre;
        $this->age = $age;
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

    public function userData() {
        if (!is_dir('utilisateur')) {
            mkdir('utilisateur');
        }
        $userdata = serialize($this);
        $file = fopen('utilisateur/' . $this->pseudo . '.txt', 'w');
        fwrite($file, $userdata);
        fclose($file);
    }

    public function getData() {
        return $this->mdp;
    }

    public function showHtml() {
        return '<pre>Pseudo : ' . $this->pseudo . '</pre><pre><img src="' .
                $this->avatar . '"></pre><pre>' .
                $this->genre . '</pre><pre>' .
                $this->age . '</pre>';
    }

}
