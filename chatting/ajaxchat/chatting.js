$( document ).ready(function(){
		$("#chatroom").hide();
        get_users();
 });


function get_users(){
		$.get("ajaxchat/get_users.php",
		function(data, status){
			if (status == "success") {
				$(".user_list").html(data);
			}
			//alert("data: "+ data + "\nStatus: " + status);
		}
		);
}



function chatting(sender, receiver){
		//var sender = $('#username').val();
		//var receiver = $('#password').val();
		var message = $('#message').val();

		//alert("sender : "+sender+" receiver : "+receiver);
		$.post("ajaxchat/insert_message.php",
		{
			message: message,
			sender: sender,
			receiver: receiver
		},
		function(data, status){
			if (status == "success") {
				$("#message").val("");
			}
			//alert("data: "+ data + "\nStatus: " + status);
		}
		);
}



function loadchat(sender, receiver, receiver_name){
	$(".dashboard_chatting").hide();
	$("#chatroom").show();
	$("#receiver_name").text(receiver_name);
	var myVar = setInterval(function(){
		disp_chatting(sender, receiver);
	}, 1000);

}


function disp_chatting(sender, receiver){
	$.post("ajaxchat/get_message.php",
		{
			/*message: message,
			*/sender: sender,
			receiver: receiver
		},
		function(data, status){
			$('#output').html(data);
			$('#send_button').html(function(){
				return '<button class="sending" id="send" onclick="chatting('+sender+','+receiver+');">Send</button>';
			});
		}
		);
	}


/*function call_first_window(){
		$(".heading").hide();
		$(".dashboard_chatting").slideDown(800);
		$(".heading").fadeIn(100);
		$("#chatroom").hide();
}
*/

