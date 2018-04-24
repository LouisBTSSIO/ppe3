<?php
session_start();

if(!isset($_SESSION['vis_nom'])) {
    header('Location: index.php');
}

?>