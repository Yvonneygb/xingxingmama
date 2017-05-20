<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8" >
    <title>主页</title>
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/page.css">
	
	
	
	<script language="javascript">
		function anser(){
			window.open("anser.html");
		}
		function ask(){
			window.open("ask.html");
		}
	</script>
	
</head>

<body>
	<!--头部-->
	<div class="zu-top">
		<div class="zu-top-logo">星星妈妈</div>
	</div>
	
	<!--主体-->
	<div class="ask_anser">	
			<ul class="list">
				<li class="list_item_ask_left" >
					<a class="list_item_ask">
						<i class="list_item_ask_img"></i>
						<a href="http://127.0.0.1/xingxingmama/xingxingmama/Common/ask_questions/">提问</a>
					</a>
				</li>
				<li class="list_item_anser_right" >
					<a class="list_item_anser"  onclick="anser()">
						<i class="list_item_anser_img"></i>
						回答
					</a>
				</li>				
			</ul>
	</div>

	
	<?php 
	$all_question=$this->Question_model->get_questions();
    foreach($all_question as $one){
	?>
	<div class="all_box">
		<div class="all">
		
			<div class="avatar" >
					<img src="../../xingxingmama/resource/images/da8e974dc_xs.jpg" alt=""/>
			</div>

			<div class="right">		
				<div class="haha"> 
						<span class="laiyuan">热门内容，来自：</span>			
				</div>
				
				<div class="zhengwen">
					<div class="question">
						<h2><a href="http://127.0.0.1/xingxingmama/xingxingmama/Common/question/<?php echo $one['id']?>"><?php echo $one['title'] ?></a></h2>
						<span class="laiyuan">推荐资料：《制造业的优势》、《制造业的发展》...</span>
					</div>
					<div >
						<span> 
						<?php  
						 $one_answer=$this->Question_model->get_answers($one['id']);
						 if($one_answer!=null){
						 echo $one_answer[0]['answer_content'];
						 }else{
							 echo "暂无答案";
						 }
						?>
						</span>
						<a class="xianshiquanbu" href="http://www.baidu.cn">显示全部</a>
					</div>
					
					
					<!--点赞按钮-->
					<div class="button_dianzan">	
						<div class="button_up">
							<span >1234</span>
						</div>				
					</div>
					
				</div></br>
				
				<div class="dibu">
					<a class="xiamianlianjie" href="http://www.baidu.com">+ 关注问题</a>
					<a class="xiamianlianjie" href="http://www.baidu.com"><span>111条评论</span></a>
					<a class="xiamianlianjie" href="http://www.baidu.com"><span>点赞222</span></a>
					<a class="xiamianlianjie" href="http://www.baidu.com"><span>分享</span></a>
					<a class="xiamianlianjie" href="http://www.baidu.com"><span>收藏222</span></a>
				</div>
			</div>	
		</div>
	</div>
	<?php 
	}
	?>
	
	
	
	
	
	
	
	
	
	
	
		
</body>
</html>