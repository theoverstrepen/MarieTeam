<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="formulaire.css">
</head>
<body>

    <?php include("menu.php"); //Affichage du menu ?> 

	<?php //connexion BDD 
		$BDD = array();
		$BDD['host'] = "localhost";
		$BDD['user'] = "root";
		$BDD['pass'] = "";
		$BDD['db'] = "marieteam";
		$mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
		if(!$mysqli) {
    		echo "Connexion non établie.";
    		exit;
		}
	?>
	



	<form action="inscription.php" method="post">
	<div class="container">
		<h1> Inscription </h1></br>
		<label for="name">Prenom :</label>
		<input type="text" placeholder="Entrer prenom" id="user_name" name="user_name">

		<label for="lastname">Nom :</label>
		<input type="text" placeholder="Entrer nom" id="user_lastname" name="user_lastname">
			
		<label for="password">Mot de passe :</label>
		<input type="password" placeholder="Entrer mot de passe" id="password" name="password">
		
		<label for="password_confirm">Confirmer :</label>
		<input type="password" placeholder="Repeter mot de passe" id="password_confirm" name="password_confirm">

		<label for="mail">e-mail:</label>
		<input type="text" placeholder="Entrer e-mail" id="mail" name="user_mail">
	
		<button type="submit" class="registerbtn">inscription</button>
	</form>
	<?php 
	$date = date("Y-m-d"); //obtention de la date du jour et tocker dans la variable
	if(isset($_POST['user_name'],$_POST['password'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    	if(empty($_POST['user_name'])){//le champ prenom est vide, on arrête l'exécution du script et on affiche un message d'erreur
        	echo "Le champ prenom est vide.";
    	} elseif(strlen($_POST['user_name'])>25){//le prenom est trop long, il dépasse 25 caractères
        	echo "Le pseudo est trop long, il dépasse 25 caractères.";
    	} elseif(empty($_POST['password'])){//le champ mot de passe est vide
			echo "Le champ Mot de passe est vide.";
		} elseif($_POST['password'] != $_POST['password_confirm']){//les mots de passe ne correspondent pas
			echo "les mots de passe ne correspondent pas.";
		} elseif(empty($_POST['user_mail'])){//le champ email est vide
			echo "Le champ email est vide.";
		}
		 else {
        	//toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
        	if(!mysqli_query($mysqli,"INSERT INTO membres SET 
			no	m='".$_POST['user_lastname']."',
			prenom='".$_POST['user_name']."',
			pass='".$_POST['password']."',
			email='".$_POST['user_mail']."',
			date_inscription='".$date."'
			")){
            	echo "Une erreur s'est produite: ".mysqli_error($mysqli); //erreur mysql
        	} else {
            	echo "Vous êtes inscrit avec succès!";
        	}
    	}
	}?>

</body>
</html>
