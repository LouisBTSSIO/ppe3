<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comptes-Rendus des visiteurs par région</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

<?php include 'redirectConnexionResponsable.php';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$sql = "SELECT * FROM visiteur_ppe3"; // Récupérer toutes les données de la table visiteur
$reponseDelegue = $bdd->query($sql);

$req = $bdd->prepare('SELECT DISTINCT(region) FROM visiteur_ppe3 ORDER BY region ASC');
$req->execute();
$donnees = $req->fetchAll();

$a = 0;
$test = count($donnees);
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

<h1 class="center"> Liste des comptes-rendus des visiteurs par région </h1>

<form method="post" action="">

<div class="container">
<label for="cr_visiteur">Type</label><br />
                <select name="cr_visiteur" id="cr_visiteur">
                    <option value="" disabled selected>Choisissez une région</option>
                    <?php
for ($i = 0; $i < $test; $i++) {
    echo '<option value="' . $donnees[$i]['region'] . '">' . $donnees[$i]['region'] . '</option>';
}
?>
                </select>
        </div>

        <div id="button">
            <input class="waves-effect waves-light btn form-control add_btn" type="submit" name="createPracticien" value="Valider"/>
        </div>

  </form>

<?php

if (isset($_POST['cr_visiteur'])) {

    $requete2 = $bdd->prepare('SELECT * FROM rapport_visite WHERE vis_matricule = (
    SELECT vis_matricule FROM visiteur_ppe3 WHERE region = :region) ');
    $requete2->execute(array('region' => $_POST['cr_visiteur']));
    $donnees2 = $requete2->fetchAll();



    foreach ($donnees2 as $key => $value) {
        ?>

        <div class="card container small grey lighten-2 cr">
            <div class="card-image waves-effect waves-block waves-light center">
                <h5> Numéro du rapport : <?php echo $value['rap_num'] ?> </h5>
                <h5> Date du Rapport : <?php echo $value['rap_date'] ?> </h5>
                <h5> Numéro du visiteur : <?php echo $value['vis_matricule'] ?> </h5>
            </div>
            <div class="card-content container">
                  <a class="waves-effect waves-light btn light-blue lighten-3 card-title activator grey-text text-darken-4 center">Plus d'informations</a>
            </div>
            <div class="card-reveal center">
                  <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                  <br>
                  <h5> Praticien </h5>
                  <p> <?php echo $value['pra_num'] ?> </p>
                  <h5> Bilan </h5>
                  <p> <?php echo $value['rap_bilan'] ?> </p>
                  <h5> Motif </h5>
                  <p> <?php echo $value['rap_motif'] ?> </p>
                  <h5> Notoriété </h5>
                  <p> <?php echo $value['pra_coefnotoriete'] ?> </p>
                  <h5> Code du médicament </h5>
                  <p> <?php echo $value['med_depotlegal'] ?> </p>
                  <h5> Nombre d'échantillons </h5>
                  <p> <?php echo $value['echantillon'] ?> </p>
                  
              </div>
        </div>
        <?php
        
    }
}
    
?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>






