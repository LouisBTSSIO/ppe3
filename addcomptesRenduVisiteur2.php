<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un compte rendu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

<?php include 'redirectConnexionVisiteur.php';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['createCompteRendu'])) {   

    if(isset($_POST['vis_matricule']))
        $vis_matricule=$_POST['vis_matricule'];
    else
        $vis_matricule="";

    if(isset($_POST['rp_num']))
        $rp_num=$_POST['rp_num'];
    else
        $rp_num="";

    if(isset($_POST['rap_date']))
        $rap_date=$_POST['rap_date'];
    else
        $rap_date="";

    if(isset($_POST['rap_bilan']))
        $rap_bilan=$_POST['rap_bilan'];
    else
        $rap_bilan="";

    if(isset($_POST['rap_motif']))
        $rap_motif=$_POST['rap_motif'];
    else
        $rap_motif="";

    if(isset($_POST['pra_coefnotoriete']))
        $pra_coefnotoriete=$_POST['pra_coefnotoriete'];
    else
        $pra_coefnotoriete="";

    if(isset($_POST['med_depotlegal']))
        $med_depotlegal=$_POST['med_depotlegal'];
    else
        $med_depotlegal="";

    if(isset($_POST['echantillon']))
        $echantillon=$_POST['echantillon'];
    else
        $echantillon="";


        if(!empty($_POST['vis_matricule'])
            &&!empty($_POST['rp_num'])
            &&!empty($_POST['rap_date'])
            &&!empty($_POST['rap_bilan'])
            &&!empty($_POST['rap_motif'])
            &&!empty($_POST['pra_coefnotoriete'])
            &&!empty($_POST['med_depotlegal'])
            &&!empty($_POST['echantillon'])) { 
        // Test si les champs ne sont pas vides     

            $req = $bdd->prepare('INSERT INTO rapport_visite(vis_matricule, 
                                                            rp_num, 
                                                            rap_date, 
                                                            rap_bilan, 
                                                            rap_motif, 
                                                            pra_coefnotoriete, 
                                                            med_depotlegal, 
                                                            echantillon) 
                                                    VALUES(:vis_matricule, 
                                                            :rp_num, 
                                                            :rap_date, 
                                                            :rap_bilan, 
                                                            :rap_motif, 
                                                            :pra_coefnotoriete, 
                                                            :med_depotlegal, 
                                                            :echantillon)'); 
            // Inserer valeurs dans la table rapport_visite

            $req ->execute(array('vis_matricule' => $vis_matricule, 
                                'rp_num' => $rp_num,
                                'rap_date' => $rap_date, 
                                'rap_bilan' => $rap_bilan, 
                                'rap_motif' => $rap_motif, 
                                'pra_coefnotoriete' => $pra_coefnotoriete, 
                                'med_depotlegal' => $med_depotlegal, 
                                'echantillon' => $echantillon));
            
            echo "<script>alert(\"Le compte-rendu à bien été ajouté !\")</script>";
        }
        else {
            echo "<script>alert(\"Veuillez remplir tous les champs!\")</script>";
    }
} 
 
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

<h1 class="center"> Ajouter un compte-rendu (Remplaçant) </h1>

<div class="container">
    <form method="POST" action="">

        <div class="input-field col s12">
            <label for="vis_matricule" >Matricule</label>
            <input readonly type="text" id="vis_matricule" name="vis_matricule" value="<?= $_SESSION['vis_matricule'] ?>"/>   
        </div>  

     

        <div class="input-field col s12">
            <label for="rp_num">Praticiens remplaçants</label><br />
            <select name="rp_num" id="rp_num">
                <option value="" disabled selected>Choisissez un praticien remplaçant</option
                    <?php
                    $reponse = $bdd->prepare('SELECT rp_num,rp_nom FROM remplacant');
                    $reponse->execute();
                    $donnees = $reponse->fetchAll();
                    foreach ($donnees as $v):?>
                    <option value="<?= $v['rp_num'] ?>"><?= $v['rp_nom'] ?></option>
                <?php endforeach; ?>
            </select>
        </div> 

        <div class="input-field col s12">
            <label for="rap_date">Date</label> 
            <input type="text" class="datepicker" id="rap_date" name="rap_date">
        </div>

        <div class="input-field col s12">
            <label for="rap_bilan">Bilan</label> 
            <input type="text" id="rap_bilan" name="rap_bilan"/>  
        </div> 

        <div class="input-field col s12">
            <label for="rap_motif">Motif</label>  
            <input type="text" id="rap_motif" name="rap_motif"/> 
        </div> 

        <div class="input-field col s12">
            <label for="med_depotlegal">Médicaments</label><br />
            <select name="med_depotlegal" id="med_depotlegal">
                <option value="" disabled selected>Choisissez un médicament</option>
                    <?php
                    $reponse = $bdd->prepare('SELECT med_depotlegal,med_nomcommercial FROM medicament');
                    $reponse->execute();
                    $donnees = $reponse->fetchAll();
                    foreach ($donnees as $v):?>
                    <option value="<?= $v['med_depotlegal'] ?>"><?= $v['med_nomcommercial'] ?></option>
                <?php endforeach; ?>
            </select>
        </div> 

        <div class="input-field col s12">
            <label for="echantillon">Echantillons</label> 
            <input type="number" id="echantillon" name="echantillon">
        </div>

        <div class="input-field col s12">
            <label for="pra_coefnotoriete">Note</label><br />
            <select name="pra_coefnotoriete" id="pra_coefnotoriete">
                <option value="" disabled selected>Donnez une note à la séance</option>
                    <?php
                    $reponse = $bdd->prepare('SELECT pra_coefnotoriete FROM coefficient');
                    $reponse->execute();
                    $donnees = $reponse->fetchAll();
                    foreach ($donnees as $v):?>
                    <option value="<?= $v['pra_coefnotoriete'] ?>"><?= $v['pra_coefnotoriete'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div id="button">
            <input class="waves-effect waves-light btn form-control add_btn" type="submit" name="createCompteRendu" value="Valider"/>
        </div>

    </form>
</div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="js/index.js"></script>

</body>

</html>