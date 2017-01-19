<?php

class TicketDB extends Ticket{
    private $_db;
    //private $_typeArray = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    function insert($id_client,$id_projection,$nb_ticket) {
        try {            
            $query="select insert_ticket(:id_client,:id_projection,:nb_ticket)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$id_client,PDO::PARAM_INT);
            $resultset->bindValue(2,$id_projection,PDO::PARAM_INT);
            $resultset->bindValue(3,$nb_ticket,PDO::PARAM_INT);
            $resultset->execute();
            $retour = $resultset->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
    
    function verifsiclient($id_projection) {
        try {            
            $query="select count(id_projection) from ticket where id_projection=:id_projection;";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$id_projection,PDO::PARAM_INT);
            $resultset->execute();
            $retour = $resultset->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
}