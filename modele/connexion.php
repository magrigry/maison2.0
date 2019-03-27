<?php
function checkLogin($pseudo, $bdd){
		$reponseConnexion = $bdd->prepare('SELECT * FROM omega_users WHERE pseudo = :pseudo');
		$reponseConnexion->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
		$reponseConnexion->execute();
		$donneesUser = $reponseConnexion->fetch();
		return $donneesUser;
		$requeteConnexion->CloseCursor();
}

function newLastConnection($pseudo, $bdd){
		$ip = $_SERVER['REMOTE_ADDR'];
		$timestamp = date('Y-m-d G:i:s');
        $requete = $bdd-> prepare(				  	
        "UPDATE omega_users SET ip=:ip, last_connection=:last_connection WHERE pseudo=:pseudo");	
        $requete->bindParam(':ip', $ip); 	
        $requete->bindParam(':pseudo', $pseudo); 	
        $requete->bindParam(':last_connection', $timestamp);	
        $requete-> execute();
		$requete->CloseCursor();	
}
?>