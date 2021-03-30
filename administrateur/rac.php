<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title> Récapitulatif </title>
	<link rel="stylesheet" type="text/css" href="styleC.css">
</head>
<body style="background-color:#2e2e2e;color: white;">
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

	<div style="border: solid;margin: auto 0;" class="row" >
		<div class="col">
		<H2><b style="color: #c8ad7f">N REFERNCE :</b><?php echo $_SESSION["id"];?> </H2>
		<H2><?php echo $_SESSION["date_ligne"];?></H2>

		<b style="color: #c8ad7f">Nom complet:</b> <?php echo $_SESSION["nom_complet"];?> <br>

		<b style="color:#c8ad7f">Date de réservation </b> :<?php echo $_SESSION["date_reservation"];?> <br>

		<b style="color: #c8ad7f">Nom de la salle:</b> <?php echo $_SESSION["salle"];?> <br>

		<b style="color: #c8ad7f">heure  :</b> <?php echo $_SESSION["heure"];?> <br>

		
		

	</div>
	<div class="col">
	<div class="m">
	<H2 style="color: red;">Important </H2>
	<p>vous devez télécharger votre récapitulaif et vous le rendez avec vous le jour de résérvation  </p>
	</div>
	<br>
</div>
</div>
	<h3>
	<a href="./rec.php" download="rac" style="color: #966c4f ; text-align: center;">télécharger</a></h3>
</body>
</html>