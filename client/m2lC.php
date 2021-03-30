<?php session_start();
if(!isset($_SESSION["login"]))
{
    header("location:connexion.php");
}?>
<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="styleC.css">
		<script src="https://kit.fontawesome.com/d57bd52145.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>La maison des ligues</title>
	</head>
	
	<body style="background-color:#2e2e2e;">

	<nav>
        <div>
            <ul>
                <li><a href="m2lC.php"><img width="60" src="1111.png" ></a></li>
                <li><a href="m2lC.php">Accueil</a></li>
                <li><a href="presentation.php">présentation</a></li>
                <li><a href="reservation.php">reservation</a></li>   
                <li><a href="contact.php">Contact</a></li>
                <li> <a href="compte.php"style="color: white" ><?php echo $_SESSION["login"];?> </li></a>
                <li><a href="deconnect.php">déconnecter</a></li>
            </ul>
        </div>
    </nav>
	
	<section class="image" style="background-image:url(./2.jpg);">
	<div style="text-align: center;color: #d9be92;font: italic 4.2em 'Fira Sans', serif;"> La Maison Des Ligues</div>
	</section>
	
	<section >
		<div class="row">
		
			
			<div class="col-sm-3">

				<img  src="./4.jpg" width="300" height="200">
				<img  src="./3.jpg" width="300" height="200"></div>


			<div class="col-sm-3">
				<img  src="./5.jpg" width="300" height="200" >
				<img src="./6.jpg"  width="300" height="200"></div>
			
		
		 
			<div class="col-sm-6">
				<p class="jeu">
					La Maison des Ligues de Lorraine (M2L) a pour mission de fournir des espaces et des services aux différentes ligues sportives régionales et à d’autre structure hébergées. Elle est financée par le Conseil Régional de la Lorraine dont l’administration est déléguée au Comité Régional Olympique et Sportif de Lorraine. La Lorraine représente aujourd’hui 6500 clubs, plus de 525000 licenciés et près de 50000 bénévoles.
				</p>
			 
			</div>
			
			
		  
		</div>

	</section>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	