<?php 
session_start();
try {
	$connexion=new PDO("mysql:host=localhost;dbname=logins", "root", "");
} catch (PDOException $e) {
	echo "la connexion à la bdd a echoué";

}


?>
<?php 
//On recupere les valeurs du formulaire
if (isset($_POST["modifier"])) 
{
		$idd=$_POST["id"];
		$nom_complet=$_POST["nom_complet"];
		$date_reservation=$_POST["date_reservation"];
		$heure=$_POST["heure"];
		$salle=$_POST["salle"];
		$date_ligne = date('Y-m-d H:i:s');
		$sql = "UPDATE reservation SET nom_complet = '$nom_complet', date_reservation='$date_reservation', heure='$heure', salle='$salle', date_ligne='$date_ligne' WHERE id='$idd' ";
		$res=$connexion->query($sql);
		echo "$sql";
		if($res){
		    echo 'Modification effectué';
		    //Redirection vers le listing
		    header("Location:raci.php");
		   
		}
}

 ?>
 <?php
if (isset($_POST["modifier"])){
	$_SESSION["nom_complet"]=$_POST["nom_complet"];
	$_SESSION["date_reservation"]=$_POST["date_reservation"];
	$_SESSION["heure"]=$_POST["heure"];
	$_SESSION["salle"]=$_POST["salle"];
	$_SESSION["idd"]=$_POST["id"];

	


}
if (isset($_POST["edit"])) 
{
		$idd=$_POST["id_salle"];
		
		$allsalle=$_POST["allsalle"];
		$nb=$_POST["nb"];
		$sql = "UPDATE allsalle SET allsalle = '$allsalle',nb='$nb' WHERE id_salle='$idd' ";
		$res=$connexion->query($sql);
		echo "$sql";
		if($res){
		    echo 'Modification effectué';
		    //Redirection vers le listing
		    header("Location:gestionRes.php");
		   
		}
	}?>
