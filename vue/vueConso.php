<h2 class="title_h2"> Consommation Electrique:</h2>
<br/>

<div class="input-group">
<input type="number" id="consoNbJour" value="<?php echo $nbJour; ?>" class="form-control" style="" /><p>choisissez le nombre de relevez que vous souhaitez afficher</p>
</div>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script>
function injectContent(content){
	var divDialog = $("#content");
	$(divDialog).html(content);
}

$('#consoNbJour').change(function(e){
    e.preventDefault();
	$.get(
		"controleur/corps/action.php?page=conso&jour="+$("#consoNbJour").val(), 
		function (data){
				injectContent(data);
		}
	);
});
</script>

<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
		<?php
			$requeteConso = getConso($bdd, $nbJour);
			while($donneesDate = $requeteConso->fetch()){
			echo '\''.$donneesDate['date'].'\',';
			}
		?>
		]
    },
    yAxis: {
        title: {
            text: 'Consommation en w/h'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Electrique',
        data: [
		<?php
			$requeteConso2 = getConso($bdd, $nbJour);
			while($donneesValeur = $requeteConso2->fetch()){
			echo $donneesValeur['valeur'].',';
			}
		?>
		]
    }]
});
</script>
<br/>
<br/> 
<h2 class="title_h2"> Niveau de la Chaudière:</h2>
<br/>
<div id="essais_rgraph" Style="text-align: center"> 
		<?php
			$requeteNiveau = getNiveau($bdd, 1);
			$donneesNiveau = $requeteNiveau->fetch();
		?>
		<canvas id="mon_canvas" width="300" height="300">[No canvas support]</canvas>
		 
		    <script>

			var valeur =100 - <?php echo $donneesNiveau['niveau']; ?>;
			$(document).ready(function ()
			{
			    var gauge = new RGraph.Gauge({
				id: 'mon_canvas',
				min: 0,
				max: 100,
				value: valeur
				}).draw();
			})
		    </script>
		</div>	