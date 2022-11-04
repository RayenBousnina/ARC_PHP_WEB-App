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
   $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['user_name']));
   $_SESSION['user_name'] = $username;
}
   ?>
   <?php
  // $quer="select id from users where user_name='{$username}')";
   //$exec = mysqli_query($db,$quer);// execution
   //$reponse = mysqli_fetch_array($exec);

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS et aussi pour c'est un outil de stockage
    //$username = mysqli_real_escape_string($db,htmlspecialchars($_POST['user_name'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    /* $id=mysqli_real_escape_string($db,htmlspecialchars($_POST['id'])); */
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM users where user_name = '{$username}' and password = '{$password}' ";
        $exec_requete = mysqli_query($db,$requete);// execution
        $reponse = mysqli_fetch_array($exec_requete);  //recuperation of the result on a table
        $count = $reponse['count(*)']; // number of elements in reponse
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['user_name'] = $username;//an associative array containing session variables available to the current space//i put $username in this table
           $_SESSION['password']=$password;
           header('Location: session.php');
      //     $_SESSION['id'] = $id;
        }
        else                       
        {
           header('Location: login.php?error=1'); // utilisateur ou mot de passe incorrect  //sna3na error hne
        }
    }
    

else
{
   header('Location: login.php');
}
mysqli_close($db); // close db_connection
?>