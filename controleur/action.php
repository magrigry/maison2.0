<?php
if(!isset($_SESSION['user']) && isset($_COOKIE['username']) && isset($_COOKIE['password']) && !empty($_COOKIE['username']) && !empty($_COOKIE['password'])){
	require_once 'modele/connexion.php';
	$cookieUsername = htmlentities($_COOKIE['username']);
	$cookiePassword = htmlentities($_COOKIE['password']);
	$cookieUsername = decrypt($cookieUsername);
	
	$donneesUser = checkLogin($cookieUsername, $bdd);
	
	$passBdd = sha1('dfqshgyu'.$cookieUsername).$donneesUser['mdp'];
	
	if($passBdd == $cookiePassword){		
		$_SESSION['user'] = $donneesUser;		
		newLastConnection($username, $bdd);
		ob_start();
		$contenu = ob_get_contents();
		ob_end_clean();
		include('vue/root.php');	
	}else{
		echo 'cookie incohérents';
	}
}
elseif(!isset($_SESSION['user'])){
	ob_start();
	include('controleur/connexion.php');
	$contenu = ob_get_contents();
	ob_end_clean();
	include('vue/root.php');	
}
elseif(isset($_GET['page']))
{
	$_GET['page'] = htmlentities($_GET['page']);
	switch ($_GET['page']) 
	{
		case 'deconnexion':
			echo '<script>document.location.href="controleur/deconnexion.php";</script>';
		break;
		
		case 'presentation':
			$fichier = 'presentation.php';
		break;
	
		case 'gestion':
			$fichier = 'gestion.php';
		break;
		
		case 'alarme':
			$fichier = 'alarme.php';
		break;
		
		case 'conso':
			$fichier = 'consomation.php';
		break;
		
		case 'agenda':
			$fichier = 'agenda.php';
		break;
		
		case 'page6':
			$fichier = 'page6.php';
		break;
		
		case 'gestion_compte':
			$fichier = 'gestion_compte.php';
		break;
			
		default:
			header('Location: index.php?erreur=1');
	}
	ob_start();
	include('controleur/'.$fichier);
	$contenu = ob_get_contents();
	ob_end_clean();
	include('vue/root.php');
}


else{
	ob_start();
	$contenu = ob_get_contents();
	ob_end_clean();
	include('vue/root.php');		
}
?>