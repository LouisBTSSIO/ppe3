<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un praticien</title>
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
    
if(isset($_POST['createPracticien'])) {   

    if(isset($_POST['pra_nom']))
        $pra_nom=$_POST['pra_nom'];
    else
        $pra_nom="";

    if(isset($_POST['pra_prenom']))
        $pra_prenom=$_POST['pra_prenom'];
    else
        $pra_prenom="";

    if(isset($_POST['pra_adresse']))
        $pra_adresse=$_POST['pra_adresse'];
    else
        $pra_adresse="";

    if(isset($_POST['pra_cp']))
        $pra_cp=$_POST['pra_cp'];
    else
        $pra_cp="";

    if(isset($_POST['pra_ville']))
        $pra_ville=$_POST['pra_ville'];
    else
        $pra_ville="";

    if(isset($_POST['pra_coefnotoriete']))
        $pra_coefnotoriete=$_POST['pra_coefnotoriete'];
    else
        $pra_coefnotoriete="";

    if(isset($_POST['typ_code']))
        $typ_code=$_POST['typ_code'];
    else
        $typ_code="";

    if(!empty($_POST['pra_nom'])
        &&!empty($_POST['pra_prenom'])
        &&!empty($_POST['pra_adresse'])
        &&!empty($_POST['pra_cp'])
        &&!empty($_POST['pra_ville'])
        &&!empty($_POST['pra_coefnotoriete'])
        &&!empty($_POST['typ_code'])) { 
    // Test si les champs ne sont pas vides     

        $req = $bdd->prepare('INSERT INTO practicien(pra_nom, 
                                                    pra_prenom, 
                                                    pra_adresse, 
                                                    pra_cp, 
                                                    pra_ville, 
                                                    pra_coefnotoriete, 
                                                    typ_code) 
                                            VALUES( :pra_nom, 
                                                    :pra_prenom, 
                                                    :pra_adresse, 
                                                    :pra_cp, 
                                                    :pra_ville, 
                                                    :pra_coefnotoriete, 
                                                    :typ_code)'); 
        // Inserer valeurs dans la table praticien

        $req ->execute(array('pra_nom' => $pra_nom, 
                            'pra_prenom' => $pra_prenom, 
                            'pra_adresse' => $pra_adresse, 
                            'pra_cp' => $pra_cp,
                            'pra_ville' => $pra_ville, 
                            'pra_coefnotoriete' => $pra_coefnotoriete, 
                            'typ_code' => $typ_code));

        echo "<script>alert(\"Le praticien à bien été ajouté !\")</script>";
    }
    else {
        echo "<script>alert(\"Veuillez remplir tous les champs !\")</script>";
    }
} 

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

<h1 class="center"> Ajouter un praticien </h1>

<div class="container">
    <form method="POST" action="">

        <div class="input-field col s12">
            <label for="pra_nom">Nom</label>
            <input type="text" id="pra_nom" name="pra_nom"/>   
        </div> 

        <div class="input-field col s12">
            <label for="pra_prenom">Prénom</label>
            <input type="text" id="pra_prenom" name="pra_prenom"/>   
        </div>  

        <div class="input-field col s12">
            <label for="pra_adresse">Adresse</label>
            <input type="text" id="pra_adresse" name="pra_adresse"/>   
        </div> 

        <div class="input-field col s12">
            <label for="pra_cp">Code Postal</label>
            <input type="number" id="pra_cp" name="pra_cp"/>   
        </div> 

        <div class="input-field col s12">
            <label for="pra_ville">Ville</label>
            <input type="text" id="pra_ville" name="pra_ville"/>   
        </div> 

        <div class="input-field col s12">
            <label for="pra_coefnotoriete">Notoriété</label>
            <input type="number" id="pra_coefnotoriete" name="pra_coefnotoriete"/>   
        </div>

        <div class="input-field col s12">
                <label for="typ_code">Type</label><br />
                <select name="typ_code" id="typ_code">
                    <option value="" disabled selected>Choisissez un type de praticien</option>
                        <?php
                        $reponse = $bdd->prepare('SELECT typ_code,typ_libelle FROM type_practicien');
                        $reponse->execute();
                        $donnees = $reponse->fetchAll();
                        foreach ($donnees as $v):?>
                        <option value="<?= $v['typ_code'] ?>"><?= $v['typ_libelle'] ?></option>
                    <?php endforeach; ?>
                </select>
        </div> 

        <div id="button">
            <input class="waves-effect waves-light btn form-control add_btn" type="submit" name="createPracticien" value="Valider"/>
        </div>

    </form>
</div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="js/index.js"></script>

</body>

</html>