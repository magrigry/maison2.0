<?php
			$server = "localhost";
			$login = "root";
			$pass = "ProjetLycée";
			$nombdd = "maison2.0";
try{
    $bdd = new PDO("mysql:host=$server;dbname=$nombdd", $login, $pass);
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    echo 'echec de la connexion : '.$e->getMessage();
}
?>