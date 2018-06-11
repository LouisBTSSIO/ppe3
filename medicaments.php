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

<?php include 'redirectConnexionVisiteur.php';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$sql = "SELECT * FROM medicament";              
// Récupérer toutes les données de la table medicament
$reponse = $bdd->query($sql);

$sql1 = 'SELECT * FROM medicament LEFT JOIN famille ON famille.fam_code = medicament.fam_code';
$reponse1 = $bdd->query($sql1); 

?>
<nav>
    <div class="nav-wrapper light-blue lighten-3">
        <a href="menuVisiteur.php" class="brand-logo">GSB</a>
        <ul id="nav-mobile" class="right">
            <li><a href="practiciens.php">Praticiens</a></li>
            <li><a href="medicaments.php">Medicaments</a></li>
            <li><a href="comptesRenduVisiteur.php">Comptes-Rendus</a></li>
            <li><a class="waves-effect waves-light btn  grey darken-1" href="traitementDeconnexion.php">Déconnexion</a></li>
        </ul>
    </div>
</nav>

<h1 class="center"> Liste des médicaments </h1>

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
while ($donnees = $reponse->fetch() and $donnees1 = $reponse1->fetch()) {?>
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