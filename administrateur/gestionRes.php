<?php session_start();
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


        

        $sqll = "SELECT count(*)  FROM reservation where date_reservation='$date_reservation' and heure = '$heure' and salle = '$salle' ";
    
        $ress=$connexion->query($sqll);
        $count = $ress->fetchcolumn();

        if ($count>=1) {
          echo "";
          # code...
        }
        else {
            $sql = "insert into reservation (nom_complet,date_reservation,heure,salle,date_ligne) values ('$nom_complet','$date_reservation','$heure','$salle','$date_ligne')";
    
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
if(isset($_POST["add"]))
    {
    	$allsalle=$_POST["allsalle"];
    	$nb=$_POST["nb"];
    	$sql = "insert into allsalle (allsalle,nb) values ('$allsalle','$nb') ";
    	$res=$connexion->query($sql);
    	
    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestion de résérvations de salles </title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="styleC.css">
	<script src="https://kit.fontawesome.com/d57bd52145.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #2e2e2e; ;">

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

<div class="row">
<div class="col">
  
<h1 style="color:white;text-align: center">Ajouter une salle</h1>
<form method="POST" action="" style="color: white; border-color: white;margin-left: 4em;">
	<i style="text-align: center;">nom de la salle</i>
	<input type="varchar" name="allsalle" class="form-control" style="width: 30em;">
	<i style="text-align: center;">nombre de places</i>
	<input type="int" name="nb"  class="form-control" style="width: 30em;"><br>
	<button type="submit"  name="add" class="btn btn-primary" style="width: 30em;">Ajouter</button >
</form>
<div>
<?php 
$sql="SELECT * FROM allsalle ";
       $res=$connexion->query($sql);?>
       
        <H1 style="text-align: center; color: white " class='title' > toutes les salles</H1>
        <table>
			<tr>
				<th>Nom de la salle</th>
				<th>Nombre de place</th>
				<th>Actions</th>
			</tr>
			<tr>
			<?php while ($row=$res->fetch(PDO::FETCH_ASSOC)):  ?>
				<td> <?php echo  $row["allsalle"];?> </td>
				<td><?php echo  $row["nb"];?></td>
				<td class="supprimer">
					<a href="supprimer.php?id_salle=<?php echo $row['id_salle']?>"onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette résérvation?'));"><i class="fas fa-ban"></i></a>
					<a href="form_salle.php?id_salle=<?php echo $row['id_salle']?>"> <i class="far fa-edit"></i></a>
				</td>
			</tr>
        <?php endwhile ?>
    </table>
</div>
</div>

<div class="col">
<h1 style="color:white;text-align: center">Ajouter une réservation</h1>
<form method="POST" action="gestionRes.php">
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
  <button style="color: white;border-color: white;border-width: 2px;" type="submit" class="btn btn-primary" name="ok">Réserver</button>
</div>
<?php 
  if ($count>=1) {
          echo "<h4 style='color: red;text-align:center;'>réséervation déja prise ,merci de choisir une autre</h4> ";
          # code...
        }
    ?>
</form>
</div>
</div>


	
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
      border-color: white;
      border-width: 2px;
      background: none;
      color: white;

  
   
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
  color: white;

  }
  .btn{
    background: none;
    width: 330px;
    border-color: white;
  }
  .form-groupe{
  	color:white;
  }
  .for{
display: flex;
  justify-content: center;
  align-items: center;
  height: 90px;
  color: white;

  }

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
	width: 12em;

}
tr:hover {background-color: #d9be92 ;}
.supprimer a{
	color:white;
	background:#d9be92;
	padding:5px 10px;
	border:solid 1px;
	border-radius:3px;
	text-decoration:none;
}
</style>