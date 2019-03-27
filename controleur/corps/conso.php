<?php
if(isset($_GET['jour']) && !empty($_GET['jour'])){
	$nbJour=htmlentities($_GET['jour']);
	$nbJour = (int)$nbJour;
}else{$nbJour=7;}
include '../../modele/conso_intrusion.php';
include('../../vue/vueConso.php');
?>