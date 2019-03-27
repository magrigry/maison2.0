<?php
include('../../modele/conso_intrusion.php');
include('../../modele/gestionCompte.php');
$requeteLastIntrusion = getIntrusion($bdd, '1');
$lastIntrusion = $requeteLastIntrusion->fetch();
include('../../vue/vueAccueil.php');
?>