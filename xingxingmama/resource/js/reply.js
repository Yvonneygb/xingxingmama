

 	var Oform = document.getElementById('js_form');
	var text = document.getElementsByName('text')[0];

 	Oform.onsubmit = function (ev)
 	{
		// ev.preventDefault();


 		if (!text.value)
 		{
 			return false;
 		}

		var send =  document.createElement('input');
		send.name = "id";
		send.value = question_id;
		send.type='hidden';
		Oform.appendChild(send);
 	}
