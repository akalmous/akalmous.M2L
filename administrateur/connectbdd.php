<?php
//1. Connexion à la base de données
try {
    $connexion = new PDO("mysql:host=localhost;logins", "root", "");
    
}catch(PDOException $e){
    echo 'La connexion à la bdd a echoué';
}?>