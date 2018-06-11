<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un visiteur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

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


<h1 class="center"> Statistique </h1>

<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

$query = "SELECT count(vis_matricule) as nb_vis, secteur FROM visiteur_ppe3 GROUP BY secteur";
$res = $bdd->query($query);
$data = '';
while($row=$res->fetch(PDO::FETCH_ASSOC))
{
  $data .=  "['".$row['secteur']."',".$row['nb_vis']."],";
}

?>

  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>

     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['nb_vis', 'secteur'],
          <?php
          echo substr($data,0, -1);
          ?>
        ]);

        var options = {
          title: 'Nombre de visiteurs par secteur'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </body>
</html>
