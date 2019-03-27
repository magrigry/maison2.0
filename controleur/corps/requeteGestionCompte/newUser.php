<?php
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
fputs($monfichier, "page controleur/corps/requete/newUser.php \n");
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


// quelques vérifications
if(!isset($_POST['username']) || empty($_POST['username'])){die('Username vide');}
if(strlen($_POST['username']) < 4 || strlen($_POST['username']) > 30){die('Username taille incorrecte');}
if(!isset($_POST['password']) || empty($_POST['password'])){die('Mot de passe vide');}
if(strlen($_POST['password']) < 8 || strlen($_POST['password']) > 40){die('mdp taille incorrecte');}
if(!isset($_POST['confirmPassword']) || empty($_POST['confirmPassword'])){die('Mdp de confirm n\'existe pas');}
if(strlen($_POST['confirmPassword']) < 8 || strlen($_POST['confirmPassword']) > 40){die('Mdp de confirmation taille incorrecte');}
$username = htmlentities($_POST['username']);
$password = htmlentities($_POST['password']);
$confirmPassword = htmlentities($_POST['confirmPassword']);
if($password != $confirmPassword){die('Les mots de passe ne correspondent pas');}

if(!isset($_POST['mail']) || empty($_POST['mail'])){ //Cas où il y a un mail
	if(strlen($_POST['mail']) > 60){die('Mail trop grand');}
	$mail = htmlentities($_POST['mail']);
}else{ //Si il n'y en a pas
	$mail = 'nul';
}

require_once'../../../app/bdd.php';
require_once '../../../modele/gestionCompte.php'; //Fonctions sql



$users = getAllUsernames($bdd);
while ($data=$users->fetch()){
	if($data['pseudo']==$username){
	die('<p style="color: red;">Ce nom d\'utilisateur existe déjà</p>');
	}
}

newUser($username, $mail, $password, $bdd);
echo 'L\'utilisateur '.$username.' a bien été crée';
?>