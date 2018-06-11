<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des médicaments</title>
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

if(isset($_POST['removeMedicament'])) {
    $reqResponsable = $bdd->prepare('DELETE FROM medicament WHERE med_depotlegal = :med_depotlegal');      
    // Supprimer une ligne de donnée de la table medicament gràce au med_depotlegal
    $reqResponsable->execute(array('med_depotlegal' => $_POST['person']));        
}

$sqlResponsable = "SELECT * FROM medicament";              
// Récupérer toutes les données de la table medicament
$reponseResponsable = $bdd->query($sqlResponsable);

$sql1 = 'SELECT * FROM medicament LEFT JOIN famille ON famille.fam_code = medicament.fam_code';
$reponse1 = $bdd->query($sql1);

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

<h1 class="center"> Liste des médicaments </h1>

<td><a class="waves-effect waves-light btn green lighten-2 btn tooltipped" data-position="left" data-delay="50" data-tooltip="Ajouter un médicament" id="ajouter" href="addMedicaments.php"><i class="material-icons">add</i></a></td>

<table class="highlight centered">
    <thead>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Famille</th>
            <th>Composition</th>
            <th>Effets indésirables</th>
            <th>Contre indications</th>
            <th>Prix</th>
        </tr>
    </thead>

<?php
while ($donnees = $reponseResponsable->fetch() and $donnees1 = $reponse1->fetch()) {?>
    <tbody>
        <tr>    
            <td><?php echo $donnees['med_depotlegal']; ?></td>
            <!-- Afficher les données de la colonne med_depotlegal -->
            <td><?php echo $donnees['med_nomcommercial']; ?></td>
            <!-- Afficher les données de la colonne med_nomcommercial -->
            <td><?php echo $donnees1['fam_libelle']; ?></td>
            <!-- Afficher les données de la colonne fam_libelle -->
            <td><?php echo $donnees['med_composition']; ?></td>
            <!-- Afficher les données de la colonne med_composition -->
            <td><?php echo $donnees['med_effets']; ?></td>   
            <!-- Afficher les données de la colonne med_effets -->
            <td><?php echo $donnees['med_contreindic']; ?></td>   
            <!-- Afficher les données de la colonne med_contreindic -->  
            <td><?php echo $donnees['med_prixechantillon']; ?></td>   
            <!-- Afficher les données de la colonne med_prixechantillon --> 
            <td><a class="waves-effect waves-light btn light-blue lighten-3 btn tooltipped" data-position="left" data-delay="50" data-tooltip="Modifier"><i class="material-icons">edit</i></a></td>
            <td>
                <form method="POST" action="">
                  <input type="hidden" name="person" value="<?php echo $donnees['med_depotlegal']; ?>">
                  <button class="waves-effect waves-light btn red darken-1 btn tooltipped" data-tooltip="Supprimer" data-position="left" type="submit" name="removeMedicament" value="remove" onclick="if(!confirm('Etes vous sûr de vouloir supprimer les données de ce médicament ?')) return false;"><i class="material-icons">delete_forever</i></button>
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