<?php 
 session_start();
 try {
	$connexion=new PDO("mysql:host=localhost;dbname=logins", "root", "");
} catch (PDOException $e) {
	echo "la connexion à la bdd a echoué";

}
 ?>
 <html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="styleC.css">
		<script src="https://kit.fontawesome.com/d57bd52145.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>Contact</title>
	</head>
	<body style="background-color:#2e2e2e; color: white">
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
    $id_contact=$_GET['id_contact'];
    $req="SELECT * FROM contact where id_contact=$id_contact ";
	$resultat=$connexion->query($req);
	$row=$resultat->fetch(PDO::FETCH_ASSOC);
    ?>
    <div style="border: solid 3px #d9be92;">
    	<h3 style="color: #d9be92"> message envoyé le :<i style="color: white">  <?php echo  $row["date_inscription"];?></i></h3>
    	<h3 style="color: #d9be92"> Nom complet : <i  style="color: white"> <?php echo  $row["nom"];?></i></h3>
    	<h3 style="color: #d9be92"> Mail :<i  style="color: white"> <?php echo  $row["mail"];?></i></h3>
    	<h3 style="color: #d9be92"> Numéro de téléphone :<i  style="color: white"> <?php echo  $row["tel"];?></i></h3>
    	<h3 style="color: #d9be92" > message : <rt style="color: white"><?php echo  $row["message"];?></rt></h3>
    </div>
