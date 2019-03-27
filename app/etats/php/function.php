<?php

function write($fichier, $string){
$monfichier = fopen($fichier, 'w+');
fputs($monfichier, $string);
}

function read($fichier){
	$monfichier = fopen($fichier, 'r+');
	$monfichier = fgets($monfichier);
	return $monfichier;
}

?>