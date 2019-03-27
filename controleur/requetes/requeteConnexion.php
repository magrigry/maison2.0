<?php
error_reporting(0); //Empêcher l'affichage des erreurs
sleep(2); //Temps d'attente pour éviter le bruteforce
?>
<?php //Sytème de logs
if (!file_exists('../../logs'.date('Y-m-d G'))) {
   mkdir('../../logs/'.date('Y-m-d'));
}
// 1 : on ouvre le fichier
$monfichier = fopen('../../logs/'.date('Y-m-d').'/'.date('G').'h', 'a+'); //Creer oou ouvre un fichier avec la date actuelle a la journee près
// 2 : on fera ici nos opérations sur le fichier...
fputs($monfichier, "\n");
fputs($monfichier, "\n");
fputs($monfichier, "Requete AJAX \n");
fputs($monfichier, "page controleur/requete/connexion.php \n");
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
<?php //Système de connexion


if(!isset($_POST['username']) || empty($_POST['username'])){echo 'failed';die();}
if(!isset($_POST['password']) || empty($_POST['password'])){echo 'failed';die();}

	$username = htmlentities($_POST['username']);
	$password = htmlentities($_POST['password']);
	session_start();
	require_once '../../modele/connexion.php'; //Fonctions sql
	require_once '../../app/bdd.php'; //base de donnée
	$donneesUser = checkLogin($username, $bdd);
	if($donneesUser['mdp'] == sha1($password)){
	$passForCookie = sha1('dfqshgyu'.$username).sha1($password); //sha1 'dfqshgyu' & username + sha1 mdp
		
		$_SESSION['user'] = $donneesUser;
		
		newLastConnection($username, $bdd);
		if(isset($_POST['remember'])){
			require_once '../../include/cryptage.php'; //Fonctions sql
			setcookie('username', encrypt($username), (time() + 3600 * 24 * 3), '/', '137.74.197.153', false, true);
			setcookie('password', $passForCookie, (time() + 3600 * 24 * 3), '/', '137.74.197.153', false, true);
		}
		echo 'success';
	}
	else{
		echo 'failed';die();
	}
?>