<?php session_start();
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Mon compte</title>
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
    <?php 
    //Je recupere l'id depuis l'URL
        $lg=$_SESSION['login'];


        $sql ="SELECT * FROM user WHERE login='$lg' "
 ;
        //echo($sql);
        $res=$connexion->query($sql);
        $row=$res->fetch(PDO::FETCH_ASSOC);
        $mo=$row['mdp'];
        //echo $mo; 
     ?>
     <div class="container">
        <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">mes informations personnelles</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">mes résérvations</a>
    </li>
    
  </ul>

<div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <div class="login-box" id="info">
    <h3>Mes informations personelles </h3>
    <form action="compte.php" method="post">
        <div class="textbox">
            <i class="far fa-id-badge"></i>
    <input type="text" name="nom" placeholder="Nom" value="<?php echo $row['nom'];?> "   class="place"></div>
     <div class="textbox">
        <i class="far fa-address-card"></i>
    <input type="text" name="prenom" placeholder="Prénom" value="<?php echo $row['prenom'];?> " class="place"></div>
     <div class="textbox">
    <i class="fas fa-at"></i>
    <input type="mail" name="mail" required placeholder="Mail" value="<?php echo $row['mail'];?> " class="place"></div>
    <p style="color: #DFB555">laissez le champ vide si vous ne voulez pas changer votre mot de passe</p>
     <div class="textbox">
        <i class="fas fa-lock"></i>
    <input type="password" name="mdp" placeholder="Mot de Passe actuel"  class="place"></div>
    <p style="color: #DFB555">laissez le champ vide si vous ne voulez pas changer votre mot de passe</p>
    <div class="textbox">
        <i class="fas fa-lock"></i>
    <input type="password" name="mdpn" placeholder="le nouveau Mot de Passe "  class="place"></div>
    <input type="submit" value="Enregistrer" name="ok" class="btn" >
    
    </form>
    </div>
</div>
    <div id="menu1" class="container tab-pane fade"><br>
      <div id="reservation">
        <table>
            <tr>
                
                <th>Nom complet du résérvateur</th>
                <th>nom de la salle </th>
                <th>date résérvé</th>
                <th>heure</th>
                <th>Actions</th>
                
            </tr>
            <tr>
                <?php 
                $req="SELECT * FROM reservation where login='$lg' ";
        $resultat=$connexion->query($req);
        
        

                    while ($row=$resultat->fetch(PDO::FETCH_ASSOC)):

                    
                  ?>
                
                
                <?php  $_SESSION["id"]=$row["id"];
                $_SESSION["nom_complet"]=$row["nom_complet"];
                $_SESSION["salle"]=$row["salle"];
                $_SESSION["date_reservation"]=$row["date_reservation"];
                $_SESSION["heure"]=$row["heure"];
                ?>

                <td> <?php echo  $row["nom_complet"];?> </td>
                <td><?php echo  $row["salle"];?></td>
                <td><?php echo  $row["date_reservation"];?></td>
                <td><?php echo  $row["heure"];?></td>
                <td>
                <a href="rac?id=<?php echo $row['id']?>"> <i class="fas fa-eye" style="color:#DFB555 "></i></a></td>

            </tr>
        <?php endwhile; ?>
        </table>
        </div>  
    </div>
    
  </div>




   
  
<?php
if(isset($_POST["ok"]))
    {
        $mdp=$_POST["mdp"];
        echo "$mdp";
        $mdpn=$_POST["mdpn"];
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        $mail=$_POST["mail"];
        $mdp=$_POST["mdp"];
        $mdpn=$_POST["mdpn"];

        $sql=" UPDATE `user` SET `nom`='$nom',`prenom`='$prenom',`mail`='$mail' ";
        if(isset($mdp) AND (!empty($_POST["mdpn"])) AND ($mo==$mdp) ) {
            $sql.=",`mdp`='$mdpn'   ";
        }
        elseif ($mo!=$mdp AND (!empty($mdp)) ) {
            echo "mot de passe incorrect ";
        }
        elseif (!empty($mdpn) AND (empty($mdp)) ) {
            echo "rentrez votre mot de passe actuel";
        }

        elseif (empty($mdpn) AND (!empty($mdp)) AND ($mo==$mdp) ) {
            echo "entrez le nouveau mot de passe";
        }

         $sql.=" WHERE login='$lg'  ";
       
        
        $res=$connexion->query($sql);
        echo "$sql";
        if ($res) {
            echo "données modifiés";
            # code...
        }

        



           /* if ($mo==$mdp AND isset($_POST['mdpn'])) {
            echo "codebon";
            $sql ="UPDATE `user` SET `nom`='$nom',`prenom`='$prenom',`mail`='$mail',`mdp`='$mdpn' WHERE login='$lg' ";
            echo "$sql";
            $res=$connexion->query($sql);
            # code...
        }
        else {
            echo "no";
        }
        */

}


$req="SELECT * FROM reservation where login='$lg' ";
        $resultat=$connexion->query($req);
        $row=$resultat->fetch(PDO::FETCH_ASSOC)
        ?>
    
 <?php  $_SESSION["id"]=$row["id"];
                $_SESSION["nom_complet"]=$row["nom_complet"];
                $_SESSION["salle"]=$row["salle"];
                $_SESSION["date_reservation"]=$row["date_reservation"];
                $_SESSION["heure"]=$row["heure"];
                $_SESSION["date_ligne"] = date('Y-m-d H:i:s');
                ?> 
        
        <style type="text/css">
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
.search input,select{
    width:22%;
    height: 35px;
    margin: 0 10px;
    border-radius: 6px;

}
.search input[type=submit]{
    background-color: #d9be92;
    border-color: white;
    width: 10%;
}
.search input[type=submit]:hover{
  background-color: #A4A4A4;
  color: black;
  }
  .input{
    outline: none;
    background: none;
    border-radius: 10px;
    width: 240px;
    height: 40px;
    font-family: serif;
    color: white;
    font-size: 15px;

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
  border-bottom: 1px solid #DFB555;
}
.login-box h3{
  float: left;
  font-size: 20px;
  border-bottom: 6px solid #DFB555;
  margin-bottom: 50px;
  padding: 13px 0;

}
.textbox input{
  border: none;
  outline: none;
  background: none;
  color: white;
  font-size: 18px;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.place::placeholder{
    color: white;
}
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
}
.btn{
  width: 100%;
  background: none;
  border: 2px solid #DFB555;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
.btn:hover{
  background-color: #DFB555;
  color: white;
  }
</style>