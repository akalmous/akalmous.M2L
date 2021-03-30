<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title> Récapitulatif </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="styleC.css">
	<script src="https://kit.fontawesome.com/d57bd52145.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">		
</head>
<body style="background-color:#2e2e2e; color: white;" >
	
	<nav>
        <div>
            <ul>
                <li><a href="m2lA.php"><img width="60" src="1111.png" ></a></li>
                <li><a href="m2lA.php">Accueil</a></li>
                <li><a href="presentation.php">présentation</a></li>
                <li><a href="gestionRes.php">reservation</a></li>   
                <li><a href="contact.php">Contact</a></li>
                <li><a href="gestion.php">Gestion</a></li>
                <li> <a href="#"style="color: white" ><?php echo $_SESSION["login"];?> </li></a>
                <li><a href="deconnect.php">déconnecter</a></li>
            </ul>
        </div>
    </nav>
	<H1 style="text-align: center;"> Récapitulatif de votre réservation </H1>

	<div style="border: solid;margin: auto 0;" >
		
		<H2><b style="color: #c8ad7f">N REFERNCE :</b><?php echo $_SESSION["idd"];?> </H2>
		<H2><?php echo $_SESSION["date_ligne"];?></H2>

		<b style="color: #c8ad7f">Nom complet:</b> <?php echo $_SESSION["nom_complet"];?> <br>

		<b style="color:#c8ad7f">Date de réservation </b> :<?php echo $_SESSION["date_reservation"];?> <br>

		<b style="color: #c8ad7f">Nom de la salle:</b> <?php echo $_SESSION["salle"];?> <br>

		<b style="color: #c8ad7f">heure :</b> <?php echo $_SESSION["heure"];?> <br>

		
		

	
	
	
	<H2 style="color: red;">Important </H2>
	<p>vous devez télécharger votre récapitulaif et vous le rendez avec vous le jour de résérvation  </p>
	
	<br>
</div>
<h3>
	<a href="./rec.php" download="rac" style="color: #966c4f ; text-align: center;">télécharger</a></h3>


</body>
</html>
<style type="text/css">
	.cen{
		display: flex;
  		justify-content: center;
  		align-items: center;
  		

	}
	.m{
		border:solid;
		border-radius: 20px;
		border-width: 3px;

	}
</style>