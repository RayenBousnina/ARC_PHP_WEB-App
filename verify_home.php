<?php
session_start(); // bech ki nabda fel login_page elli heya mta3 el formulaire w na3mel anti-slash ma najamech nodkhel(security)
if(isset($_POST['user_name']) && isset($_POST['password']))// isset == check if the variable is defined or not defined
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'azerty@33';
    $db_name     = 'test_db';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['user_name'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM users where 
              user_name = '".$username."' and password = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);// execution
        $reponse      = mysqli_fetch_array($exec_requete);  //recuperation of the result on a table
        $count = $reponse['count(*)']; // number of elements in reponse
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['user_name'] = $username;//an associative array containing session variables available to the current space//i put $username in this table
           header('Location: sessionFromHome.php');
        }
        else                       
        {
           header('Location: index.php?error=1'); // utilisateur ou mot de passe incorrect  //sna3na error hne
        }
    }else{
       header("Location:index.php");
    }
    
}
else
{
   header("Location: index.php");
}
mysqli_close($db); // fermer la connexion
?>