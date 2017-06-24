<?php

class User {

    private $pseudo;
    private $mdp;
    private $diplomes;
    private $avatar;
    private $genre;
    private $age;
    private $evaluation;

    function __construct($pseudo, $mdp, $avatar, $genre, $age) {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
        $this->avatar = $avatar;
        $this->genre = $genre;
        $this->age = $age;

    }

    public function serialize() {
        if (!is_dir('utilisateur')) {
            mkdir('utilisateur');
        }
        $userdata = serialize($this);
        $file = fopen('utilisateur/' . $this->pseudo . '.txt', 'w');
        fwrite($file, $userdata);
        fclose($file);
    }

    public function showHtml() {
        return '<pre>Pseudo : '.$this->pseudo.'</pre><pre><img src="'.
                                $this->avatar.'"></pre><pre>'.
                                $this->genre.'</pre><pre>'.
                                $this->diplomes.'</pre><pre>'.
                                $this->age.'</pre>';
        
    }

}
