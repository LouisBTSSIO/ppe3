<?php session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=gsb;charset=utf8', 'root', '');
}
catch(Exception $e) {
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['connexionDelegue'])) {
	if(isset($_POST['del_nom']))
        $del_nom=$_POST['del_nom'];
    else
        $del_nom="";

    if(isset($_POST['del_mdp']))
        $del_mdp=$_POST['del_mdp'];
    else
        $del_mdp="";


    $reqDelegue = $bdd->prepare('SELECT * FROM delegue WHERE del_nom = :del_nom AND del_mdp = :del_mdp'); 
    // Récupérer toutes les données de la table delegue lorsque le del_nom entré et le del_mdp entré correspondent bien avec la bdd

    $reqDelegue->execute(array(
        'del_nom' => $del_nom,
        'del_mdp' => $del_mdp));
    $resultatDelegue = $reqDelegue->fetch();

    if (!$resultatDelegue) { 
        ?>
       <script type="text/javascript">alert('La combinaison login/mot de passe ne correspond à personne.')</script>
       <?php
       include 'index.php';
    }
    else {
        $_SESSION['del_matricule'] = $resultatDelegue['del_matricule'];
        $_SESSION['del_nom'] = $resultatDelegue['del_nom'];
        header('Location: menuDelegue.php');   
    }
}
?>