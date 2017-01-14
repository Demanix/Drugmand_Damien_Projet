<?php

class Salle {
    private $_attributs = array();

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    //hydrate
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    //getters
    public function __get($nom) {
        if (isset($this->_attributs[$nom])) {
            return $this->_attributs[$nom];
        }
    }

    //setters
    public function __set($nom, $valeur) {
        $this->_attributs[$nom] = $valeur;
    }

}
