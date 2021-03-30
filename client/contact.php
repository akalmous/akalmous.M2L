<?php 
 session_start();
 // try {
	//$connexion=new PDO("mysql:host=localhost;dbname=logins", "root", "");
//} catch (PDOException $e) {
//	echo "la connexion à la bdd a echoué";

//}
 ?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="styleC.css">
		<script src="https://kit.fontawesome.com/d57bd52145.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<title>La maison des ligues</title>
	</head>
	
	<body style="background-color:#2e2e2e; color: white ">

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
	<div class="row" style="border:solid 3px; margin: 0 auto; width: 70%;font-family: 'Times New Roman', serif;">
		<div class="col-sm">
			<h1 style="color:#c2a18b ">Bonjour</h1>
			<p style="font-size: 13px;">Nous sommes très accessibles et aimerions vous parler. N'hésitez pas à nous appeler, nous envoyer un email, nous tweeter ou simplement remplir le formulaire</p>
			<br>
			
			<div class="supprimer">
				<i class="fas fa-phone-alt"></i> 06513 41814 <br><br>
				<i class="fas fa-envelope"></i> M2L@GMAIL.COM<br><br>
				<i class="fas fa-map-marker-alt"style ="width: 48px;margin: 0 auto"></i> 10 COURS LOUIS LUMIERE, 94300 VINCENNES <br><br>
				<i class="fab fa-instagram"> </i> @M2L <br><br>
				<i class="fab fa-twitter"></i> @M2L-FRANCE <br><br>
				
			</div>

		</div>
		<div class="col-sm">
		<div class="login-box">
		    <h1>Envoyer un message</h1>
		    <form action="contact.php" method="post">
		        <div class="textbox">
		        <i class="far fa-id-badge"></i>
		    <input required type="text" name="nom" placeholder="Nom Complet" class="place"></div>
		     <div class="textbox">
		    <i class="fas fa-at"></i>
		    <input required type="mail" name="mail"  placeholder="Mail" class="place"></div>
		     <div class="textbox">
		        <i class="fas fa-phone-alt"></i>
		    <input  required type="text" name="tel" placeholder="numéro de téléphone" class="place"></div>
	
		     <div class="textbox">
		        <i class="far fa-comment-dots"></i>
		    	<textarea required name="message" placeholder="Write something.." class="place" style="height:100px;"> </textarea>
		    </div>
		    
		    <input type="submit" value="Envoyer un message" name="ok" class="btn">
		    
		    </form>
		    </div>

		</div>
		
	</div>

	<style type="text/css">
    body{
  margin: 0;
  padding: 0;
  }
.login-box{
  width: 280px;
  margin : 0 auto;

  color: white;
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #c2a18b;
}
.login-box h1{
  float: left;
  font-size: 29px;
  border-bottom: 6px solid #c2a18b;
  margin-bottom: 50px;
  padding: 13px 0;

}
.textbox input, textarea{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.place::placeholder {
    color: white;
    font-size: 15px;
}
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
}
.btn{
  width: 100%;
  background: none;
  border: 2px solid #c2a18b;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
.btn:hover{
  background-color: #c2a18b;
  color: black;
  }
  .supprimer i{
  	color:#c2a18b;
	background:white;
	padding:11px ;
	border:solid 1px;
	border-radius:100px;
	font-size: 25px;

	text-decoration:none;}
</style>
<?php
 $id = mysqli_connect("localhost","root","","logins");
    if(isset($_POST["ok"]))
    {
        $nom=$_POST["nom"];
        $mail=$_POST["mail"];
        $tel=$_POST["tel"];
        $message=$_POST["message"];
        $message = mysqli_real_escape_string($id, $message);
        
       
        $date_inscription = date('Y-m-d H:i:s');
        
        $id = mysqli_connect("localhost","root","","logins");
        $req = "insert into contact (nom,mail,tel,message,date_inscription) values ('$nom','$mail','$tel','$message','$date_inscription')";
        
        $res = mysqli_query($id,$req);  

        if ($res) {
			echo "<h3 style='text-align: center;color: green'>votre message a été bien envoyé</h3>";
			
		}
    }
?>