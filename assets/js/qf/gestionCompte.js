
/**************************************************/
/***************      NEW USER    *********************/
/**************************************************/
$('#usernameNewUser_error').hide();
$('#passwordNewUser_error').hide();
$('#confirmPasswordNewUser_errorTaille').hide();
$('#confirmPasswordNewUser_errorCheck').hide();
function injectContentNewUser(content){
	var divDialog = $("#repRequeteNewUser");
	$(divDialog).html(content);
}

$('#submitNewUser').click(function(e){
    e.preventDefault();
	$.post(
		"controleur/corps/requeteGestionCompte/newUser.php", {
			username: $("#usernameNewUser").val(), 
			password: $("#passwordNewUser").val(), 
			confirmPassword: $("#confirmPasswordNewUser").val(), 
			mail: $("#mailNewUser").val()
			},
		function (data){
			injectContentNewUser(data);
		}
	);
});

$('#usernameNewUser').keyup(function(){
	var usernameNewUser = $("#usernameNewUser").val();
	if($("#usernameNewUser").val().length < 4 || $("#usernameNewUser").val().length > 30 || usernameNewUser.indexOf(' ') >= 0){
		$('#usernameNewUser_error').show();
		erreurUsernameNewUser = true;
	}else{
		$('#usernameNewUser_error').hide();
		erreurUsernameNewUser = false;		
	}
	if(erreurUsernameNewUser==false && erreurPasswordNewUser==false && erreurConfirmPasswordNewUserTaille==false && erreurConfirmPasswordNewUserTaille==false){$('#submitNewUser').prop("disabled", false);}
	if(erreurUsernameNewUser==true || erreurPasswordNewUser == true || erreurConfirmPasswordNewUserTaille==true || erreurConfirmPasswordNewUserTaille==true){$('#submitNewUser').prop("disabled", true);}
});

$('#passwordNewUser').keyup(function(){
	if($("#passwordNewUser").val().length < 8 || $("#passwordNewUser").val().length > 40){
		$('#passwordNewUser_error').show();
		erreurPasswordNewUser = true;
	}else{
		$('#passwordNewUser_error').hide();
		erreurPasswordNewUser = false;		
	}
	
	if($("#confirmPasswordNewUser").val() != $("#passwordNewUser").val()){
		$('#confirmPasswordNewUser_errorCheck').show();
		erreurConfirmPasswordNewUserTaille = true;
		}else{
		$('#confirmPasswordNewUser_errorCheck').hide();
		erreurConfirmPasswordNewUserTaille = false;			
		}
	
	if(erreurUsernameNewUser==false && erreurPasswordNewUser==false && erreurConfirmPasswordNewUserTaille==false && erreurConfirmPasswordNewUserTaille==false){$('#submitNewUser').prop("disabled", false);}
	if(erreurUsernameNewUser==true || erreurPasswordNewUser == true || erreurConfirmPasswordNewUserTaille==true || erreurConfirmPasswordNewUserTaille==true){$('#submitNewUser').prop("disabled", true);}
});

$('#confirmPasswordNewUser').keyup(function(){
	if($("#confirmPasswordNewUser").val().length < 8 || $("#confirmPasswordNewUser").val().length > 40){
		$('#confirmPasswordNewUser_errorTaille').show();
		erreurConfirmPasswordNewUserTaille = true;
	}else{
		$('#confirmPasswordNewUser_errorTaille').hide();
		erreurConfirmPasswordNewUserTaille = false;		
	}
	
	if($("#confirmPasswordNewUser").val() != $("#passwordNewUser").val()){
		$('#confirmPasswordNewUser_errorCheck').show();
		erreurConfirmPasswordNewUserCheck = true;
		}else{
		$('#confirmPasswordNewUser_errorCheck').hide();
		erreurConfirmPasswordNewUserCheck = false;			
		}
	
	if(erreurUsernameNewUser==false && erreurPasswordNewUser==false && erreurConfirmPasswordNewUserTaille==false && erreurConfirmPasswordNewUserCheck==false){$('#submitNewUser').prop("disabled", false);}
	if(erreurUsernameNewUser==true || erreurPasswordNewUser == true || erreurConfirmPasswordNewUserTaille==true || erreurConfirmPasswordNewUserCheck==true){$('#submitNewUser').prop("disabled", true);}
});

/**************************************************/
/*******   CHANGE PASSWORD CURRENT USER    ********/
/**************************************************/

function injectContentChangePassword(content){
	var divDialog = $("#repRequeteChangePassword");
	$(divDialog).html(content);
}

$('#submitChangePassword').click(function(e){
    e.preventDefault();
	$.post(
		"controleur/corps/requeteGestionCompte/changePassword.php", {
			password: $("#changePassword").val(), 
			confirmPassword: $("#confirmChangePassword").val(), 
			},
		function (data){
			injectContentChangePassword(data);
		}
	);
});

$('#confirmPasswordChange_errorTaille').hide();
$('#confirmPasswordChange_errorCheck').hide();
$('#changePassword_error').hide();

$('#changePassword').keyup(function(){
	if($("#changePassword").val().length < 8 || $("#changePassword").val().length > 40){
		$('#changePassword_error').show();
		erreurPasswordChange = true;
	}else{
		$('#changePassword_error').hide();
		erreurPasswordChange = false;		
	}
	
	if($("#confirmChangePassword").val() != $("#changePassword").val()){
		$('#confirmPasswordChange_errorCheck').show();
		erreurPasswordChangeCheck = true;
		}else{
		$('#confirmPasswordChange_errorCheck').hide();
		erreurPasswordChangeCheck = false;			
		}
	if(erreurPasswordChangeCheck==false && erreurConfirmPasswordChangeTaille==false && erreurPasswordChange==false){$('#submitChangePassword').prop("disabled", false);}
	if(erreurPasswordChangeCheck==true || erreurConfirmPasswordChangeTaille==true || erreurPasswordChange==true){$('#submitChangePassword').prop("disabled", true);}
});

$('#confirmChangePassword').keyup(function(){
	if($("#confirmChangePassword").val().length < 8 || $("#confirmChangePassword").val().length > 40){
		$('#confirmPasswordChange_errorTaille').show();
		erreurConfirmPasswordChangeTaille = true;
	}else{
		$('#confirmPasswordChange_errorTaille').hide();
		erreurConfirmPasswordChangeTaille = false;		
	}
	
	if($("#confirmChangePassword").val() != $("#changePassword").val()){
		$('#confirmPasswordChange_errorCheck').show();
		erreurPasswordChangeCheck = true;
		}else{
		$('#confirmPasswordChange_errorCheck').hide();
		erreurPasswordChangeCheck = false;			
		}
		
	if(erreurPasswordChangeCheck==false && erreurConfirmPasswordChangeTaille==false && erreurPasswordChange==false){$('#submitChangePassword').prop("disabled", false);}
	if(erreurPasswordChangeCheck==true || erreurConfirmPasswordChangeTaille==true || erreurPasswordChange==true){$('#submitChangePassword').prop("disabled", true);}
	
});

/**************************************************/
/***************    SUPR USER  ********************/
/**************************************************/
function injectContentSuprUser(content){
	var divDialog = $("#repRequeteSuprUser");
	$(divDialog).html(content);
}

$('#submitSuprUser').click(function(e){
    e.preventDefault();
	if($("#selectSupr").val() != 'Choisissez un utilisateur...'){
		$.post(
			"controleur/corps/requeteGestionCompte/suprUser.php", {
				selectSuprUser: $("#selectSupr").val(), 
				},
			function (data){
				injectContentSuprUser(data);
			}
		
		);
	}
});

/**************************************************/
/***************    INFO USER  ********************/
/**************************************************/
function injectContentInfoUser(content){
	var divDialog = $("#repRequeteInfoUser");
	$(divDialog).html(content);
}

$('#submitInfoUser').click(function(e){
    e.preventDefault();
	if($("#selectInfo").val() != 'Choisissez un utilisateur...'){
		$.post(
			"controleur/corps/requeteGestionCompte/infoUser.php", {
				selectInfoUser: $("#selectInfo").val(), 
				},
			function (data){
				injectContentInfoUser(data);
			}
		
		);
	}
});
