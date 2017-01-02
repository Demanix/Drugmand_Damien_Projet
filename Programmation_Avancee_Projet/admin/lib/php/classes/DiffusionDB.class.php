<?php

class DiffusionDB extends Diffusion{
    private $_db;
    //private $_typeArray = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    function insert($id_salle,$heure_diffusion) {
        try {            
            $query="select insert_diffusion(:id_salle,:heure_diffusion)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$id_salle,PDO::PARAM_INT);
            $resultset->bindValue(2,$heure_diffusion,PDO::PARAM_STR);
            $resultset->execute();
            $retour = $resultset->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
    
    function delete($id_diffusion) {
        try {            
            $query="select delete_diffusion(:id_diffusion)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$id_diffusion,PDO::PARAM_INT);
            $resultset->execute();
            $retour = $resultset->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
}