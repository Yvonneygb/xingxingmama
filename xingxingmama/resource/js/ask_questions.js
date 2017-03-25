;!function () 
{
	var question_btn = document.getElementById('js_question');
	var _Pop_up;
	question_btn.onclick = function () 
	{
		if (!_Pop_up) 
		{
			_Pop_up = new Pop_up();
		}
		else
		{
			_Pop_up.show();
		}


		var problem_form = document.getElementById('js_problem_form');
		var err_title = document.getElementsByClassName("js_err_title")[0];
		var err_topic = document.getElementsByClassName("js_err_topic")[0];

		problem_form.onsubmit = function(ev)
		{
			var problem_tilte = document.getElementsByName("problem_title")[0];
			var problem_topic = document.getElementsByName("topic")[0];
			var title_val = problem_tilte.value.trim();

			if(title_val == "" || title_val.length > 256)
			{
				problem_tilte.className="problem_title input_padding";
				err_title.style.display = "block";
				ev.preventDefault();
				err_title.innerHTML = title_val == "" ? "不能为空" : "字数超限" ;
			}
		}

	}
	
}();