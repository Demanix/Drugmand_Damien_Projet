<?php

class Vue_ticketDB extends Vue_ticket{

    private $_db;

    public function __construct($cnx) {
        $this->_db = $cnx;
    }
    
    public function getTicketById($id_ticket){
        try {
            $query = "SELECT * FROM vue_ticket where id_ticket =:id_ticket";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $id_ticket);
            $resultset->execute();
            $data = $resultset->fetchAll();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        return $data;
    }

}
