<?php
function newMessage($auteur, $message, $bdd){
	
	$requete = $bdd-> prepare(						  	
	"INSERT INTO tchat(auteur, message) VALUES(:auteur, :message)");
	$requete->bindParam(':auteur', $auteur); 
	$requete->bindParam(':message', $message); 
	$requete-> execute();
	$requete->CloseCursor();	
}

function getMessages($bdd){
	$query=$bdd->query('SELECT *
	FROM tchat ORDER BY id DESC LIMIT 0,20');
	return $query;	
}
?>