<?php
function newIntrusion($bdd){
	$date = date('Y-m-d');
	$heure = date('G:i:s');
	
	$requete = $bdd-> prepare(						  	
	"INSERT INTO intrusion(date, heure) VALUES(:date, :heure)");	
	$requete->bindParam(':date', $date);
	$requete->bindParam(':heure', $heure);
	$requete-> execute();
	$requete->CloseCursor();
}

function getIntrusion($bdd, $limite){
	$requeteConso = $bdd->query('SELECT * FROM intrusion ORDER BY id DESC LIMIT 0,'.$limite);
	return $requeteConso;
	//$donnees = $requeteConso->fetch();
}

function newConso($conso, $bdd){
	$ip = $_SERVER['REMOTE_ADDR'];
	$requete = $bdd-> prepare(						  	
	"INSERT INTO consommation(valeur) VALUES(:valeur)");	
	$requete->bindParam(':valeur', $conso);
	$requete-> execute();
	$requete->CloseCursor();
}

function getConso($bdd, $limite){
	$requeteConso = $bdd->query('SELECT * FROM consommation ORDER BY id LIMIT 0,'.$limite);
	return $requeteConso;
	//$donnees = $requeteConso->fetch();
}

function newFioul($niveau, $bdd){
	$date = date('Y-m-d');
	$heure = date('G:i:s');
	
	$requete = $bdd-> prepare(						  	
	"INSERT INTO fioul(niveau, date, heure) VALUES(:niveau, :date, :heure)");	
	$requete->bindParam(':niveau', $niveau);
	$requete->bindParam(':date', $date);
	$requete->bindParam(':heure', $heure);
	$requete-> execute();
	$requete->CloseCursor();
}

function getFioul($bdd, $limite){
	$requeteConso = $bdd->query('SELECT * FROM fioul ORDER BY id DESC LIMIT 0,'.$limite);
	return $requeteConso;
	//$donnees = $requeteConso->fetch();
}

function newNiveau($niveau, $bdd){
	$date = date('Y-m-d');
	$heure = date('G:i:s');
	
	$requete = $bdd-> prepare(
	"INSERT INTO fioul(niveau, date, heure) VALUES(:niveau, :date, :heure)");	
	$requete->bindParam(':niveau', $niveau);
	$requete->bindParam(':date', $date);
	$requete->bindParam(':heure', $heure);
	$requete-> execute();
	$requete->CloseCursor();
}

function getNiveau($bdd, $limite){
	$requeteConso = $bdd->query('SELECT * FROM fioul ORDER BY id DESC LIMIT 0,'.$limite);
	return $requeteConso;
	//$donnees = $requeteConso->fetch();
}

?>