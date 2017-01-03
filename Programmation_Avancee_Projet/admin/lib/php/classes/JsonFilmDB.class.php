<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class JsonFilmDB {

    private $_db;

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getFilm($nom) {
        $query = "select * from vue_film where nom=:nom";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $nom, PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_filmArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_filmArray;
    }

}
