<?php session_start();
if(!isset($_SESSION["login"]))
{
    header("location:connexion.php");
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Ligues sportives</title>
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
	<nav>
	<ul class="nav nav-tabs" style="margin-top: 4px; margin-left: 10%;" >
	  <li class="nav-item">
	    <a class="nav-link active" href="presentation.php#locaux">réseaux</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="presentation.php#home">locaux</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="presentation.php#equipement">Equipement</a>
	  </li>
	  <li class="nav-item">
	   <a class="nav-link" href="presentation.php#service">Services</a>
	  </li>
	  <li class="nav-item">
	   <a class="nav-link" href="ligue.php">ligues</a>
	  </li>
	</ul></nav><br>
<h3 style="margin-bottom: 40px;margin-left:70px;color: #d9be92;">les différentes ligues sportives que propose la M2L</h3>
<div class="row">
		
		
		<div class="col-sm-6">
		<a href ="" id="badminton"><img style="margin-left: 21.5%;margin-bottom: 2%; margin-top: 2%; "  src="./ton.jpg" width="350" height="250"> </a>
		<b style="margin-left: 43%;color: white;">Badminton</b>
		</div>
		<div class="col-sm-6">
		<a href =""id="basket">		
		<img  style="margin-left: 5.5%;margin-bottom: 2%;  margin-top: 2%; " src="./basket.jpg" width="350" height="250" ></a><br>
		<b style="margin-left: 27.5%;color: white;">Basketball</b>  
		</div>

	</div>
	<div class="row">
				
		
		                            
		
				
				
		<div class="col-sm-6">
		<a href=""id="fitness"><img style="margin-left: 21.5%;margin-bottom: 2%; margin-top: 2%; " src="./5.jpg" width="350" height="250" ></a>
				
		<b style="margin-left: 43%;color: white;">Fitness</b>
				
				
		</div>
		<div class="col-sm-6">	
		<a href=""id="natation"><img style="margin-left: 5.5%;margin-bottom: 2%;  margin-top: 2%; " src="./natation.jpg"  width="350" height="250"></a><br>
		<b style="margin-left: 27.5%;color: white;">Natation</b>
		</div>
	</div>
	
</body>
</html>
<style>

div.polaroid {
  
  background-color:  #2e2e2e;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  
}
#badminton{

}

</style>
<script type="text/javascript">
	document.getElementById("badminton").onclick = function() {
		alert(
			"Le badminton Écouter est un sport de raquette qui oppose soit deux joueurs (simples), soit deux paires (doubles), placés dans deux demi-terrains séparés par un filet. Les joueurs, appelés badistes, marquent des points en frappant un volant à l'aide d'une raquette afin de le faire tomber dans le terrain adverse. L'échange se termine dès que le volant touche le sol ou reste accroché dans le filet."

			)
	}
	document.getElementById("basket").onclick = function() {
		alert(
			"Le basket-ball fréquemment désigné en français par son abréviation basket, est un sport de balle et sport collectif opposant deux équipes de cinq joueurs sur un terrain rectangulaire. L'objectif de chaque équipe est de faire passer un ballon au sein d'un arceau de 46 cm de diamètre, fixé à un panneau et placé à 3,05 m du sol : le panier. Chaque panier inscrit rapporte deux points à son équipe, à l'exception des tirs effectués au-delà de la ligne des trois points qui rapportent trois points et des lancers francs accordés à la suite d'une faute qui rapportent un point. L'équipe avec le nombre de points le plus important remporte la partie."

			)
	}
	document.getElementById("fitness").onclick = function() {
		alert(
			"Sous le terme fitness sont regroupées une pluralité d’activités qu’elles soient individuelles, comme les exercices de cardio, de musculation, d’étirements, ou collectives, à l'instar de la zumba, du step, des abdos-fessiers, du body combat ou d'autres déclinaisons visant l’amélioration de la condition physique. Les activités de fitness permettent à la fois de perdre du poids, de travailler tout le corps, son endurance et son cardio, de se muscler, de s’assouplir et de s’entretenir. Il s’agit finalement de favoriser le bien-être des participantes et leur forme globale."

			)
	}
	document.getElementById("natation").onclick = function() {
		alert(
			"La natation, c'est-à-dire l'action de nager (Écouter), désigne les méthodes qui permettent aux êtres humains de se mouvoir dans l'eau sans aucune autre force propulsive que leur propre énergie corporelle.Parmi les activités humaines, la natation regroupe le déplacement à la surface de l'eau et sous l'eau (plongée, mermaiding, natation synchronisée, water-polo), le plongeon et divers jeux pratiqués dans l'eau.Elle se pratique en piscine, en eau libre (lac, mer), ou en eau vive (rivière)1.La natation est un sport olympique depuis 1896 pour les hommes et depuis 1912 pour les femmes."

			)
	}
</script>