<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des visiteurs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

<?php include 'redirectConnexionDelegue.php';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$sql = "SELECT * FROM visiteur_ppe3";              // Récupérer toutes les données de la table visiteur_ppe3
$reponseDelegue = $bdd->query($sql);

?>

<nav>
    <div class="nav-wrapper light-blue lighten-3">
        <a href="menuDelegue.php" class="brand-logo">GSB</a>
        <ul id="nav-mobile" class="right">
            <li><a href="visiteursDelegue.php">Visiteurs</a></li>
            <li><a href="comptesRenduDelegue.php">Comptes-Rendus</a></li>
            <li><a class="waves-effect waves-light btn  grey darken-1" href="traitementDeconnexion.php">Déconnexion</a></li>
        </ul>
    </div>
</nav>

<h1 class="center"> Liste des visiteurs </h1>

        <div id="button2">
        <a class="waves-effect waves-light btn" href="graph.php">  <i class="material-icons">info</i></a>
        </div>

<table class="highlight">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Région</th>
            <th>Date d'embauche</th>
        </tr>
    </thead>

<?php
while ($donnees = $reponseDelegue->fetch()) {?>
    <tbody>
        <tr>    
            <td class="infos"><?php echo $donnees['vis_nom']; ?></td>
            <!-- Afficher les données de la colonne vis_nom -->
            <td class="infos"><?php echo $donnees['vis_prenom']; ?></td> 
            <!-- Afficher les données de la colonne vis_prenom -->
            <td class="infos"><?php echo $donnees['vis_adresse']; ?></td> 
            <!-- Afficher les données de la colonne vis_adresse -->
            <td class="infos"><?php echo $donnees['vis_cp']; ?></td>   
            <!-- Afficher les données de la colonne vis_cp -->
            <td class="infos"><?php echo $donnees['vis_ville']; ?></td>    
            <!-- Afficher les données de la colonne vis_ville -->  
            <td class="infos"><?php echo $donnees['region']; ?></td>    
            <!-- Afficher les données de la colonne région -->  
            <td class="infos"><?php echo $donnees['vis_dateembauche']; ?></td>   
            <!-- Afficher les données de la colonne vis_dateembauche -->           
        </tr>

<?php
}
?>

    </tbody>
</table>  

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</body>

</html>