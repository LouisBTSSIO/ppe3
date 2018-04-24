<?php
session_start();

if(!isset($_SESSION['resp_nom'])) {
	header('Location: index.php');
}

?>