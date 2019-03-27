<div class="row">
	<div class="col-lg-12">
		<h1>Bienvenue <?php echo $_SESSION['user']['pseudo']?></h1>
	</div>
<?php 
if($lastIntrusion['date'] == date('Y-m-d')){
	echo'
	<div class="col-lg-12">
		<div class="alert alert-dismissable alert-warning">
			<button data-dismiss="alert" class="close" type="button">&times;</button>
			Une intrusion à été détectée dans votre maison ces dernières 24 heures. 
			<br />
			Si vous n\'êtes pas à l\'origine de cette alerte nous vous recommandons d\'avertir les autorités compétentes.
			<br />
			Ce message disparaîtra automatiquement d\'ici 24 heures après le déclanchement de l\'alarme.
		</div>
	</div>';}?>
</div>
<div class="row">
	<div class="col-lg-4">
		<div class="body tab-content">
			<div class="tab-pane clearfix active" id="stats">
				<h5 class="tab-header"><i class="fa fa-calendar-o fa-2x"></i> Utilisateurs</h5>
				<ul class="news-list">
					<?php
						$users = getAllUsers($bdd);
						while ($data=$users->fetch()){
							if($data['pseudo'] != $_SESSION['user']['pseudo']){
							?>
							<li>
								<i class="fa fa-user fa-4x pull-left"></i>
								<div class="news-item-info">
									<div class="name"><?php echo $data['pseudo']?></div>
									<div class="position">Dernière connexion le</div>
									<div class="time"> <?php echo $data['last_connection']?></div>
								</div>
							</li>
							<?php
							}else{
							?>
							<li>
								<i class="fa fa-user fa-4x pull-left"></i>
								<div class="news-item-info">
									<div class="name"><?php echo $data['pseudo']?> (moi)</div>
									<div class="position">Dernière connexion le</div>
									<div class="time"> <?php echo $data['last_connection']?></div>
								</div>
							</li>
							<?php
							}	
						}
					?>
				</ul>
			</div>
		</div>
	</div>
          <div class="col-lg-4">
            <div id="contentEtatAlarmeOff" class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>/!\ Attention </strong>L'alarme est désactivée.
            </div>
            <div id="contentEtatAlarmeOn" class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              L'alarme est activée.
            </div>
            <div id="contentEtatLumiereOn" class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>/!\ Attention </strong>Votre éclairage est allumé.
            </div>
          </div>
	<div class="col-lg-4">
				<div class="well">
					<h4>Envoyer un message</h4>
					<form role="form">
						<div class="form-group">
							<textarea class="form-control" rows="3" id="tchatTextArea"></textarea>
						</div>
						<button type="submit" class="btn btn-primary" id="tchatSubmit">Envoyer</button>
					</form>
				</div>
				<div id="tchatMessage" style="height: 400px; overflow: auto;">
				</div>
	</div>
</div>
<script>
$('#tchatSubmit').click(function(e){
    e.preventDefault();
		$.post(
			"controleur/corps/tchat/newMessage.php", {
				message: $("#tchatTextArea").val()
				},
			function (data){
				console.log(data);
			}
		);		
});

</script>

<div class="row">
<h1 class="title_gros"> Quelques petits conseils:</h1>
<ul> 
	<li class="title_conseils"> Conseils pour réduire votre facture d’électricité </li>
	<br/>
		<ul class="text_conseils"> 
			<li> Choisissez des appareils à basse consommation. Les appareils de catégorie A+++ sont plus chers, mais consomment jusqu’à 10 fois moins. </li>
			<br/>
			<li> Remplacez vos ampoules traditionnelles par des ampoules à économie d’énergie (ampoules basse consommation, ampoules LED) qui durent trois fois plus et consomment trois fois moins. Pensez également à profiter au maximum de la lumière du jour… gratuite. </li>
			<br/>
			<li> Dégivrez régulièrement votre réfrigérateur avant que la couche de givre n’atteigne 3 mm d’épaisseur, ce qui vous permettra d’économiser jusqu’à 30 % de sa consommation d’électricité. </li>
			<br/>
			<li> Faites fonctionner de préférence vos électroménagers pendant les heures creuses, de 10 h 30 le soir à 6 h 30 le matin en général (les horaires varient en fonction des régions !), car l’électricité y est environ 40 % moins chère. </li>
			<br/>
			<br/>
		</ul>
		<center><img class="img_conseils" src="images/economiser.png"></center>
	<li class="title_conseils"> Conseils pour réduire sa consommation d’eau </li>
	<br/>
		<ul class="text_conseils"> 
			<li> Prendre un bain de temps en temps apporte un réel plaisir. Mais ce plaisir a un coût dès lors qu’il devient quotidien. Lorsqu’une douche de quelques minutes réclame 40 à 60 litres, un bain en demande, lui, entre 150 et 200. </li>
			<br/>
			<li> 30 : c’est en litres l’économie réalisée par vaisselle entre une plonge à la main et un lavage en machine (correspondant à trois repas pris par une famille de quatre personnes).</li>
			<br/>
			<li> Arroser efficacement son jardin </li>
			<br/>
			<li> Ne pas laisser couler l’eau pendant le rasage, le lavage des mains ou des dents. Derrière ce simple geste vous réduirez votre consommation d’eau de quelques précieux litres.</li>
			<br/>
			<br/>
		</ul>
		<center><img class="img_conseils" src="images/consommation_eau.png"></center>
</ul>



</div> 