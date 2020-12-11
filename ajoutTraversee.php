

			<?php
				$servername = 'localhost'; //nom du serveur de connexion
				$dbname = 'marieteam'; //nom de la bdd
            	$username = 'root'; // identifiant
            	$password = ''; //mot de passe (laissez comme tel si vide)
            
            //On établit la connexion
            	$base = new mysqli($servername, $username, $password);
            	$base = mysqli_connect($servername, $username,$password, $dbname);
            //On vérifie la connexion
				if($base) 
				{
					echo 'Connexion réussie.<br />';
					echo 'Informations sur le serveur:'.mysqli_get_host_info($base).'<br />';
				}  
				else 
				{
					echo('Erreur %d : %s.<br/>'.mysqli_connect_errno().mysqli_connect_error().'<br />');
				} 
			
			//On imprime les traversées
				$requete = 'SELECT * FROM traverse';
				$result = mysqli_query($base,$requete);
				while ($ligne = mysqli_fetch_assoc($result))
				{
					echo '['.$ligne['numTraversee'].']'.$ligne['DateTraversee'].' '.$ligne['heureTraverse'].' <br />';
				}
			
			
            //situation dépendantes d'une condition:
                //Appuyer sur le bouton du formulaire
				if(isset($_POST['validAdd']))
				{
					//Nos variables pour la requête
					$date=$_POST['date'];
					$heure=$_POST['heure'];
					
                    $compteur = mysqli_insert_id($base);
					
					//Ecriture de la requête dans la base
					
					$sql = "INSERT INTO traverse(numTraversee,DateTraversee,heureTraverse) VALUES ('".$compteur."', '".$date."','".$heure."')";

					echo $sql.'<br />';
					echo $compteur.'<br />';
					$resultat = mysqli_query($base, $sql);
					
				    echo "Traversée enregistrée.<br />";
            
				 	//si il y a une tentative de fermeture de la base
					if (mysqli_close($base)) 
					{
						echo 'Déconnexion réussie.<br />'; // Afficher "Déconnexion réussie" si c'est un succès
					}

					else 
					{
						echo 'Echec de la déconnexion.'; //Afficher "Echec de la déconnexion." si cela échoue
					}

					//Ici on vident les variables puis redirige vers le formulaire
					unset($date);
					unset($heure);
					unset($sql);
					header("Location: http://localhost:8070/PPEtest/zonetest.php");

                }
               
			?>