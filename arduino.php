<?php
/*************************/
/***  Mot de passe pour page ***/
/*************************/
$password = 'fdshuh'; //Mot de passe pour les requetes ?pass=fdshuh
if(!isset($_GET['pass'])){
	die('pass ?');
}
$pass = htmlentities($_GET['pass']);
if($pass != $password){die();}

/*************************/
/***        include   ***/
/*************************/
require 'app/etats/php/function.php';
require 'app/bdd.php';
require 'modele/conso_intrusion.php';

/*************************/
/***  recupérer que les etats****/
/*************************/
if(isset($_GET['recupEtatLumiereOnly'])){ //?recupEtatLumiereOnly
$lumiere = read('app/etats/lumiere.txt');
echo $lumiere;
die();
}

if(isset($_GET['recupEtatRadiateurOnly'])){//?recupEtatRadiateurOnly
$radiateur = read('app/etats/radiateur.txt');
echo $radiateur;
die();
}

if(isset($_GET['recupEtatAlarmeOnly'])){//?recupEtatAlarmeOnly
$alarme = read('app/etats/alarme.txt');
echo $alarme;
die();
}

if(isset($_GET['recupEtatVoletOnly'])){//?recupEtatVoletOnly
$volet = read('app/etats/volet.txt');
echo $volet;
die();
}

if(isset($_GET['recupEtatSerrureOnly'])){//?recupEtatSerrureOnly
$volet = read('app/etats/serrure.txt');
echo $volet;
die();
}



/*************************/
/***  Changer etats **********/
/*************************/
if(isset($_GET['changerEtatLumiere'])){ //&changerEtatLumiere=
$changerEtatLumiere = htmlentities($_GET['changerEtatLumiere']);
if($_GET['changerEtatLumiere'] != 'on' && $_GET['changerEtatLumiere']!= 'off'){die('on ou off ?');}
write('app/etats/lumiere.txt', $changerEtatLumiere);
}

if(isset($_GET['changerEtatVolet'])){ //&changerEtatVolet=
$changerEtatVolet = htmlentities($_GET['changerEtatVolet']);
if($_GET['changerEtatVolet'] != 'on' && $_GET['changerEtatVolet']!= 'off'){die('on ou off ?');}
write('app/etats/volet.txt', $changerEtatVolet);
}

if(isset($_GET['changerEtatAlarme'])){ //&changerEtatAlarme=
$changerEtatAlarme = htmlentities($_GET['changerEtatAlarme']);
if($_GET['changerEtatAlarme'] != 'on' && $_GET['changerEtatAlarme']!= 'off'){die('on ou off ?');}
write('app/etats/alarme.txt', $changerEtatAlarme);
}
if(isset($_GET['changerEtatRadiateur'])){ //&changerEtatRadiateur=
$changerEtatRadiateur = htmlentities($_GET['changerEtatRadiateur']);
write('app/etats/radiateur.txt', $changerEtatRadiateur);
}
if(isset($_GET['changerEtatSerrure'])){ //&changerEtatSerrure=
$changerEtatSerrure = htmlentities($_GET['changerEtatSerrure']);
write('app/etats/serrure.txt', $changerEtatSerrure);
}


/***************************************/
/* Insérer donner provenant de la carte dans la bdd */
/***************************************/


if(isset($_GET['intrusion'])//Intrusion &intrusion=true
){
	$intrusion = htmlentities($_GET['intrusion']);
	if($intrusion == 'true'){
		newIntrusion($bdd);
		echo '</br>intrusion envoyée</br>';
	}
}

if(isset($_GET['conso']) && !empty($_GET['conso'])) //Consomation electrique : &conso=
{
		$conso = htmlentities($_GET['conso']);
		newConso($conso, $bdd);
}
if(isset($_GET['niveau']) && !empty($_GET['niveau'])) //Consomation electrique : &conso=
{
		$niveau = htmlentities($_GET['niveau']);
		newNiveau($niveau, $bdd);
}



/*************************/
/***  Recup etats et afficher ***/
/*************************/
$serrure = read('app/etats/serrure.txt');
$volet = read('app/etats/volet.txt');
$alarme = read('app/etats/alarme.txt');
$lumiere = read('app/etats/lumiere.txt');
$radiateur = read('app/etats/radiateur.txt');
echo '<lumiere>'.$lumiere.'</lumiere>';
echo '<serrure>'.$serrure.'</serrure>';
echo '<volet>'.$volet.'</volet>';
echo '<alarme>'.$alarme.'</alarme>';
echo '<radiateur>'.$radiateur.'</radiateur>';


echo "-----"
?>