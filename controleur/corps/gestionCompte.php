<?php
if(!isset($_SESSION['user'])){die('Tentative d\'accès sans authentification !');} 
require_once '../../modele/gestionCompte.php'; //Fonctions sql
$allUsers = getAllUsernames($bdd);
include('../../vue/vueGestionCompte.php');
?>