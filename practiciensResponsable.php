<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des praticiens</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css"></head>
</head>

<body>

<?php include 'redirectConnexionResponsable.php';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}
    
if(isset($_POST['removePracticien'])) {
    $reqResponsable = $bdd->prepare('DELETE FROM practicien WHERE pra_num = :pra_num');      
    // Supprimer une ligne de donnée de la table praticien gràce au pra_num
    $reqResponsable->execute(array('pra_num' => $_POST['person']));
}

$sqlResponsable = "SELECT * FROM practicien";              
// Récupérer toutes les données de la table praticien
$reponseResponsable = $bdd->query($sqlResponsable);

$sql1 = 'SELECT * FROM practicien LEFT JOIN type_practicien ON practicien.typ_code = type_practicien.typ_code';
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

<h1 class="center"> Liste des praticiens </h1>

<td><a class="waves-effect waves-light btn green lighten-2 btn tooltipped" data-position="left" data-delay="50" data-tooltip="Ajouter un practicien" id="ajouter" href="addPracticiens.php"><i class="material-icons">add</i></a></td>

<table class="highlight">
    <thead>
        <tr>
            <th>Numéro du praticien</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Ville</th>
            <th>Notoriété</th>
            <th>Libelle</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

<?php
while ($donnees = $reponseResponsable->fetch() and $donnees1 = $reponse1->fetch()) {?>
    <tbody>
        <tr>    
            <td><?php echo $donnees['pra_num']; ?></td>
            <!-- Afficher les données de la colonne pra_num -->
            <td><?php echo $donnees['pra_nom']; ?></td>
            <!-- Afficher les données de la colonne pra_nom -->
            <td><?php echo $donnees['pra_prenom']; ?></td>
            <!-- Afficher les données de la colonne pra_prenom -->
            <td><?php echo $donnees['pra_adresse']; ?></td>
            <!-- Afficher les données de la colonne pra_adresse -->
            <td><?php echo $donnees['pra_cp']; ?></td>   
            <!-- Afficher les données de la colonne pra_cp -->
            <td><?php echo $donnees['pra_ville']; ?></td>   
            <!-- Afficher les données de la colonne pra_ville -->  
            <td><?php echo $donnees['pra_coefnotoriete']; ?></td>   
            <!-- Afficher les données de la colonne pra_coefnotoriete -->     
            <td><?php echo $donnees1['typ_libelle']; ?></td> 
            <!-- Afficher les données de la colonne typ_libelle -->  
            <td><a class="waves-effect waves-light btn light-blue lighten-3 btn tooltipped" data-position="left" data-delay="50" data-tooltip="Modifier"><i class="material-icons">edit</i></a></td>
            <td>
                <form method="POST" action="">
                    <input type="hidden" name="person" value="<?php echo $donnees['pra_num']; ?>">
                    <button class="waves-effect waves-light btn red darken-1 btn tooltipped" data-tooltip="Supprimer" data-position="left" type="submit" name="removePracticien" value="remove" onclick="if(!confirm('Etes vous sûr de vouloir supprimer les données de ce praticien ?')) return false;"><i class="material-icons">delete_forever</i></button>
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