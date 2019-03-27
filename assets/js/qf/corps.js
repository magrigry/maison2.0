function injectContent(content){
	var divDialog = $("#content");
	$(divDialog).html(content);
}


$(document).ready(function(){			 
	$.get(
	 "controleur/corps/action.php?page=accueil", 
	 function (data){				 
	   injectContent(data);
	 }
	);
	getMessages();
	etatLumiere();
	etatVolet();
	etatAlarme();
	etatRadiateur();
	etatSerrure();
})


$('#accueil').click(function(e){
    e.preventDefault();
	$.get(
		"controleur/corps/action.php?page=accueil", 
		function (data){
				$( ".selected" ).removeClass( "selected" );
				$( "#accueil" ).parent('li').addClass("selected");
				injectContent(data);
		}
	);
	getMessages();
	etatLumiere();
	etatVolet();
	etatAlarme();
	etatRadiateur();
	etatSerrure();
});

$('#deconnexion').click(function(e){
    e.preventDefault();
	document.location.href="controleur/deconnexion.php";
});

$('#gestion').click(function(e){
    e.preventDefault();
	$.get(
		"controleur/corps/action.php?page=gestion", 
		function (data){
				$( ".selected" ).removeClass( "selected" );
				$( "#gestion" ).parent('li').addClass("selected");
				injectContent(data);
		}
	);
	etatLumiere();
	etatVolet();
	etatAlarme();
	etatRadiateur();
	etatSerrure();
});

$('#conso').click(function(e){
    e.preventDefault();
	$.get(
		"controleur/corps/action.php?page=conso", 
		function (data){
				$( ".selected" ).removeClass( "selected" );
				$( "#conso" ).parent('li').addClass("selected");
				injectContent(data);
		}
	);
});

$('#alarme').click(function(e){
    e.preventDefault();
	$.get(
		"controleur/corps/action.php?page=alarme", 
		function (data){
				$( ".selected" ).removeClass( "selected" );
				$( "#alarme" ).parent('li').addClass("selected");
				injectContent(data);
		}
	);
});

$('#compte').click(function(e){
    e.preventDefault();
	$.get(
		"controleur/corps/action.php?page=compte", 
		function (data){
				$( ".selected" ).removeClass( "selected" );
				$( "#compte" ).parent('li').addClass("selected");
				injectContent(data);
		}
	);
});

$('#conseils').click(function(e){
    e.preventDefault();
	$.get(
		"controleur/corps/action.php?page=conseils", 
		function (data){
				$( ".selected" ).removeClass( "selected" );
				$( "#conseils" ).parent('li').addClass("selected");
				injectContent(data);
		}
	);
});
