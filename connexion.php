<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="formulaire.css">
</head>
<body>

	

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
    <form action="verification.php" method="post">
		<div class="container">
			<h1> Connexion </h1></br>
			<label for="user_mail">Email :</label>
			<input type="text" placeholder="Entrer mail" id="user_mail" name="user_mail" required>
				
			<label for="password">Mot de passe:</label>
			<input type="password" placeholder="Entrer mot de passe" id="password" name="password" required>			

            <button type="submit" class="loginbtn">Connexion</button>
			<p class="signin">Vous n'avez pas encore de compte? <a href="inscription.php">Inscription</a><br>
		</div>
		<?php 
			if(isset($_GET['erreur'])){ 
				$err = $_GET['erreur'];
				if($err==1 || $err==2)
					echo "<p>Utilisateur ou mot de passe incorrect</p>";
			}
		?>
	</form>

</body>
</html>
