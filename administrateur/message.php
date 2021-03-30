<?php 
 session_start();
 if(!isset($_SESSION["login"]))
{
    header("location:connexion.php");
}
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
	<?php 
	$req="SELECT * FROM contact order by id_contact LImit 8 ";
	$resultat=$connexion->query($req);
 ?>
 <H1 style="text-align: center; color: #d9be92 " class='title' > toutes les messages</H1>
		<table>
			<tr>
				
				<th>Nom complet </th>
				<th>mail </th>
				<th>nméro de téléphone</th>
				<th>heure </th>
				<th>Actions</th>
				
			</tr>
			<tr>
				<?php 
				while ($row=$resultat->fetch(PDO::FETCH_ASSOC)):  ?>
				
				
				
				<td> <?php echo  $row["nom"];?> </td>
				<td><?php echo  $row["mail"];?></td>
				<td><?php echo  $row["tel"];?></td>
				<td><?php echo  $row["date_inscription"];?></td>
				<td class="supprimer">
					<a href="message.php?id_contact=<?php echo $row['id_contact']?>"onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce message ?'));"><i class="fas fa-ban"></i></a>
				 <a href="afficher.php?id_contact=<?php echo $row['id_contact']?>"> <i class="far fa-eye"></i></a>
				
				
				
			</tr>
				<?php endwhile;  ?>
		</table>
	</body>
	<style type="text/css">
	table{
	border-collapse: collapse;
	margin-left: auto;
	margin-right: auto;
	color: white;
}
th{
	border-bottom: 1px solid #ddd;
	text-align: center;
	padding: 10px;

}
td{
	border-bottom: 1px solid #ddd;
	text-align: left;
	padding: 20px;

}
tr:hover {background-color: #d9be92 ;}
.title{
	font:italic 1.2em "Fira San)s", serif;
	font-size: 4em;
}
.supprimer a{
	color:white;
	background:#d9be92;
	padding:5px 10px;
	border:solid 1px;
	border-radius:3px;
	text-decoration:none;
}
<?php 
if(isset($_GET["id_contact"]))
    {
		$id_contact=$_GET['id_contact'];
		echo "$id_contact";
		$sql="DELETE FROM contact WHERE id_contact= $id_contact ";
		echo "$sql";
		$res=$connexion->query($sql);
		if($res){
			echo "<h1 style='color:red;'>suppression effectué</h1>";
			header("Location:message.php");
		}
	}
?>