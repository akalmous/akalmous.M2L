<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header("location:connexion.php");
}
try {
$connexion=new PDO("mysql:host=localhost;dbname=logins", "root", "");
}catch (PDOException $e) {
echo "la connexion à la bdd a echoué";
}
?>
<h3>cette page permet de chercher les réservations </h3>
<h6>pas encore faite </h6>