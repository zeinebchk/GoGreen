<?php

class electrique extends vehicule{
    private $vitesse;

    public function __construct($vehicule,$vitesse) {
        parent::__construct($vehicule);
        $this->vitesse = $vitesse;
    }

}
?>