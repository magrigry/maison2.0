<?php
include('modele/conso_intrusion.php');
$requeteLastIntrusion = getIntrusion($bdd, '1');
$lastIntrusion = $requeteLastIntrusion->fetch();
include 'vue/vueMenu.php';
?>