<?php

$dsn = 'pgsql:host=localhost;dbname=cinema;port=5432';
$user = 'admin_cinema';
$password = 'adci';
try {
    $cnx = new PDO($dsn, $user, $password);
} catch (PDOExecption $e) {
    print 'Connexion impossible';
}
?>