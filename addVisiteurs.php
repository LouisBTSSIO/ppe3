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

<body>

<?php include 'redirectConnexionResponsable.php';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if (isset($_POST['createVisiteur'])) {

    if (isset($_POST['vis_nom'])) {
        $vis_nom = $_POST['vis_nom'];
    } else {
        $vis_nom = "";
    }

    if (isset($_POST['vis_prenom'])) {
        $vis_prenom = $_POST['vis_prenom'];
    } else {
        $vis_prenom = "";
    }

    if (isset($_POST['vis_adresse'])) {
        $vis_adresse = $_POST['vis_adresse'];
    } else {
        $vis_adresse = "";
    }

    if (isset($_POST['vis_cp'])) {
        $vis_cp = $_POST['vis_cp'];
    } else {
        $vis_cp = "";
    }

    if (isset($_POST['vis_ville'])) {
        $vis_ville = $_POST['vis_ville'];
    } else {
        $vis_ville = "";
    }

    if (isset($_POST['vis_dateembauche'])) {
        $vis_dateembauche = $_POST['vis_dateembauche'];
    } else {
        $vis_dateembauche = "";
    }

    if (isset($_POST['region'])) {
        $region = $_POST['region'];
    } else {
        $region = "";
    }

    if (isset($_POST['departement'])) {
        $departement = $_POST['departement'];
    } else {
        $departement = "";
    }

    if (isset($_POST['secteur'])) {
        $secteur = $_POST['secteur'];
    } else {
        $secteur = "";
    }

    

    if (!empty($_POST['vis_nom'])
        && !empty($_POST['vis_prenom'])
        && !empty($_POST['vis_adresse'])
        && !empty($_POST['vis_cp'])
        && !empty($_POST['vis_ville'])
        && !empty($_POST['vis_dateembauche'])
        && !empty($_POST['region'])
        && !empty($_POST['departement'])
        && !empty($_POST['secteur'])) {
        // Test si les champs ne sont pas vides

        $req = $bdd->prepare('INSERT INTO visiteur_ppe3(vis_nom,
                                                vis_prenom,
                                                vis_adresse,
                                                vis_cp,
                                                vis_ville,
                                                vis_dateembauche,
                                                region,
                                                departement,
                                                secteur)
                                        VALUES(:vis_nom,
                                                :vis_prenom,
                                                :vis_adresse,
                                                :vis_cp,
                                                :vis_ville,
                                                :vis_dateembauche,
                                                :region,
                                                :departement,
                                                :secteur)');
        // Inserer valeurs dans la table visiteur_ppe3

        $req->execute(array('vis_nom' => $vis_nom,
            'vis_prenom' => $vis_prenom,
            'vis_adresse' => $vis_adresse,
            'vis_cp' => $vis_cp,
            'vis_ville' => $vis_ville,
            'vis_dateembauche' => $vis_dateembauche,
            'region' => $region,
            'departement' => $departement,
            'secteur' => $secteur));

        echo "<script>alert(\"Le visiteur à bien été ajouté !\")</script>";
    } else {
        echo "<script>alert(\"Veuillez remplir tous les champs!\")</script>";
    }
}

?>

<nav>
    <div class="nav-wrapper light-blue lighten-3">
        <a href="menuDelegue.php" class="brand-logo">GSB</a>
        <ul id="nav-mobile" class="right">
            <li><a href="visiteursResponsable.php">Visiteurs</a></li>
            <li><a href="practiciensResponsable.php">Praticiens</a></li>
            <li><a href="medicamentsResponsable.php">Medicaments</a></li>
            <li><a href="menuResponsableCr.php">Comptes-Rendus</a></li>
            <li><a class="waves-effect waves-light btn  grey darken-1" href="traitementDeconnexion.php">Déconnexion</a></li>
        </ul>
    </div>
</nav>

<h1 class="center"> Ajouter un visiteur </h1>

<div class="container">
    <form method="POST" action="">

        <div class="input-field col s12">
            <label for="vis_nom">Nom</label>
            <input type="text" id="vis_nom" name="vis_nom"/>
        </div>

        <div class="input-field col s12">
            <label for="vis_prenom">Prénom</label>
            <input type="text" id="vis_prenom" name="vis_prenom"/>
        </div>

        <div class="input-field col s12">
            <label for="vis_adresse">Adresse</label>
            <input type="text" id="vis_adresse" name="vis_adresse"/>
        </div>

        <div class="input-field col s12">
            <label for="vis_cp">Code Postal</label>
            <input type="number" id="vis_cp" name="vis_cp"/>
        </div>

        <div class="input-field col s12">
            <label for="vis_ville">Ville</label>
            <input type="text" id="vis_ville" name="vis_ville"/>
        </div>

        <div class="input-field col s12">
            <label for="vis_dateembauche">Date Embauche</label>
            <input type="text" class="datepicker" id="vis_dateembauche" name="vis_dateembauche">
        </div>

        <div class="input-field col s12">
            <label for="region">Région</label>
            <input type="text" id="region" name="region"/>
        </div>

        <div class="input-field col s12">
            <label for="departement">Département</label>
            <input type="text" id="departement" name="departement"/>
        </div>

        <div class="input-field col s12">
            <label for="secteur">Secteur</label>
            <input type="text" id="secteur" name="secteur"/>
        </div>

        <div id="button">
            <input class="waves-effect waves-light btn form-control add_btn" type="submit" name="createVisiteur" value="Valider"/>
        </div>

    </form>
</div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="js/index.js"></script>

</body>

</html>