<?php

class SalleDB extends Salle{

    private $_db;
    private $_salleArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getSalle() {
        try {
            $query = "SELECT * FROM salle";
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
                    $_salleArray[] = new Salle($data);
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
            return $_salleArray;
        }
        else
        {
            return null;
        }
    }

}
