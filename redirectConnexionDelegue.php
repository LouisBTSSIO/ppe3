<?php
session_start();

if(!isset($_SESSION['del_nom'])) {
    header('Location: index.php');
}

?>