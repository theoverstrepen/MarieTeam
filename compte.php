<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link type="text/css" rel="stylesheet" href="container.css">
<?php include("menu.php"); ?>
<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["usermail"])){
    header("Location: index.php");
    exit(); 
}
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=marieteam;charset=utf8','root','');
        
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>
<?php
    $req = $bdd->prepare('SELECT * FROM membres WHERE email= ?'); //renvoie toute les info d'un utilisateur avec son email 
    $req->execute(array($_SESSION["usermail"]));
    $donnees = $req->fetch()
?>
<div class="container">
    <p>
        <h4><?php echo $donnees['prenom']?> <?php echo $donnees['nom']?></h4></br>
        email : <?php echo $donnees['email']?></br>
        date d'inscription : <?php echo $donnees['date_inscription']?></br></br>
        <a href="mdp.php">Changer mot de passe</a></br></br>
        <a href="deconnexion.php">Déconnexion</a>
    </p>
</div>


