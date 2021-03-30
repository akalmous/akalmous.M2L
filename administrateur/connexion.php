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
            header('location:./administrateur/m2lA.php');      
        }else{
            header('location: ./client/m2lC.php');
    }


    }
    else{
        $erreur = "Erreur de login ou de mot de passe!!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    </nav>
    <h1>Connexion</h1><hr>

    <form action="" method="post">
        <input type="text" name="login" placeholder="Login :" required><br><br>
        <input type="password" name="mdp" placeholder="Mot de passe :" required><br><br>
        <?php if(isset($erreur)) echo "<h3>$erreur</h3>";?>

        <input type="submit" value="Connexion" name="connexion">
    </form><hr>
    <h3>pas encore de compte <a href="inscription.php">inscrivez-vous</a></h3>
     


</body>
</html>