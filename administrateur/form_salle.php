<?php 
session_start();
try {
	$connexion=new PDO("mysql:host=localhost;dbname=logins", "root", "");
} catch (PDOException $e) {
	echo "la connexion à la bdd a echoué";

}

?>
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
		$id_salle=$_GET['id_salle'];
		echo "$id_salle";
		$sql ="SELECT * FROM allsalle WHERE id_salle=$id_salle " ;
		$res=$connexion->query($sql);
		$row=$res->fetch(PDO::FETCH_ASSOC)
     ?>

     <h1 class="title" style="color: #766339"> Formulaire de modification </h1>
	 
    <div class="form">
		<form action="modifier.php" method="POST" class="entrer" style="color: white;">
				
		 		
			Nom de la Salle 
			<input type="varchar" name="allsalle" value="<?php echo  $row["allsalle"];?>" class="input" >
				<br><br>
			Nombre de place 
			<input type="int" name="nb" value="<?php echo  $row["nb"];?>" class="input"><br><br>
			<input type="hidden" name="id_salle" value="<?php echo  $row["id_salle"];?>">
    
	
		   
			
<br><br>
			
			<input type="submit" name="edit" value=" modifier" class="input" style="background-color: #d9be92; color: black;"> 

		</form>
	</div>
</body>
</html>
<style type="text/css">
	
	body{
	
	font-family: sans-serif;
	background: url(img/edit.jpg) no-repeat;
	background-size: cover;
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
	color: white;
	font-size: 23px;

}
.title{
	font:italic 1.2em "Fira San)s", serif;
	font-size: 4em;
	text-align: center;
	

}



</style>
<?php
