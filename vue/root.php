<!DOCTYPE html>
<html>
<head>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="icon" href="assets/img/logo.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Panel</title>
	<link href="assets/css/login.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/local.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/body.css" />

	<!-- Scripts RGraph -->
	<script src="assets/js/libraries/RGraph.common.core.js" ></script>
	<script src="assets/js/libraries/RGraph.gauge.js" ></script>
	<script src="assets/js/libraries/RGraph.meter.js" ></script>
	<script src="assets/js/jquery.min.js"></script
	
    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
</head>
</head>
    
<body id="body">
	<?php 
	if(isset($_SESSION['user'])){
	?>
	<div id="wrapper">
		<?php 
			include'controleur/menu.php';
		?>
		<div id="content" >
		</div>
		<script src="assets/js/ifvisible.js"></script>	
		<script type="text/javascript">
		function d(el){
			return document.getElementById(el);
		}
		ifvisible.setIdleDuration(5);

		ifvisible.on('statusChanged', function(e){
		});

		ifvisible.idle(function(){
			document.body.style.opacity = 0.5;
		});

		ifvisible.wakeup(function(){
			document.body.style.opacity = 1;
		});

		ifvisible.onEvery(0.5, function(){
			// Clock, as simple as it gets
			var h = (new Date()).getHours();
			var m = (new Date()).getMinutes();
			var s = (new Date()).getSeconds();
			h = h < 10? "0"+h : h;
			m = m < 10? "0"+m : m;
			s = s < 10? "0"+s : s;
			// Update clock
			d("result3").innerHTML = (h+':'+m+':'+s);

		});


		setInterval(function(){
			var info = ifvisible.getIdleInfo();
			// Give 3% margin to stabilaze user output
			if(info.timeLeftPer < 3){
				info.timeLeftPer = 0;
				info.timeLeft = ifvisible.getIdleDuration();
			}
			//d("seconds").innerHTML = parseInt(info.timeLeft / 1000), 10;

		}, 100);
		</script>
		<script type="text/javascript">
			var dur = (ifvisible.getIdleDuration() / 1000);
			//d('seconds').innerHTML =  dur;
			//d('idleTime').innerHTML = dur + " seconds";
		</script>
		<script src="assets/js/qf/tchat.js"></script>
		<script src="assets/js/qf/login.js"></script>
		<script src="assets/js/qf/corps.js"></script>
		<script src="assets/js/qf/etats.js"></script>
		<script>
			ifvisible.onEvery(1, function(){
				etatLumiere();
				etatVolet();
				etatAlarme();
				etatRadiateur();
				etatSerrure();
			});
			ifvisible.idle(function(){
				etatLumiere();
				etatVolet();
				etatAlarme();
				etatRadiateur();
				etatSerrure();
			});

			ifvisible.wakeup(function(){
				etatLumiere();
				etatVolet();
				etatAlarme();
				etatRadiateur();
				etatSerrure();
			});
		</script>
	</div>
	<?php
	}
	else{
	echo $contenu;	
	}
	?>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
</body>
</html>