<?php session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8','root','');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['connexionResponsable'])) {
	if(isset($_POST['resp_nom']))
        $resp_nom=$_POST['resp_nom'];
    else
        $resp_nom="";

    if(isset($_POST['resp_mdp']))
        $resp_mdp=$_POST['resp_mdp'];
    else
        $resp_mdp="";

    // Vérification des identifiants

    $reqResponsable = $bdd->prepare('SELECT * FROM responsable WHERE resp_nom = :resp_nom AND resp_mdp = :resp_mdp'); 
    // Récupérer toutes les données de la table responsable lorsque le le resp_nom entré et le resp_mdp entré correspondent bien avec la bdd
    
    $reqResponsable->execute(array(
        'resp_nom' => $resp_nom,
        'resp_mdp' => $resp_mdp));
    $resultatResponsable = $reqResponsable->fetch();

    if (!$resultatResponsable) { 
        ?>
       <script type="text/javascript">alert('La combinaison login/mot de passe ne correspond à personne.')</script>
       <?php
       include 'index.php';
    }
    else {
        $_SESSION['resp_matricule'] = $resultatResponsable['resp_matricule'];
        $_SESSION['resp_nom'] = $resultatResponsable['resp_nom'];
        header('Location: menuResponsable.php');   
    }
}
?>