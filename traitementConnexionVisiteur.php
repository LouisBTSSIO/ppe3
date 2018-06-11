<?php session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['connexionVisiteur'])) {
    // VISITEUR
    if(isset($_POST['vis_nom']))
        $vis_nom=$_POST['vis_nom'];
    else
        $vis_nom="";

    if(isset($_POST['vis_dateembauche']))
        $vis_dateembauche=$_POST['vis_dateembauche'];
    else
        $vis_dateembauche="";

    // Vérification des identifiants

    $reqVisiteur = $bdd->prepare('SELECT * FROM visiteur_ppe3 WHERE vis_nom = :vis_nom AND vis_dateembauche = :vis_dateembauche'); 
    // Récupérer toutes les données de la table visiteur_ppe3 lorsque le le vis_nom entré et le vis_dateembauche entré correspondent bien avec la bdd
    
    $reqVisiteur->execute(array(
        'vis_nom' => $vis_nom,
        'vis_dateembauche' => $vis_dateembauche));
    $resultatVisiteur = $reqVisiteur->fetch();

    if (!$resultatVisiteur) { 
        ?>
       <script type="text/javascript">alert('La combinaison login/mot de passe ne correspond à personne.')</script>
       <?php
       include 'index.php';
    }
    else {
        $_SESSION['vis_matricule'] = $resultatVisiteur['vis_matricule'];
        $_SESSION['vis_nom'] = $resultatVisiteur['vis_nom'];
        header('Location: menuVisiteur.php');

    }

    }
?>