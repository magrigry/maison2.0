<div class="container">
	<div class="row text-center ">
		<div class="col-md-12">
			<br /><br />
			<h2>Panel d'administration</h2>
		   
			<h5>Veuillez-vous authentifier</h5>
			 <br />
		</div>
	</div>
	<form class="login" style="margin: auto;">
		<div id="inputLogin">
			<br />
			<label id="Failed" class="control-label" for="inputError" style="color : red;">Identifiants incorrects</label>
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
				<input id="username" type="text" class="form-control" placeholder="Nom d'utilisateur" autofocus />
			</div>
			<hr />
			<div class="form-group input-group">
				<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
				<input id="password" type="password" class="form-control"  placeholder="Mot de passe" />
			</div>
			<hr />
			<div class="form-group">
				<label class="checkbox-inline">
					<input id="remember" type="checkbox" /> Se souvenir de moi
				</label>
			</div>
		</div>

			<button id="submit">
			  <i class="spinner"></i>
			  <span class="state">Se connecter</span>
			</button>								
	</form>
</div>
<script src="assets/js/qf/login.js"></script>