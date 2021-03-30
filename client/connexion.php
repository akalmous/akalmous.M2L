<?php
session_start();

    $connexion = mysqli_connect("localhost","root","","logins");

if(isset($_POST["connexion"]))
{
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];
    $req = "select * from user where login = '$login' and mdp = '$mdp'";
    $res = mysqli_query($connexion,$req);
    if(mysqli_num_rows($res)==1)
    {


        $user=mysqli_fetch_assoc($res);
        $type=$user['type'];
        $_SESSION["login"] = $login;
        $_SESSION["type"] = $type;
        if ($user['type'] == 'admin') {
            header('location:../administrateur/m2lA.php');      
        }else{
            header('location:m2lC.php');
    }


    }
    else{
        $erreur = "Erreur de login ou de mot de passe!!!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styleC.css">
    <script src="https://kit.fontawesome.com/d57bd52145.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">     
</head>
    <body style="background: url(gess.jpg) no-repeat ;background-size: cover;">
    <nav>
    <div>
      <ul>
        <li><a href="m2l.html"><img width="60" src="1111.png" ></a></li>
        <li><a href="m2l.html">Accueil</a></li>
        <li><a href="presentation.html">présentation</a></li>
        <li><a href="reservation.php">Réservation</a></li>  
        <li><a href="compte.php">Contact</a></li>
        <li><a href="connexion.php">se connecter</a></li>
      </ul> 

    </div>
  </nav>
  
    <div class="login-box">
    <h1>Connexion</h1>

    <form action="" method="post" >
        <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" name="login" placeholder="Login :"  required class="place">
    </div>
    <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" name="mdp" placeholder="Mot de passe :" required class="place">
        <?php if(isset($erreur)) echo "<h3>$erreur</h3>";?>
    </div>
        <input type="submit" value="Connexion" name="connexion" class="btn">
    </form>
    <h3><a href="inscription.php" style="color:#8E7640;text-align: center;">inscrivez-vous</a></h3>
    </div>


</body>
</html>
<style type="text/css">
    body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  
  background-size: cover;
}
.login-box{
  width: 280px;
  margin : 0 auto;

  color: white;
}
.login-box h1{
  float: left;
  font-size: 40px;
  border-bottom: 6px solid #8E7640;
  margin-bottom: 50px;
  padding: 13px 0;

}
.login-box  h3{
  text-align: center;
  font-size: 20px;
  
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 20px;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid #8E7640;
}
.textbox i{
  width: 26px;
  float: left;
  text-align: center;
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
.btn{
  width: 100%;
  background: none;
  border: 2px solid #8E7640;
  color: white;
  padding: 5px;
  font-size: 18px;
  cursor: pointer;
  margin: 12px 0;
}
.place::placeholder{
    color: white;
}
.btn:hover{
  background-color: #8E7640;
  color: white;
  }
</style>