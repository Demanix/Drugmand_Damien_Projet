<?php

class UserDB extends User{
    private $_db;
    //private $_typeArray = array();
    
    public function __construct($db){
        $this->_db = $db;
    }
    
    function isAuthorized($login,$password) {
        $retour = array();
        try {
            $query="select verifier_connexion(:login,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':login',$login);
            $sql->bindValue(':password',md5($password));
            $sql->execute();
            $retour = $sql->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
    
    function insert($nom,$prenom,$email,$login,$password) {
        try {            
            $query="select insert_client(:nom_client,:prenom_client,:email_client,:login,:password)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$nom,PDO::PARAM_STR);
            $resultset->bindValue(2,$prenom,PDO::PARAM_STR);
            $resultset->bindValue(3,$email,PDO::PARAM_STR);
            $resultset->bindValue(4,$login,PDO::PARAM_STR);
            $resultset->bindValue(5,md5($password),PDO::PARAM_STR);
            $resultset->execute();
            $retour = $resultset->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
    
    function update($id_client,$nom,$prenom,$email,$login,$password) {
        try {            
            $query="select update_client(:id_client,:nom_client,:prenom_client,:email_client,:login,:password)";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$id_client,PDO::PARAM_INT);
            $resultset->bindValue(2,$nom,PDO::PARAM_STR);
            $resultset->bindValue(3,$prenom,PDO::PARAM_STR);
            $resultset->bindValue(4,$email,PDO::PARAM_STR);
            $resultset->bindValue(5,$login,PDO::PARAM_STR);
            $resultset->bindValue(6,md5($password),PDO::PARAM_STR);
            $resultset->execute();
            $retour = $resultset->fetchcolumn(0);
        } catch (Exception $ex) {
            print $ex->getMessage();
        }
        return $retour;
    }
    
    public function getClient($id) {
        $_typeArray = array();
        try {
            $query = "SELECT * FROM client where id_client=:id";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1,$id,PDO::PARAM_INT);
            $resultset->execute();
            $data = $resultset->fetchAll();

            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_typeArray = new User($data);
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_typeArray;
    }
}