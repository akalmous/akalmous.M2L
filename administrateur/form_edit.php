<?php 
session_start();
try {
	$connexion=new PDO("mysql:host=localhost;dbname=logins", "root", "");
} catch (PDOException $e) {
	echo "la connexion à la bdd a echoué";

}
$id=$_GET["id"];
?>
<style>
body{
	margin:0;
	padding: 0;
	font-family: sans-serif;
	background: url(img/edit.jpg) no-repeat;
	background-size: cover;
}
.title{
	font:italic 1.2em "Fira San)s", serif;
	font-size: 4em;
	text-align: center;
	

}
	.menu{
	width: 100%;
	background-color: #555; 
	overflow: auto;

}

.menu a {
	float: left;
	padding: 12px;
	color: white;
	text-decoration: none;
	font-size: 17px;
	width: 23.10%;
}

.menu a:hover {
	background-color: #A4A4A4;
}

.active {
	background-color: #A4A4A4;
}
.form{
	
	display: block;
	padding: 0 40%;

}
.input{
	outline: none;
	background: none;
	border-radius: 10px;
	width: 300px;
	height: 40px;
	font-family: serif;
	
	font-size: 23px;

}


.ajouter{
	width: 250px;
	background: none;
	border: 2px solid #555;
	

	font-size: 18px;
	cursor: pointer;
	height: 40px;
	border-radius: 10px;


}

</style>







<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de modification</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="styleC.css">
	<script src="https://kit.fontawesome.com/d57bd52145.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	
	
</head>
<body style="background-image:url(mod.jpg);">
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
    //Je recupere l'id depuis l'URL
		$idd=$_GET['id'];
		$idf=$_SESSION["idd"];
		$sql ="SELECT * FROM reservation WHERE id=$idd " ;
		$res=$connexion->query($sql);
		$row=$res->fetch(PDO::FETCH_ASSOC)
     ?>

     <h1 class="title" style="color: #766339"> Formulaire de modification </h1>
	 
    <div class="form">
		<form action="modifier.php" method="POST" class="entrer" style="color: white;">
				
		 		
			Nom complet	
			<input type="varchar" name="nom_complet" value="<?php echo  $row["nom_complet"];?>" class="input" >
				<br><br>
			date de réservation
			<input type="date" name="date_reservation" value="<?php echo  $row["date_reservation"];?>" class="input"><br><br>
			heure 	
			<select class="input" name="heure" >
				<option style="background: #40403F;">matin (9h-11h)</option>
				<option style="background: #40403F;">aprés-midi (13h-15h)</option>
				<option style="background: #40403F;">soir (16h-18h)</option>
			</select>
				    
	  			<br><br>
			
			
			<input type="hidden" name="id" value="<?php echo  $row["id"];?>">
			
				
			Nom de la salle
		    <div>
		      
		      
		      <select  name="salle" class="input" style="border-width: 2px;">
        		<?php
        		$sql="SELECT allsalle FROM allsalle ";
        		$res=$connexion->query($sql);?>
        		<?php while ($row=$res->fetch(PDO::FETCH_ASSOC)):  ?>

         			 <option style="background: #40403F;"> <?php echo  $row["allsalle"];?></option>

        		<?php endwhile ?>
      			</select>
    </div>
	
		   
			
<br><br>
			
			<input type="submit" name="modifier" value=" modifier" class="input" style="background-color: #d9be92; color: black;"> 

		</form>
	</div>
</body>
</html>
<style type="text/css">
	.input{
		color:white;
	}
</style>
