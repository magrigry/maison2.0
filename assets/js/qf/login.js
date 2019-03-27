$('#Failed').hide();


function injectContent(content){
	var divDialog = $("#content");
	$(divDialog).html(content);
}
function injectContentBody(content){
	var divDialog = $("#body");
	$(divDialog).html(content);
}

$('#submit').click(function(e){
    e.preventDefault();
	$('#inputLogin').hide();
	$(".login").attr('class', 'login loading');
	$('.state').html('Authentification...');
	
	if($('#remember').prop('checked')){
		$.post(
			"controleur/requetes/requeteConnexion.php", {
				username: $("#username").val(), 
				password: $("#password").val(), 
				remember: $("#remember").val()
				},
			function (data){
				console.log(data);
				if(data=='success'){
					$(".login").attr('class', 'login loading ok');
					$('.state').html('Authentification réussie');
					// $.get(
						// "index.php", 
						// function (data){
						// $("#body").html(data);
						// }
					// );
					window.location.reload();
				}
				else{
					$('#loading').hide();
					$( ".form-group " ).removeClass( "form-group" ).addClass( "form-group has-error" );
					$(".login").attr('class', 'login');
					$('#inputLogin').show()
					$('#Failed').show();
					$("#username").focus();
					$('.state').html('Se connecter');
				}
			}
		);		
	}else{
		$.post(
			"controleur/requetes/requeteConnexion.php", {
				username: $("#username").val(), 
				password: $("#password").val()
				},
			function (data){
				console.log(data);
				if(data=='success'){
					$(".login").attr('class', 'login loading ok');
					$('.state').html('Authentification réussie');
					// $.get(
						// "index.php", 
						// function (data){
						// $("#body").html(data);
						// }
					// );
					window.location.reload();
				}
				else{
					$('#loading').hide();
					$( ".form-group " ).removeClass( "form-group" ).addClass( "form-group has-error" );
					$(".login").attr('class', 'login');
					$('#inputLogin').show()
					$('#Failed').show();
					$("#username").focus();
					$('.state').html('Se connecter');
				}
			}
		);		
	}
	

});
