<?php 
try {
	$connexion=new PDO("mysql:host=localhost;dbname=logins", "root", "");
} catch (PDOException $e) {
	echo "la connexion à la bdd a echoué";
}
 ?>
	<?php
	if(isset($_GET["id"]))
    {
		$id=$_GET['id'];
		echo "$id";
		$sql="DELETE FROM reservation WHERE id= $id ";
		echo "$sql";
		$res=$connexion->query($sql);
		if($res){
			echo "suppression effectué";
			header("Location:gestion.php");
		}
	}

	if(isset($_GET["id_salle"]))	{
		$id_salle=$_GET['id_salle'];
		
		$sql="DELETE FROM allsalle WHERE id_salle= $id_salle ";
		echo "$sql";
		$res=$connexion->query($sql);
		if($res){
			echo "suppression effectué";
			header("Location:gestionRes.php");
		}
	}
	 

	 ?>