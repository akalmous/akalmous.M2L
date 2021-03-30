<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header("location:connexion.php");
}
$res='';
try {
$connexion=new PDO("mysql:host=localhost;dbname=logins", "root", "");
}catch (PDOException $e) {
echo "la connexion à la bdd a echoué";
}?>
<!DOCTYPE html>
<html>
<head>
	<title>présentation</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="styleC.css">
	<script src="https://kit.fontawesome.com/d57bd52145.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">		
</head>
	<body style="background-color:black;">
	<nav>
        <div>
            <ul>
                <li><a href="m2lA.php"><img width="60" src="1111.png" ></a></li>
                <li><a href="m2lA.php">Accueil</a></li>
                <li><a href="presentation.php">présentation</a></li>
                <li><a href="gestionRes.php">reservation</a></li>   
                <li><a href="message.php">Contact</a></li>
                <li><a href="gestion.php">Gestion</a></li>
                <li> <a href="#"style="color: white" ><?php echo $_SESSION["login"];?> </li></a>
                <li><a href="deconnect.php">déconnecter</a></li>
            </ul>
        </div>
    </nav>

	<?php

$req="SELECT * FROM reservation order by id ";
$resultat=$connexion->query($req);
 ?>

<br>
<div style ='margin: 0 auto'>
	<form method="POST" action="gestion.php" class="search">

		<input type="varchar" name="nom_complet" placeholder="le nom du résérvateur">
		
		<input type="date" name="date_reservation" placeholder="le jour de résérvation">

		 <select   name="salle"> 
        <?php
        $sql="SELECT allsalle FROM allsalle ";
        $res=$connexion->query($sql);?>
        <option value="">Nom de la salle</option>
        <?php while ($row=$res->fetch(PDO::FETCH_ASSOC)):  ?>

          <option> <?php echo  $row["allsalle"];?></option>

        <?php endwhile ?> 

		<input type="submit" name="chercher" value='chercher'>
	</form>


</div>
		<H1 style="text-align: center; color: #d9be92 " class='title' > toutes les résérvations</H1>
		<?php if(!isset($_POST["chercher"])){ ?>
		<table>
			<tr>
				
				<th>Nom complet du résérvateur</th>
				<th>nom de la salle </th>
				<th>date résérvé</th>
				<th>heure</th>
				<th>Actions</th>
			</tr>
			<tr>
				<?php 

					while ($row=$resultat->fetch(PDO::FETCH_ASSOC)):

					
				  ?>
				
				
				
				<td> <?php echo  $row["nom_complet"];?> </td>
				<td><?php echo  $row["salle"];?></td>
				<td><?php echo  $row["date_reservation"];?></td>
				<td><?php echo  $row["heure"];?></td>
				
				<td class="supprimer">
					<a href="supprimer.php?id=<?php echo $row['id']?>"onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette résérvation?'));"><i class="fas fa-ban"></i></a>
					<a href="form_edit.php?id=<?php echo $row['id']?>"> <i class="far fa-edit"></i></a>
				</td> 
				
				
				
			</tr>
				<?php endwhile; } ?>
</table>

				<?php 

				 if	(isset($_POST["chercher"])){				
				$nom_complet=($_POST["nom_complet"]);
				$date_reservation=($_POST["date_reservation"]);
				$salle=($_POST["salle"]);
				

		//$niveau=($_GET["niveauAdh"]);
			// requete 
		$sql="SELECT * FROM reservation WHERE ";

		if(isset($nom_complet)){
			$sql.=" nom_complet LIKE '%".$nom_complet."%'";
		}
		if(isset($date_reservation)){
			$sql.="AND date_reservation LIKE '%".$date_reservation."%'";
		} 
		if(isset($_POST["salle"])){
			$salle=($_POST["salle"]);
			$sql.="AND salle LIKE '%".$salle."%'";
		}
		
		$res=$connexion->query($sql); 
				 
					$count = $res->rowCount();
					
					
		?>
					<table>
			<tr>
				
				<th>Nom complet du résérvateur</th>
				<th>nom de la salle </th>
				<th>date résérvé</th>
				<th>date résérvé</th>
				<th>Actions</th>
			</tr>
			<tr><?php
				if ($count>0) {
						?>
				<?php 
				while ($row=$res->fetch(PDO::FETCH_ASSOC)):
					
				  ?>
				
				
			
				<td> <?php echo  $row["nom_complet"];?> </td>
				<td><?php echo  $row["salle"];?></td>
				<td><?php echo  $row["date_reservation"];?></td>
				<td><?php echo  $row["heure"];?></td>
				
				<td class="supprimer">
					<a href="supprimer.php?id=<?php echo $row['id']?>"onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette résérvation?'));"><i class="fas fa-ban"></i></a>
					<a href="form_edit.php?id=<?php echo $row['id']?>"> <i class="far fa-edit"></i></a>
				</td> 
				
				
				
			</tr>
			<?php endwhile;
			 		}
			 		else{
			 			echo "<td style='color:red'><h5>aucune résérvation avec ses critéres</h5></td>";
			 		}
			 		}

				
			
				
				?>
		</table>
		</section>
		<form method="POST">
		<input type="submit" name="supprimertout" value='supprimer toutes les résérvations' style="background-color: #d9be92;" class="input" onclick="return(confirm('Etes-vous sûr de vouloir supprimer toutes les résérvations?'));">
	</form>
	
</body>
</html>
<?php
if (isset($_POST["ok"])){
	$_SESSION["nom_complet"]=$_POST["nom_complet"];
	$_SESSION["date_reservation"]=$_POST["date_reservation"];
	$_SESSION["heure"]=$_POST["heure"];

	$_SESSION["salle"]=$_POST["salle"];
	


}
if(isset($_POST["supprimertout"]))
    {
		
		$sql = "DELETE FROM `reservation`";
    
        $res=$connexion->query($sql);
        if($res){
			echo "suppression effectué";
			header("Location:gestion.php");
		}
		


	}

?>
<style type="text/css">
	table{
	border-collapse: collapse;
	margin-left: auto;
	margin-right: auto;
	color: white;
}
th,td{
	border-bottom: 1px solid #ddd;
	text-align: center;
	padding: 8px;

}
tr:hover {background-color: #d9be92 ;}
.title{
	font:italic 1.2em "Fira San)s", serif;
	font-size: 4em;
}
.supprimer a{
	color:white;
	background:#d9be92;
	padding:5px 10px;
	border:solid 1px;
	border-radius:3px;
	text-decoration:none;
}
.search input,select{
	width:22%;
	height: 35px;
	margin: 0 10px;
	border-radius: 6px;

}
.search input[type=submit]{
	background-color: #d9be92;
    border-color: white;
    width: 10%;
}
.search input[type=submit]:hover{
  background-color: #A4A4A4;
  color: black;
  }
  .input{
	outline: none;
	background: none;
	border-radius: 10px;
	width: 240px;
	height: 40px;
	font-family: serif;
	color: white;
	font-size: 15px;

}
</style>