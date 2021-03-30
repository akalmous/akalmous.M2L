<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header("location:connexion.php");
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
	<body style="background-color:#2e2e2e;">
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



<nav>
		<ul class="nav nav-tabs" style="margin-top: 4px; margin-left: 10%;" >
	  <li class="nav-item">
	    <a class="nav-link active" href="#locaux">réseaux</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="#home">locaux</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="#equipement">Equipement</a>
	  </li>
	  <li class="nav-item">
	   <a class="nav-link" href="#service">Services</a>
	  </li>
	  <li class="nav-item">
	   <a class="nav-link" href="ligue.php">ligues</a>
	  </li>
	</ul>
</nav>
	<div id="locaux" style="margin-left: 70px;">
	<br>
	<h1 style="margin-top: 8px;color:#d9be92;">Infrastractures de la M2L</h1>
	<p style="color:white;">
		La M2L dispose d’un grand réseau informatique et de plusieurs serveurs reliés via diverses interfaces, comme expliqué ci-dessous.
	</p>
	<br><br>
	<img src="r.png" style="display: block;margin-left: auto; margin-right: auto ;">
	<br><br><br>
	<h1 id=home style="color:#d9be92;">  Infrastructures de la M2L </h1>
	<p style="margin-left: 2px;color: white;">   La location de la M2L se fait sur la base d’un forfait de charge locative par bureau, la M2L est sur la base de 5€/m²/mois. Le site de la M2L comprend quatre bâtiments A,B,C,D dont B et D ne comprennent que le rez-dechaussée et les deux autres ont chacun 4 étages.
	</p>
	<img src="s.png"  style="display: block;margin-left: auto; margin-right: auto ;"><br><br>

	<p style="color:white;">
		Les bâtiments A et C hébergent les bureaux des ligues locataires , la M2L offre au total 80 bureaux. Les ligues et comités départementaux occupent un ou plusieurs bureaux qui peuvent communiquer entre eux, il est également possible de redimensionner les bureaux en déplaçant les cloisons
	</p>
	<br>
	<img src="m.png"  style="display: block;margin-left: auto; margin-right: auto ;"><br><br>

	<h1 id="equipement" style="margin-top: 15px; color:#d9be92;">Equipement informatique des locaux de la M2L</h1>
	<img src="l.png"  style="display: block;margin-left: auto; margin-right: auto ;color: white;"><br>
	<br>
	<h1 id="service" style="margin-top: 15px;color:#d9be92;">LES SERVICES PROPOSES </h1><br>
	<img src="n.png"  style="display: block; margin-left: auto; margin-right: auto ;">
	<br><br><br>
</div>
<div>

</div>

</body>
</html>
