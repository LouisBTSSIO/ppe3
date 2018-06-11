<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des comptes rendus</title>
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

$del_matricule = $_SESSION['del_matricule'];
$sql = "SELECT * FROM rapport_visite_del WHERE del_matricule = '" . $del_matricule . "'";
$reponse = $bdd->query($sql);

$sql1 = 'SELECT * FROM rapport_visite_del LEFT JOIN practicien ON practicien.pra_num = rapport_visite_del.pra_num';
    $reponse1 = $bdd->query($sql1); 

$sql2 = 'SELECT * FROM rapport_visite_del LEFT JOIN remplacant ON remplacant.rp_num = rapport_visite_del.rp_num';
    $reponse2 = $bdd->query($sql2);

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

<h1 class="center"> Liste des comptes-rendus </h1>



<td><a class="waves-effect waves-light btn light-blue lighten-3 btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="Voir comptes-rendus visiteurs" id="voir" href="comptesRenduVisiteurRegion.php"><i class="material-icons">folder</i></a></td>
<td><a class="waves-effect waves-light btn green lighten-2 btn tooltipped" data-position="left" data-delay="50" data-tooltip="Ajouter un compte-rendu" id="ajouter" href="addcomptesRenduDelegue.php"><i class="material-icons">add</i></a></td>


<?php
while ($donnees = $reponse->fetch() and $donnees1 = $reponse1->fetch() and $donnees2 = $reponse2->fetch()) { ?>
    
          <div class="card container small grey lighten-2 cr">
                <div class="card-image waves-effect waves-block waves-light center">
                    <h5>Numéro du Rapport : <?php echo $donnees['rap_num_del']; ?></h5>
                    <h5>Date du Rapport : <?php echo $donnees['rap_date_del']; ?></h5>
              </div>
              <div class="card-content container">
                  <a class="waves-effect waves-light btn light-blue lighten-3 card-title activator grey-text text-darken-4 center">Plus d'informations</a>
              </div>
              <div class="card-reveal center">
                  <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                  <br>
                  <h5> Praticien </h5>
                  <p><?php 
                  if ($donnees1["pra_num"] == NULL) {
                    echo $donnees2['rp_prenom'] . ' ' . $donnees2['rp_nom'];
                  }else {
                  echo $donnees1['pra_prenom'] . ' ' . $donnees1['pra_nom'];
                }
                 ?></p>
                  <h5> Bilan </h5>
                  <p><?php echo $donnees['rap_bilan_del']; ?></p>
                  <h5> Motif </h5>
                  <p><?php echo $donnees['rap_motif_del']; ?></p>
                  <h5> Coefficient </h5>
                  <p><?php echo $donnees['pra_coefnotoriete']; ?></p>
                  <h5> Code Médicament </h5>
                  <p><?php echo $donnees['med_depotlegal']; ?></p>
                  <h5> Nombre d'échantillons </h5>
                  <p><?php echo $donnees['echantillon_del']; ?></p>
              </div>
          </div>
<?php
}
?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="js/index.js"></script>

</body>

</html>