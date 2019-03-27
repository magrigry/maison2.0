function injectContentTchatMessage(content){
	var divDialog = $("#tchatMessage");
	$(divDialog).html(content);
}

ifvisible.onEvery(1, function(){
	getMessages();
});

function getMessages(){
	$.post(
		"controleur/corps/tchat/getMessages.php", {
			message: $("#tchatTextArea").val()
			},
		function (data){
			console.log(data);
			injectContentTchatMessage(data);
		}
	);		
}

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
