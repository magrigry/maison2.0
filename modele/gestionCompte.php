<?php
function newUser($username, $mail, $password, $bdd){
		$autor = '1';
        $ip = $_SERVER['REMOTE_ADDR'];
		$timestamp = date('Y-m-d G:i:s');	
		$password = sha1($password);
		
        $requete = $bdd-> prepare(						  	
        "INSERT INTO omega_users(pseudo,mail,mdp,date_inscription, ip, autorisation, last_connection) VALUES(:pseudo, :mail, :mdp, :date_inscription, :ip, :autorisation, :last_connection)");
        $requete->bindParam(':pseudo', $username); 
        $requete->bindParam(':mail', $mail);	
        $requete->bindParam(':mdp', $password);
        $requete->bindParam(':ip', $ip);
        $requete->bindParam(':autorisation', $autor);
        $requete->bindParam(':date_inscription', $timestamp);	
        $requete->bindParam(':last_connection', $timestamp);
        $requete-> execute();
		$requete->CloseCursor();
}

function usernameAlreadyUsed($username, $bdd){
		$query=$bdd->prepare('SELECT pseudo FROM omega_users');
        $query->bindValue(':pseudo',$username, PDO::PARAM_STR);
        $query->execute();
		$data=$query->fetch();
		return $data;
}

function changePassword($username, $password, $bdd){
	$password = sha1($password);
	$requete = $bdd-> prepare(		  	
	"UPDATE omega_users SET mdp=:mdp WHERE pseudo=:pseudo");

	$requete->bindParam(':pseudo',$username); 	
	$requete->bindParam(':mdp',$password);	
	$requete-> execute();
	$requete->CloseCursor();
}

function getAllUsernames($bdd){
	$query=$bdd->query('SELECT pseudo
	FROM omega_users');
	return $query;
}

function getAllUsers($bdd){
	$query=$bdd->query('SELECT *
	FROM omega_users');
	return $query;
}

function suprUser($username, $bdd){
	$requete = $bdd-> prepare("DELETE FROM omega_users WHERE pseudo= :pseudo");
	$requete->bindParam(':pseudo', $username);
	$requete-> execute();
	$requete->CloseCursor();
}

function infoUser($username, $bdd){
	$requete = $bdd-> prepare("SELECT *	FROM omega_users WHERE pseudo =:pseudo");
	$requete->bindParam(':pseudo', $username);
	$requete-> execute();
	return $requete;
}
?>