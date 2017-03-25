;!function () 
{
	function Pop_up() 
	{
		this.create_DOM();
		this.bind_event();
		var _this = this;

		var add_info = function() 
		{
			_this.modal_layer.className = "modal_layer";
			_this.popup_box.className = 'popup_box';
			_this.popup_title.className = 'popup_title';
			_this.popup_title.innerHTML = "写下你的问题";
			_this.popup_subtitle.className = 'popup_subtitle';
			_this.popup_subtitle.innerHTML = '描述精确的问题更易得到解答';
			_this.popup_form.className = 'popup_form';
			_this.popup_form.action = BASE_URL + 'Common/ask_questions_submit';
			_this.popup_form.method = 'post';
			_this.popup_form.id = 'js_problem_form';
			_this.cancel_btn.innerHTML = '取消';
			_this.cancel_btn.className = 'popup_cancel_btn';
		}

		add_info();

		var add_form_content = function () 
		{
			var problem_title  = '<textarea name="problem_title" class="problem_title input_padding margin_bot" placeholder="问题标题"></textarea><div class="err js_err_title"></div>';	
			/*话题待增加，渲染方式待定*/
			var topic = '<select class="topic" name="topic"><option value="1">PHP</option><option value="2">JS</option><option value="3">HTML</option></select>';
			var problem_description_box = '<label class="problem_description_box"><span>问题描述（可选）：</span><textarea name="problem_description" class="problem_description input_padding"></textarea></label>';
			var anonymous_select = '<label class="anonymous_select"><input type="checkbox" name="anonymous" value="on">匿名提问</label> ';
			var dubmit_btn = '<input type="submit" value="提交问题" class="btn btn-blue btn-lg btn_submit">';
			_this.popup_form.innerHTML = problem_title + topic + problem_description_box + anonymous_select + dubmit_btn;
		}

		add_form_content();
	
		document.body.appendChild(this.modal_layer);
		document.body.appendChild(this.popup_box);
	}

	Pop_up.prototype =  
	{
		create_DOM : function () 
		{
			//模态层，防止用户点击弹框以外
			this.modal_layer = document.createElement('div');

			//弹出框
			this.popup_box = document.createElement('div');

			//标题
			this.popup_title = document.createElement('h3');

			//提示信息
			this.popup_subtitle = document.createElement('div');
			
			//表单内容
			this.popup_form = document.createElement('form');

			//取消按钮
			this.cancel_btn = document.createElement('button');

			this.popup_box.appendChild(this.popup_title);
			this.popup_box.appendChild(this.popup_subtitle);
			this.popup_box.appendChild(this.popup_form);
			this.popup_box.appendChild(this.cancel_btn);
		},

		show : function (fn) 
		{
            this.popup_box.style.display = this.modal_layer.style.display = "block";
		  	document.body.className = "do_not_scroll";
		  	fn && fn();
		},

		hide : function (fn) 
		{
			this.popup_box.style.display = this.modal_layer.style.display = "none";
			document.body.className = "";
			fn && fn();
		},

		bind_event : function () 
		{
			var _this = this;
			this.cancel_btn.addEventListener('click',function () 
			{
				_this.hide.call(_this);
			});
		}

	}

	window.Pop_up = Pop_up;
}();