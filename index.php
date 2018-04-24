<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Accueil</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
	<nav class="nav-extended light-blue lighten-3">
 		<div class="nav-wrapper">
 			<a href="#" class="brand-logo center">GSB</a>
 		</div>
 		<div class="nav-content">
 			<ul class="tabs tabs-transparent">
 				<li class="tab"><a class="active" href="#visiteur">Visiteur</a></li>
 				<li class="tab"><a href="#delegue">Délégué</a></li>
 				<li class="tab"><a href="#responsable">Responsable</a></li>
 			</ul>
 		</div>

 	</nav>

<div id="header" class="center">
	<img src="img/logo.jpg">
</div>

<div id="visiteur">
	<div class="container">
		<div class="z-depth-1 grey lighten-4 row" id="bloc">
			<form class="col s12 m12" action="traitementConnexionVisiteur.php" method="post">
				<div class='row'>
					<div class='input-field col s12 m12'>
						<i class="material-icons prefix">account_circle</i>
						<input class='validate' type='text' name='vis_nom' id='vis_nom' required/>
						<label for='vis_nom'>Votre login</label>
					</div>
				</div>

				<div class='row'>
					<div class='input-field col s12 m12'>
						<i class="material-icons prefix">lock_outline</i>
						<input class='validate' type='password' name='vis_dateembauche' id='vis_dateembauche' required/>
						<label for='vis_dateembauche'>Votre password</label>
					</div>
				</div>

				<br />

				<div class='row'>
					<button type='submit' name='connexionVisiteur' role="button" value="Se connecter" class='col s12 m12 btn btn-large waves-effect indigo' id="submit">Se connecter
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="delegue">
	<div class="container">
		<div class="z-depth-1 grey lighten-4 row" id="bloc">
			<form class="col s12 m12" action="traitementConnexionDelegue.php" method="post">
				<div class='row'>
					<div class='input-field col s12 m12'>
						<i class="material-icons prefix">account_circle</i>
						<input class='validate' type='text' name='del_nom' id='del_nom' required/>
						<label for='del_nom'>Votre login</label>
					</div>
				</div>

				<div class='row'>
					<div class='input-field col s12 m12'>
						<i class="material-icons prefix">lock_outline</i>
						<input class='validate' type='password' name='del_mdp' id='del_mdp' required/>
						<label for='del_mdp'>Votre password</label>
					</div>
				</div>

				<br />

				<div class='row'>
					<button type='submit' name='connexionDelegue' role="button" value="Se connecter" class='col s12 m12 btn btn-large waves-effect indigo' id="submit1">Se connecter
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="responsable">
	<div class="container">
		<div class="z-depth-1 grey lighten-4 row" id="bloc">
			<form class="col s12 m12" action="traitementConnexionResponsable.php" method="post">
				<div class='row'>
					<div class='input-field col s12 m12'>
						<i class="material-icons prefix">account_circle</i>
						<input class='validate' type='text' name='resp_nom' id='resp_nom' required/>
						<label for='vis_nom'>Votre login</label>
					</div>
				</div>

				<div class='row'>
					<div class='input-field col s12 m12'>
						<i class="material-icons prefix">lock_outline</i>
						<input class='validate' type='password' name='resp_mdp' id='resp_mdp' required/>
						<label for='resp_mdp'>Votre password</label>
					</div>
				</div>

				<br />

				<div class='row'>
					<button type='submit' name='connexionResponsable' role="button" value="Se connecter" class='col s12 m12 btn btn-large waves-effect indigo' id="submit2">Se connecter
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</body>

</html>
