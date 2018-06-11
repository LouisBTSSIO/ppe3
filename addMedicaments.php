<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un médicament</title>
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

if(isset($_POST['createMedicament'])) { 

    if(isset($_POST['med_depotlegal']))
        $med_depotlegal=$_POST['med_depotlegal'];
    else
        $med_depotlegal="";

    if(isset($_POST['med_nomcommercial']))
        $med_nomcommercial=$_POST['med_nomcommercial'];
    else
        $med_nomcommercial="";

    if(isset($_POST['fam_code']))
        $fam_code=$_POST['fam_code'];
    else
        $fam_code="";

    if(isset($_POST['med_composition']))
        $med_composition=$_POST['med_composition'];
    else
        $med_composition="";

    if(isset($_POST['med_effets']))
        $med_effets=$_POST['med_effets'];
    else
        $med_effets="";

    if(isset($_POST['med_contreindic']))
        $med_contreindic=$_POST['med_contreindic'];
    else
        $med_contreindic="";

    if(isset($_POST['med_prixechantillon']))
        $med_prixechantillon=$_POST['med_prixechantillon'];
    else
        $med_prixechantillon="";


        if(!empty($_POST['med_depotlegal'])
            &&!empty($_POST['med_nomcommercial'])
            &&!empty($_POST['fam_code'])
            &&!empty($_POST['med_composition'])
            &&!empty($_POST['med_effets'])
            &&!empty($_POST['med_contreindic'])
            &&!empty($_POST['med_prixechantillon'])) { 
        // Test si les champs ne sont pas vides     

            $req = $bdd->prepare('INSERT INTO medicament(med_depotlegal, 
                                                        med_nomcommercial, 
                                                        fam_code, 
                                                        med_composition, 
                                                        med_effets, 
                                                        med_contreindic, 
                                                        med_prixechantillon) 
                                                VALUES(:med_depotlegal, 
                                                :med_nomcommercial, 
                                                :fam_code, 
                                                :med_composition, 
                                                :med_effets, 
                                                :med_contreindic, 
                                                :med_prixechantillon)'); 
            // Inserer valeurs dans la table medicament

            $req ->execute(array('med_depotlegal' => $med_depotlegal,
                                'med_nomcommercial' => $med_nomcommercial, 
                                'fam_code' => $fam_code, 
                                'med_composition' => $med_composition, 
                                'med_effets' => $med_effets,
                                'med_contreindic' => $med_contreindic, 
                                'med_prixechantillon' => $med_prixechantillon));

            echo "<script>alert(\"Le médicament à bien été ajouté !\")</script>";
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

<h1 class="center"> Ajouter un médicament </h1>

<div class="container">
    <form method="POST" action="">
        <table>

            <div class="input-field col s12">
                <label for="med_depotlegal">Code</label>
                <input type="text" id="med_depotlegal" name="med_depotlegal"/>
            </div>

            <div class="input-field col s12">
                <label for="med_nomcommercial">Nom Commercial</label>
                <input type="text" id="med_nomcommercial" name="med_nomcommercial"/>
            </div>

            <div class="input-field col s12">
                <label for="fam_code">Famille</label><br />
                <select name="fam_code" id="fam_code">
                    <option value="" disabled selected>Choisissez une famille</option>
                        <?php
                        $reponse = $bdd->prepare('SELECT fam_code,fam_libelle FROM famille');
                        $reponse->execute();
                        $donnees = $reponse->fetchAll();
                        foreach ($donnees as $v):?>
                        <option value="<?= $v['fam_code'] ?>"><?= $v['fam_libelle'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div> 


            <div class="input-field col s12">
                <label for="med_composition">Composition</label>
                <input type="text" id="med_composition" name="med_composition"/>
            </div>

            <div class="input-field col s12">
                <label for="med_effets">Effets Indésirables</label>
                <input type="text" id="med_effets" name="med_effets"/>
            </div>

            <div class="input-field col s12">
                <label for="med_contreindic">Contre indications</label>
                <input type="text" id="med_contreindic" name="med_contreindic"/>
            </div>

            <div class="input-field col s12">
                <label for="med_prixechantillon">Prix</label>
                <input type="number" id="med_prixechantillon" name="med_prixechantillon"/>
            </div>

            
            <div id="button">
                <input class="waves-effect waves-light btn form-control add_btn" type="submit" name="createMedicament" value="Valider"/>
            </div>
            

        </form>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="js/index.js"></script>

</body>

</html>