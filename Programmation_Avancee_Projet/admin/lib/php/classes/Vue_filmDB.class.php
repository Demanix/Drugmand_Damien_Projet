<?php

class Vue_filmDB extends Vue_film{

    private $_db;
    private $_filmArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getFilmById($id){
        try {
            $query = "SELECT * FROM vue_film where id_projection =:id_projection";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }
    
    public function getListeTousFilms() {
        try {
            $query = "SELECT * FROM vue_film order by nom, heure_diffusion";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $data = $resultset->fetchAll();
            
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if($data!=null)
        {
            while ($data = $resultset->fetch()) {
                try {
                    $_filmArray[] = new Vue_film($data);
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
            return $_filmArray;
        }
        else
        {
            return null;
        }
    }

}
