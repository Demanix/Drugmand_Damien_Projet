<?php

class FilmDB extends Film{
    private $_db;
    private $_typeArray = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    function insert($id_diffusion,$nom,$prix,$description,$duree,$image) {
        try {            
            $query="select insert_film(:id_diffusion,:nom,:prix,:description,:duree,:image)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$id_diffusion,PDO::PARAM_INT);
            $resultset->bindValue(2,$nom,PDO::PARAM_STR);
            $resultset->bindValue(3,$prix,PDO::PARAM_INT);
            $resultset->bindValue(4,$description,PDO::PARAM_STR);
            $resultset->bindValue(5,$duree,PDO::PARAM_INT);
            $resultset->bindValue(6,$image,PDO::PARAM_STR);
            $resultset->execute();
            $retour = $resultset->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
    
    function delete($id_projection) {
        try {            
            $query="select delete_film(:id_projection)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$id_projection,PDO::PARAM_INT);
            $resultset->execute();
            $retour = $resultset->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
    
    function update($id_projection,$nom,$prix,$description,$duree,$image) {
        try {            
            $query="select update_film(:id_projection,:nom,:prix,:description,:duree,:image)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$id_projection,PDO::PARAM_INT);
            $resultset->bindValue(2,$nom,PDO::PARAM_STR);
            $resultset->bindValue(3,$prix,PDO::PARAM_INT);
            $resultset->bindValue(4,$description,PDO::PARAM_STR);
            $resultset->bindValue(5,$duree,PDO::PARAM_INT);
            $resultset->bindValue(6,$image,PDO::PARAM_STR);
            $resultset->execute();
            $retour = $resultset->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
}