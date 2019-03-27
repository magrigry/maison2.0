<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" ><span id="result3" >--:--</span></a>
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul id="active" class="nav navbar-nav side-nav">
			<li class="selected"><a id="accueil" href=""><i class="fa fa-address-card-o"></i> Accueil</a></li>
			<li><a id="gestion" href=""><i class="fa fa-pencil-square-o"></i> Gestion</a></li>
			<li><a id="conso" href=""><i class="fa fa-line-chart"></i> Relevés</a></li>
			<li><a id="alarme" href=""><i class="fa fa-bell"></i> Intrusions</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right navbar-user">
			<li class="dropdown messages-dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Alerte <?php if($lastIntrusion['date'] == date('Y-m-d')){echo'<span class="badge">1</span><b class="caret"></b>';}else{echo'<span class="badge">0</span>'; } ?></a>
				
	<?php 
	if($lastIntrusion['date'] == date('Y-m-d')){
	echo'			<ul class="dropdown-menu">
					<li class="dropdown-header">1 Alerte</li>
					<li class="message-preview">
						<a href="#">
							<span class="avatar"><i class="fa fa-bell"></i></span>
							<span class="message">Alerte de sécurité</span>
						</a>
					</li>
					<li class="divider"></li>
					<li class="dropdown-header">Une intrusion a eu lieu aujourd\'hui</li>
				</ul>
	';}
	?>
			</li>
			<li class="dropdown user-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user']['pseudo'];?><b class="caret"></b></a>
				<ul class="dropdown-menu">
					<!-- <li><a href="" id="monProfile"><i class="fa fa-user"></i> Mon profile</a></li> -->
					<li><a id="compte" " href=""><i class="fa fa-gear"></i> Paramètre</a></li>
					<li class="divider"></li>
					<li><a id="deconnexion" href=""><i class="fa fa-power-off"></i> Se déconnecter</a></li>
					<li></li>

				</ul>
			</li>
			<li class="divider-vertical"></li>
			<li>
			</li>
		</ul>
	</div>
</nav>