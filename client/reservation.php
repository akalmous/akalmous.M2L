<?php
session_start();
if(!isset($_SESSION["login"]))
{
    header("location:connexion.php");
}
try {
$connexion=new PDO("mysql:host=localhost;dbname=logins", "root", "");
}catch (PDOException $e) {
echo "la connexion à la bdd a echoué";
}
$count=0;


if(isset($_POST["ok"]))
    {
		$nom_complet=$_POST["nom_complet"];
		$date_reservation=$_POST["date_reservation"];
		$heure=$_POST["heure"];
		$salle=$_POST["salle"];
		$date_ligne = date('Y-m-d H:i:s');
    $lg=$_SESSION["login"];


        

        $sqll = "SELECT count(*)  FROM reservation where date_reservation='$date_reservation' and heure = '$heure' and salle = '$salle' ";
    
        $ress=$connexion->query($sqll);
        $count = $ress->fetchcolumn();

        if ($count>=1) {
          echo "";
          # code...
        }
        else {
            $sql = "insert into reservation (nom_complet,date_reservation,heure,salle,date_ligne,login) values ('$nom_complet','$date_reservation','$heure','$salle','$date_ligne','$lg')";
    
           $res=$connexion->query($sql);
           if ($res) {
      echo "reservation bien ajouté";
      header("location:rac.php");
    }
}
    

		$id=$connexion->lastInsertId();
		$_SESSION['id']=$id;

		
		

		

	}
$date_ligne = date('Y-m-d H:i:s');
$_SESSION["date_ligne"]=$date_ligne;
?>



<!DOCTYPE html>
<html>
<head>
	<title>Reservation des salles</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styleC.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body style=" background: url(res.jpg) ;">
  <section style="background-color:#2e2e2e;">
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
</section>
<div class="row">
  <div class="col">
<section style="background: url(res.jpg) no-repeat;">
 
<h1  style="text-align: center;font-family:'times new roman', times, serif;"> Réserver une salle</h1>

  
<form method="POST" action="reservation.php">
  <div class="form-row" style="margin;">
    <div style="text-align: center;font-size: 1.3em;" class="form-group col-md-6" >
      <label for="inputEmail4">Nom Complet</label>
      <input type="varchar" class="form-control"  name="nom_complet">
    </div>
  </div>

  <div class="form-row">
    <div style="text-align: center;font-size: 1.3em;" class="form-group col-md-6">
      <label for="inputCity">date de réservation</label>
      <input type="date" class="form-control"  name="date_reservation" >
    </div>
   </div>

   <div class="form-row">
    <div style="text-align: center;font-size: 1.3em;" class="form-group col-md-6">
      <label name="heure" for="inputState">heure</label>
      <select  class="form-control" name="heure">
          <option>matin (9h-11h)</option>
          <option>aprés-midi (13h-15h)</option>
          <option>soir (16h-18h)</option>
      </select>
    </div>
  </div>
   
	<div class="form-row">
    <div style="text-align: center;font-size: 1.3em;" class="form-group col-md-6">
      <label name="salle" for="inputState">Salle de réservation</label>
      <select  class="form-control" name="salle">
        <?php
        $sql="SELECT allsalle FROM allsalle ";
        $res=$connexion->query($sql);?>
        <?php while ($row=$res->fetch(PDO::FETCH_ASSOC)):  ?>

          <option> <?php echo  $row["allsalle"];?></option>

        <?php endwhile ?>
      </select>
    </div>
	</div>
 
  <div  class="form-row">
  <button style="color: black;border-color: black;border-width: 2px;" type="submit" class="btn btn-primary" name="ok">Réserver</button>
</div>
 <?php 
  if ($count>=1) {
          echo "<h4 style='color: red;text-align:center;'>réséervation déja prise ,merci de choisir une autre</h4> ";
          # code...
        }
    ?>
</form>
</div>
<div class="col">
  <h1 style="font-family:'times new roman', times, serif; text-align: center;" >Les informations sur les résérvations </h1><br>
  <h3 style="color: #a07d63;font: italic 2.2em 'Fira Sans', serif;text-align: center;">le fonctionnement de réséervation des salles</h3>
  <p>Pour l’amphi, il y a ½ journée gratuite par an pour chaque ligue et comité départemental (CD). Les salles de réunions d’étage sont mises librement à la disposition des occupants de l’étage. Les salles de réunions sont réservables via l’Intranet, avec différents services associés dont certains sont payants. Il existe quatre niveaux de tarification. En 2009, nous avons reçu 2732 réunions et 47316 personnes ont assisté à ces réunions.</p>
  <h3 style="color: #a07d63;font: italic 2.2em 'Fira Sans', serif;text-align: center;">les tarifs</h3>
  <p>Les ligues peuvent réserver sans payer jusqu’à concurrence de six réservations par an, hors amphi. Les clubs sportifs et les comités départementaux ont un premier niveau de tarification. Les associations, les lycées ou encore les collèges sont sur un second niveau de tarification.
<br><br>
  Enfin, tous les autres organismes, y compris des sociétés privées, sont sur le niveau de tarification le plus haut. Pour toutes les structures qui ne sont pas hébergées, les locaux étant publics, il faut faire signer entre les parties une « convention d’occupation temporaire ». La réservation se fait dans l’Intranet directement pour les structures hébergées ou par le secrétariat pour une demande extérieure. Les informations sont ensuite transmises au Conseil Régional qui émet un « titre de paiement », c’est-à-dire une facture d’occupation de locaux. Ces titres sont envoyés directement par le Conseil Régional aux utilisateurs.</p>

</section>
</body>
</html>
<?php
if (isset($_POST["ok"])){
	$_SESSION["nom_complet"]=$_POST["nom_complet"];
	$_SESSION["date_reservation"]=$_POST["date_reservation"];
	$_SESSION["heure"]=$_POST["heure"];
	$_SESSION["salle"]=$_POST["salle"];
	


}
?>
<style>
  
    .form-control{
      border-color: black;
      border-width: 2px;
      background: none;
  
   
  }

  .btn:hover{
  background-color: #d9be92;
  color: black;
  }
  .form-row{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 90px;

  }
  .btn{
    background: none;
    width: 330px;
  }
</style>
