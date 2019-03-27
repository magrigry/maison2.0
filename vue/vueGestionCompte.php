<div id="compte" class="row">
<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			Information sur votre compte
		</div>
		<div class="panel-body">
		<b>ID d'utilisateur:</b> <?php echo $_SESSION['user']['id'];?> </br>
		<b>Nom d'utilisateur:</b> <?php echo $_SESSION['user']['pseudo'];?> </br>
		<b>mail d'utilisateur:</b> <?php echo $_SESSION['user']['mail'];?> </br>
		<b>Création du compte utilisateur:</b> <?php echo $_SESSION['user']['date_inscription'];?> </br>
		<b>Dernière connexion le</b> <?php echo $_SESSION['user']['last_connection'];?> </br>
		</p> 
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			Gestion des comptes et utilisateurs
		</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6">
					<!-- Changer mot de passe compte actuel -->
					<h3>Changer votre mot de passe utilisateur</h3>
					<form role="form" method="post">
							<label id="repRequeteChangePassword"></label>
						   <div class="form-group">
						   <label >Entrez voter nouveau mot de passe</label>
						   <label id="changePassword_error" style="color: red;">Votre mot de passe doit être compris entre 8 et 40 caractères.</label>
						  <input type="password" 	id="changePassword" class="form-control" placeholder="Choisissez un mot de passe compris entre 8 et 40 caractères" />
						  
						   <label>Confirmez votre mot de passe : </label>
						   <label id="confirmPasswordChange_errorTaille" style="color: red;">Votre mot de passe doit être compris entre 8 et 40 caractères.</label>
						   <label id="confirmPasswordChange_errorCheck" style="color: red;">Les deux mots de passe ne correspondent pas.</label>
						  <input type="password" 	id="confirmChangePassword" class="form-control" placeholder="Confirmez votre mot de passe.." />
						 </div>
						 <input  type="submit" id="submitChangePassword" value="Valider" class="btn btn-default" disabled/>
					</form>
					<!-- Nouvel utilisateur --></br>
					<h3>Créer un nouvel utilisateur</h3>
					<form role="form" method="post">
						  <label id="repRequeteNewUser"></label>
						  <div class="form-group">
						  <label>Nom du nouvel utilisateur: </label><label id="usernameNewUser_error" style="color: red;">Votre nom d"utilisateur doit être compris entre 4 et 30 caractères et ne doit pas contenir d'espaces.</label>
						  <input type="text" 	id="usernameNewUser" class="form-control" placeholder="Choisissez un pseudo..." />
						   <label>Mot de passe du nouvel utilisateur</label><label id="passwordNewUser_error" style="color: red;">Votre mot de passe doit être compris entre 8 et 40 caractères.</label>
						  <input type="password" 	id="passwordNewUser" class="form-control" placeholder="Choisissez un mot de passe compris entre 8 et 40 caractères" />
						   <label>Confirmez votre mot de passe : </label><label id="confirmPasswordNewUser_errorTaille" style="color: red;">Votre mot de passe doit être compris entre 8 et 40 caractères.</label><label id="confirmPasswordNewUser_errorCheck" style="color: red;">Les deux mots de passe ne correspondent pas.</label>
						  <input type="password" 	id="confirmPasswordNewUser" class="form-control" placeholder="Confirmez votre mot de passe.." />
						   <label>Mail</label>
						  <input type="mail" 	id="mailNewUser" class="form-control" placeholder="Facultatif" />
						 </div>
						 <input  type="submit" id="submitNewUser" value="Valider" class="btn btn-default" disabled/>
					</form>
					</div>					
					<div class="col-md-6">
					<!-- Info sur un utilisateur -->
					<h3>Informations sur un utilisateur</h3>
					<label id="repRequeteInfoUser"></label>
					<form role="form" method="post">
						<div class="form-group">
							<select id="selectInfo" class="form-control">
								<?php
									echo '<option>Choisissez un utilisateur...'; //permet de garder une ligne vide
									$users = getAllUsernames($bdd);
									while ($data=$users->fetch()){
										if($data['pseudo'] != $_SESSION['user']['pseudo']){
											echo '<option>'.$data['pseudo'];
										}	
									}
								?>
							</select>
						</div>
						<input  type="submit" id="submitInfoUser" value="Afficher" class="btn btn-default"/>
					</form>

					<!-- Supprimer un utilisateur --></br></br></br>
					<h3>Supprimer un utilisateur</h3>
					<label id="repRequeteSuprUser"></label>
					<form role="form" method="post">
						<div class="form-group">
							<select id="selectSupr" class="form-control">
								<?php
									echo '<option>Choisissez un utilisateur...'; //permet de garder une ligne vide
									$users = getAllUsernames($bdd);
									while ($data=$users->fetch()){
										if($data['pseudo'] != $_SESSION['user']['pseudo']){
											echo '<option>'.$data['pseudo'];
										}	
									}
								?>
							</select>
						</div>
						<input  type="submit" id="submitSuprUser" value="Supprimer" class="btn btn-default"/>
					</form>
					</div>
				</div>
			</div>
	</div>
</div>
</div>
<script src="assets/js/qf/gestionCompte.js"></script>