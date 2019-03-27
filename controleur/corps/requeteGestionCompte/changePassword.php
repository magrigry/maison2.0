<?php 
//logs
session_start();
error_reporting(0);
if(!isset($_SESSION['user'])){die('Tentative d\'accès sans authentification !');} 
//Sytème de logs
if (!file_exists('../../../logs'.date('Y-m-d G'))) {
   mkdir('../../../logs/'.date('Y-m-d'));
}
// 1 : on ouvre le fichier
$monfichier = fopen('../../../logs/'.date('Y-m-d').'/'.date('G').'h', 'a+'); //Creer oou ouvre un fichier avec la date actuelle a la journee près
// 2 : on fera ici nos opérations sur le fichier...
fputs($monfichier, "\n");
fputs($monfichier, "\n");
fputs($monfichier, "Requete AJAX \n");
fputs($monfichier, "page controleur/corps/requete/changePassword.php \n");
fputs($monfichier, $_SERVER["REMOTE_ADDR"]); //Adresse IP
fputs($monfichier, "\n");
fputs($monfichier, date('Y-m-d G:i:s')); //Date
fputs($monfichier, "\n");
fputs($monfichier, $_SERVER['HTTP_USER_AGENT']); //informations sur le nav
fputs($monfichier, "\n");
if(isset($_SESSION['pseudo'])){ //Si l'utilisateur est connecete on affiche ses informations
fputs($monfichier, "ID de l'utilisateur"); 
fputs($monfichier, $_SESSION['user']['pseudo']); 
fputs($monfichier, "\n");
}
fputs($monfichier, "Requetes que l'utilisateur a envoye en post :"); //Requete POST
fputs($monfichier, "\n");
foreach ($_POST as $val) 
{
	if($val == $_POST['mdp'] || $val == $_POST['mdp_user'] || $val == $_POST['mdp_new_user'] || $val == $_POST['password']){
	fputs($monfichier, 'Ceci est un mdp *****');
	fputs($monfichier, "\n");
	}else{
	fputs($monfichier, $val);
	fputs($monfichier, "\n");
	}
}
fputs($monfichier, "Requetes que l'utilisateur a envoye en get :"); //Requete GET
fputs($monfichier, "\n");
foreach ($_GET as $val) 
{
	fputs($monfichier, $val);
	fputs($monfichier, "\n");
}
// 3 : quand on a fini de l'utiliser, on ferme le fichier
fclose($monfichier);

//verification
if(!isset($_SESSION['user'])){die('Tentative de connexion non authentifié');}
if(!isset($_POST['password']) || empty($_POST['password']) || strlen($_POST['password']) < 8 || strlen($_POST['password']) > 40){die('Mot de passe vide ou nombre de charactere incorrecte');}
if(!isset($_POST['confirmPassword']) || empty($_POST['confirmPassword']) || strlen($_POST['confirmPassword']) < 8 || strlen($_POST['confirmPassword']) > 40){die('Mot de passe de confirmation vide ou nombre de charactere incorrecte');}
$_POST['password'] = htmlentities($_POST['password']);
$_POST['confirmPassword'] = htmlentities($_POST['confirmPassword']);
if($_POST['password'] != $_POST['confirmPassword']){die('mdp ne correspondent pas');}

//injection du mdp
require_once'../../../app/bdd.php';
require_once '../../../modele/gestionCompte.php'; //Fonctions sql

changePassword($_SESSION['user']['pseudo'], $_POST['password'], $bdd);
echo 'Mot de passe changé avec succès';
?>