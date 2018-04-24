<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
</head>

<body>

<?php
include 'redirectConnexionVisiteur.php';
?> 

	<nav>
		<div class="nav-wrapper light-blue lighten-3">
			<a href="#" class="brand-logo center">GSB</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a class="waves-effect waves-light btn  grey darken-1" href="traitementDeconnexion.php">Déconnexion</a></li>
			</ul>
		</div>
	</nav>

	<div class="container" id="menu">

		<div class="col s12 m12 l6">
			<div class="card grey darken-1">
				<div class="card-content white-text">
					<a class="card-title white-text center" href="practiciens.php">Praticiens</a>
				</div>
			</div>
		</div>

		<div class="col s12 m12 l6">
			<div class="card  grey darken-1">
				<div class="card-content">
					<a class="card-title white-text center" href="medicaments.php">Médicaments</a>
				</div>
			</div>
		</div>

		<div class="col s12 m12 l6">
			<div class="card  grey darken-1">
				<div class="card-content white-text">
					<a class="card-title white-text center" href="comptesRenduVisiteur.php">Comptes-Rendus</a>
				</div>
			</div>
		</div>

	</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</body>
</html>
