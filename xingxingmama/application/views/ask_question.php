<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/ask.css">

<script src="script/ask.js"></script>
</head>

<body>

<div class="modal_layer"></div>
	<div class="popup_box" style="display: block;">
		<h3 class="popup_title">写下你的问题</h3>
		<div class="popup_subtitle">描述精确的问题更易得到解答</div>
		<form class="popup_form">
			<textarea name="problem_title" class="problem_title input_padding" placeholder="问题标题"></textarea>
			<div class="err" fv-problem_title>问题标题不能为空</div> 
			<input type="text" name="topic" class="topic input_padding" placeholder="添加话题">
			<div class="err" fv-problem_title>至少添加一个话题</div> 
			<label class="problem_description_box">
				<span>问题描述（可选）：</span>
				<textarea name="problem_description" class="problem_description input_padding">
				</textarea>
			</label>
			<label class="anonymous_select">
				<input type="checkbox">
				匿名提问
			</label> 
			<input type="submit" value="提交问题" class="btn btn-blue btn-lg btn_submit">
		</form>
		<button class="popup_cancel_btn">取消</button>
</div> 
<body>
</html>