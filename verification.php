<?php
session_start();
if(isset($_POST['user_mail']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'marieteam';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    $usermail = mysqli_real_escape_string($db,htmlspecialchars($_POST['user_mail'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    if($usermail !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM membres where 
              email = '".$usermail."' and pass = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['usermail'] = $usermail;
           header('Location: compte.php');
        }
        else
        {
           header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: connexion.php');
}
mysqli_close($db); // fermer la connexion
?>