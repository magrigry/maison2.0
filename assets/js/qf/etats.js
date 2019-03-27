/************************/
/*******Serrure**********/
/************************/

$('#contentEtatSerrureOn').hide();
$('#contentEtatSerrureOff').hide();



function injectContentEtatSerrure(content){
	var divDialog = $("#contentEtatSerrure");
	$(divDialog).html(content);
}

setTimeout(etatSerrure, 1);

function etatSerrure(){
	$.get(
		'arduino.php?pass=fdshuh&recupEtatSerrureOnly', 
		function (data){
			console.log(data);
			if(data == 'on'){
			$('#contentEtatSerrureOn').show();
			$('#contentEtatSerrureOff').hide();
			$('#loadingEtatSerrure').hide();
			$('#submitSerrureOn').prop("disabled", true);
			$('#submitSerrureOff').prop("disabled", false);
			}
			if(data == 'off'){
			$('#contentEtatSerrureOn').hide();
			$('#loadingEtatSerrure').hide();
			$('#contentEtatSerrureOff').show();
			$('#submitSerrureOff').prop("disabled", true);
			$('#submitSerrureOn').prop("disabled", false);
			}
		}
	)	
}


$('#submitSerrureOff').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatSerrure=off", 
		function (data){
				console.log(data);
				etatSerrure();
		}
	);
});

$('#submitSerrureOn').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatSerrure=on", 
		function (data){
				console.log(data);
				etatSerrure();
		}
	);
});


/************************/
/*******Lumiere**********/
/************************/

$('#contentEtatLumiereOn').hide();
$('#contentEtatLumiereOff').hide();



function injectContentEtatLumiere(content){
	var divDialog = $("#contentEtatLumiere");
	$(divDialog).html(content);
}

setTimeout(etatLumiere, 1);

function etatLumiere(){
	$.get(
		'arduino.php?pass=fdshuh&recupEtatLumiereOnly', 
		function (data){
			console.log(data);
			if(data == 'on'){
			$('#contentEtatLumiereOn').show();
			$('#contentEtatLumiereOff').hide();
			$('#loadingEtatLumiere').hide();
			$('#submitLumiereOn').prop("disabled", true);
			$('#submitLumiereOff').prop("disabled", false);
			}
			if(data == 'off'){
			$('#contentEtatLumiereOn').hide();
			$('#loadingEtatLumiere').hide();
			$('#contentEtatLumiereOff').show();
			$('#submitLumiereOff').prop("disabled", true);
			$('#submitLumiereOn').prop("disabled", false);
			}
		}
	)	
}


$('#submitLumiereOff').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatLumiere=off", 
		function (data){
				console.log(data);
				etatLumiere();
		}
	);
});

$('#submitLumiereOn').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatLumiere=on", 
		function (data){
				console.log(data);
				etatLumiere();
		}
	);
});

/************************/
/*******Volet**********/
/************************/

$('#contentEtatVoletOn').hide();
$('#contentEtatVoletOff').hide();



function injectContentEtatVolet(content){
	var divDialog = $("#contentEtatVolet");
	$(divDialog).html(content);
}

setTimeout(etatVolet, 1);

function etatVolet(){
	$.get(
		'arduino.php?pass=fdshuh&recupEtatVoletOnly', 
		function (data){
			console.log(data);
			if(data == 'on'){
			$('#contentEtatVoletOn').show();
			$('#contentEtatVoletOff').hide();
			$('#loadingEtatVolet').hide();
			$('#submitVoletOn').prop("disabled", true);
			$('#submitVoletOff').prop("disabled", false);
			}
			if(data == 'off'){
			$('#loadingEtatVolet').hide();
			$('#contentEtatVoletOn').hide();
			$('#contentEtatVoletOff').show();
			$('#submitVoletOff').prop("disabled", true);
			$('#submitVoletOn').prop("disabled", false);
			}
		}
	)	
}


$('#submitVoletOff').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatVolet=off", 
		function (data){
				console.log(data);
				etatVolet();
		}
	);
});

$('#submitVoletOn').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatVolet=on", 
		function (data){
				console.log(data);
				etatVolet();
		}
	);
});
/************************/
/*******Alarme**********/
/************************/

$('#contentEtatAlarmeOn').hide();
$('#contentEtatAlarmeOff').hide();



function injectContentEtatAlarme(content){
	var divDialog = $("#contentEtatAlarme");
	$(divDialog).html(content);
}

setTimeout(etatAlarme, 1);

function etatAlarme(){
	$.get(
		'arduino.php?pass=fdshuh&recupEtatAlarmeOnly', 
		function (data){
			console.log(data);
			if(data == 'on'){
			$('#contentEtatAlarmeOn').show();
			$('#contentEtatAlarmeOff').hide();
			$('#loadingEtatAlarme').hide();
			$('#submitAlarmeOn').prop("disabled", true);
			$('#submitAlarmeOff').prop("disabled", false);
			}
			if(data == 'off'){
			$('#loadingEtatAlarme').hide();
			$('#contentEtatAlarmeOn').hide();
			$('#contentEtatAlarmeOff').show();
			$('#submitAlarmeOff').prop("disabled", true);
			$('#submitAlarmeOn').prop("disabled", false);
			}
		}
	)	
}


$('#submitAlarmeOff').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatAlarme=off", 
		function (data){
				console.log(data);
				etatAlarme();
		}
	);
});

$('#submitAlarmeOn').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatAlarme=on", 
		function (data){
				console.log(data);
				etatAlarme();
		}
	);
});
/************************/
/*******Radiateur**********/
/************************/

$('#contentEtatRadiateurOn').hide();
$('#contentEtatRadiateurOff').hide();



function injectContentEtatRadiateur(content){
	var divDialog = $("#contentEtatRadiateur");
	$(divDialog).html(content);
}

setTimeout(etatRadiateur, 1);

function etatRadiateur(){
	$.get(
		'arduino.php?pass=fdshuh&recupEtatRadiateurOnly', 
		function (data){
			console.log(data);
			if(data == 'arret'){
			$('#contentEtatRadiateurArret').show();
			$('#contentEtatRadiateurHg').hide();
			$('#contentEtatRadiateurConfort').hide();
			$('#contentEtatRadiateurEco').hide();
			$('#loadingEtatRadiateur').hide();
			$('#submitRadiateurArret').prop("disabled", true);
			$('#submitRadiateurEco').prop("disabled", false);
			$('#submitRadiateurConfort').prop("disabled", false);
			$('#submitRadiateurHg').prop("disabled", false);
			}
			if(data == 'hg'){
			$('#contentEtatRadiateurArret').hide();
			$('#contentEtatRadiateurHg').show();
			$('#contentEtatRadiateurConfort').hide();
			$('#contentEtatRadiateurEco').hide();
			$('#loadingEtatRadiateur').hide();
			$('#submitRadiateurArret').prop("disabled", false);
			$('#submitRadiateurEco').prop("disabled", false);
			$('#submitRadiateurConfort').prop("disabled", false);
			$('#submitRadiateurHg').prop("disabled", true);
			}
			if(data == 'confort'){
			$('#loadingEtatRadiateur').hide();
			$('#contentEtatRadiateurArret').hide();
			$('#contentEtatRadiateurHg').hide();
			$('#contentEtatRadiateurConfort').show();
			$('#contentEtatRadiateurEco').hide();
			$('#submitRadiateurArret').prop("disabled", false);
			$('#submitRadiateurEco').prop("disabled", false);
			$('#submitRadiateurConfort').prop("disabled", true);
			$('#submitRadiateurHg').prop("disabled", false);
			}
			if(data == 'eco'){
			$('#loadingEtatRadiateur').hide();
			$('#contentEtatRadiateurArret').hide();
			$('#contentEtatRadiateurHg').hide();
			$('#contentEtatRadiateurConfort').hide();
			$('#contentEtatRadiateurEco').show();
			$('#submitRadiateurArret').prop("disabled", false);
			$('#submitRadiateurEco').prop("disabled", true);
			$('#submitRadiateurConfort').prop("disabled", false);
			$('#submitRadiateurHg').prop("disabled", false);
			}
		}
	)	
}


$('#submitRadiateurArret').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatRadiateur=arret", 
		function (data){
				console.log(data);
				etatRadiateur();
		}
	);
});

$('#submitRadiateurHg').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatRadiateur=hg", 
		function (data){
				console.log(data);
				etatRadiateur();
		}
	);
});

$('#submitRadiateurEco').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatRadiateur=eco", 
		function (data){
				console.log(data);
				etatRadiateur();
		}
	);
});

$('#submitRadiateurConfort').click(function(e){
    e.preventDefault();
	$.get(
		"arduino.php?pass=fdshuh&changerEtatRadiateur=confort", 
		function (data){
				console.log(data);
				etatRadiateur();
		}
	);
});