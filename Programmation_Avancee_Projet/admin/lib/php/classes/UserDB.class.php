<?php

class UserDB{
    private $_db;
    
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
            /*$query="select insert_client(:nom_client,:prenom_client,:email_client,:login,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':nom_client',$nom);
            $sql->bindValue(':prenom_client',$prenom);
            $sql->bindValue(':email_client',$email);
            $sql->bindValue(':login',$login);
            $sql->bindValue(':password',md5($password));
            $sql->execute();
            $retour = $sql->fetchcolumn(0);*/
            
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
}