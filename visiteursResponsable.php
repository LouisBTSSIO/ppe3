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

<?php include 'redirectConnexionResponsable.php'; 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['removeVisiteur'])) {
    $reqResponsable = $bdd->prepare('DELETE FROM visiteur_ppe3 WHERE vis_matricule = :vis_matricule');      
    // Supprimer une ligne de donnée de la table visiteur gràce au vis_matricule
    $reqResponsable->execute(array('vis_matricule' => $_POST['person']));
}

$sql = "SELECT * FROM visiteur_ppe3";              
// Récupérer toutes les données de la table visiteur_ppe3
$reponseResponsable = $bdd->query($sql);

?>

<nav>
    <div class="nav-wrapper light-blue lighten-3">
        <a href="menuResponsable.php" class="brand-logo">GSB</a>
        <ul id="nav-mobile" class="right">
            <li><a href="visiteursResponsable.php">Visiteurs</a></li>
            <li><a href="practiciensResponsable.php">Praticiens</a></li>
            <li><a href="medicamentsResponsable.php">Medicaments</a></li>
            <li><a href="menuResponsableCr.php">Comptes-Rendus</a></li>
            <li><a class="waves-effect waves-light btn  grey darken-1" href="traitementDeconnexion.php">Déconnexion</a></li>
        </ul>
    </div>
</nav>

<h1 class="center"> Liste des visiteurs </h1>

<td><a class="waves-effect waves-light btn green lighten-2 btn tooltipped" data-position="left" data-delay="50" data-tooltip="Ajouter un visiteur" id="ajouter" href="addVisiteurs.php"><i class="material-icons">add</i></a></td>

        <div id="button2">
        <a class="waves-effect waves-light btn" href="graph2.php">  <i class="material-icons">info</i></a>
        </div>
        
<table class="highlight">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Département</th>
            <th>Secteur</th>
            <th>Date d'embauche</th>
            <th></th>
        </tr>
    </thead>

<?php
while ($donnees = $reponseResponsable->fetch()) {?>
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
            <td class="infos"><?php echo $donnees['departement']; ?></td>    
            <!-- Afficher les données de la colonne département --> 
            <td class="infos"><?php echo $donnees['secteur']; ?></td>    
            <!-- Afficher les données de la colonne secteur -->   
            <td class="infos"><?php echo $donnees['vis_dateembauche']; ?></td>   
            <!-- Afficher les données de la colonne vis_dateembauche -->   
            <td><a class="waves-effect waves-light btn light-blue lighten-3 btn tooltipped" data-position="left" data-delay="50" data-tooltip="Modifier"><i class="material-icons">edit</i></a></td>
            <td>
                <form method="POST" action="">
                    <input type="hidden" name="person" value="<?php echo $donnees['vis_matricule']; ?>">
                    <button class="waves-effect waves-light btn red darken-1 btn tooltipped" data-tooltip="Supprimer" data-position="left" type="submit" name="removeVisiteur" value="remove" onclick="if(!confirm('Etes vous sûr de vouloir supprimer les données de ce visiteur ?')) return false;"><i class="material-icons">delete_forever</i></button>
                <!-- Bouton supprimer avec pop-up pour valider la suppression -->
                </form>   
            </td>        
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