<?php
header('Content-Type: application/json');
require '../dbConnect.php';
require '../classes/connexion.class.php';
require '../classes/JsonFilmDB.class.php';

$cnx = Connexion::getInstance($dsn, $user, $pass);

try {
    $search = new JsonFilmDB($cnx);
    $retour = $search->getFilm($_GET['nom']);
    print json_encode($retour);
} catch (PDOException $e) {
    
}