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
fputs($monfichier, "page ".$_SERVER["REQUEST_URI"]." \n");
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

?>
<?php
if(!isset($_POST['selectSuprUser'])){die('Error');}
require_once'../../../app/bdd.php';
require_once '../../../modele/gestionCompte.php'; //Fonctions sql
$user = $_POST['selectSuprUser'];
suprUser($user, $bdd);
echo 'L\'utilisateur à été supprimé'
?>