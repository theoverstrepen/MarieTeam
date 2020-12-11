<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Reservation</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link type="text/css" rel="stylesheet" href="container.css">
</head>
<body>

    <?php 
    // Initialiser la session
    session_start();
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["usermail"])){
        header("Location: index.php");
        exit(); 
    }
    try {
    $bdd = new PDO('mysql:host=localhost;dbname=marieteam;charset=utf8','root','');
    } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
    }
    $req = $bdd->prepare('SELECT * FROM membres WHERE email= ?'); //renvoie toute les info d'un utilisateur avec son email 
    $req->execute(array($_SESSION["usermail"]));
    $donnees = $req->fetch()
    ?>

    <div class="container">
        <h1>RESERVATION</h1>
        <p>liaison selectionner : numero traversé, date, heure </p>
        <form action="bilan" method="post">
		    <label for="lastname">Nom :</label>
		    <input type="text" placeholder="Entrer nom" id="lastname" name="lastname" required></br>
				
		    <label for="name">prenom :</label>
		    <input type="text" placeholder="Entrer prenom" id="name" name="name" required></br>		

            <label for="adress">Adresse :</label>
		    <input type="text" class="addr" placeholder="Entrer adresse" id="adress" name="adress" required></br>

            <label for="cp">code postal :</label>
		    <input type="text" class="cp" placeholder="code postal" id="cp" name="cp" required>

            <label for="city">ville :</label>
		    <input type="text" placeholder="ville" id="city" name="city" required>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Type reservation</th>
                    <th>Tarif</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Adulte</th>
                    <th>prix 1</th>
                    <th>
                        <?php
                        // le tableau avec les valeurs du menu déroulant
                        $tab = array('0','1','2','3');
                        ?>
                        <form method="post" action="reservation.php">
                            <select name="l1">';
                                <?php
                                    for($i=0;$i<count($tab);$i++){
                                        // ecrit "selected" si la valeur posté correspond
                                        if($tab[$i] == $_POST['l1']){ $selected = ' selected'; 
                                        } else { $selected = ''; 
                                        }
                                        ?> <option value="<?php echo $tab[$i];?>" 
                                        <?php echo $selected;?>>
                                        <?php echo $tab[$i];?>
                                        </option>
                                    <?php } ?>
                            </select>
                            <input type="submit" value="check">
                        </form>
                        <?php
                            if(isset($_POST['l1'])){
                                echo $_POST['l1'];
                            }
                        ?> 
                    </th>
                </tr>
                <tr>
                    <th>Juniore 8 a 18 ans</th>
                    <th>prix 2</th>
                    <th>
                        <?php$tab = array('0','1','2','3');?>
                        <form method="post" action="reservation.php">
                        <select name="tab">'; 
                    </th>
                </tr>
                <tr>
                    <th>Enfant 0 a 7 ans</th>
                    <th>prix 3</th>
                    <th>
                        <?php$tab = array('0','1','2','3');?>
                        <form method="post" action="reservation.php">
                        <select name="tab">'; 
                    </th>
                </tr>
                <tr>
                    <th>Voiture longueur < 4m </th>
                    <th>prix 4</th>
                    <th>
                        <?php$tab = array('0','1','2','3');?>
                        <form method="post" action="reservation.php">
                        <select name="tab">'; 
                    </th>
                </tr>
                <tr>
                    <th>Voiture longueur < 5m</th>
                    <th>prix 5</th>
                    <th>
                        <?php$tab = array('0','1','2','3');?>
                        <form method="post" action="reservation.php">
                        <select name="tab">'; 
                    </th>
                </tr>
                <tr>
                    <th>Fourgon</th>
                    <th>prix 6</th>
                    <th>
                        <?php$tab = array('0','1','2','3');?>
                        <form method="post" action="reservation.php">
                        <select name="tab">'; 
                    </th>
                </tr>
                <tr>
                    <th>Camping car</th>
                    <th>prix 7</th>
                    <th>
                        <?php$tab = array('0','1','2','3');?>
                        <form method="post" action="reservation.php">
                        <select name="tab">'; 
                    </th>
                </tr>
                <tr>
                    <th>Camion</th>
                    <th>prix 8</th>
                    <th>
                        <?php$tab = array('0','1','2','3');?>
                        <form method="post" action="reservation.php">
                        <select name="tab">'; 
                    </th>
                </tr>
            </tbody>
        </table>
        </form>
    </div>

</body>
</html>
