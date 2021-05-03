<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="style.css">
	<link type="text/css" rel="stylesheet" href="formulaire.css">
</head>
<body>

  	<?php include("menu.php"); ?>
	
	<h1>Bienvenue sur MarieTeam</h1>

	<?php 
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["usermail"])){
    	include("connexion.php");
    	exit(); 
	}
	?>

	
	
</body>
</html>