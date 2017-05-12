<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>学习写代码是种什么体验</title>
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/ask_questions1.css">
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/style1.css">
	
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/reply1.css">
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/question1.css">
	<link rel="stylesheet" type="text/css"  href="http://127.0.0.1/HTNL/question_answer_ask.css">
	<script href="http://127.0.0.1/xingxingmama/xingxingmama/resource/js/common.js"></script>		
</head>
<body>
	
		<div class="main">
			<div class="question">
				<div class="tag_box">
					<span class="tag">自闭症</span>
					<span class="tag">教养</span>
					<span class="tag">家长</span>
				</div>
				<div class="question_title_box">
					<h1 class="question_title"><?php echo $title;?></h1>
				</div>
				<div class="problem_description_box">
					<span class="problem_description">我的孩子患有自闭症，我想知道这是不是与父母也有关系。</span>
				</div>			
			</div>
			
			<div class="check_all_answer_box">
				<div class="check_all_answer">查看全部2202个回答</div>
			</div>
						
			
			<?php 
			$i=0;
			$data=$this->Question_model->get_answers(8);
			foreach($data as $answer_item2){
					?>
					<div class="all_2">
				<div class="user_information">
					<div class="avatar">
						<img src="../../resource/images/da8e974dc_xs.jpg" alt="">
					</div>
					<div class="name_and_signature">
						<div class="name_box">
							<span class="name"><?php echo $answer_item[$i]['name'];?></span>
						</div>
						<div class="signature_box">
							<span class="signature"><?php echo $answer_item[$i]['signature'];?></span>
						</div>
					</div>			
				</div>
			
				<div class="agree_count_box">
					<span class="agree_count"><?php echo $answer_item[$i]['agree_count'];?>人赞同了该回答</span>
				</div>
				
				<div class="anser_content_box">
					<div class="anser_content"> 
					<?php echo $answer_item2['answer_content'];?>
					</div>
				</div>
		

			
				<div class="add_time_box">
					<span class="add_time">编辑时间：<?php echo $answer_item2['add_time'];?></span>
				</div>
				
				<div class="under_bottom_box">
					<a class="xiamianlianjie" href="http://www.baidu.com"><span>111条评论</span></a>
					<a class="xiamianlianjie" href="http://www.baidu.com"><span>点赞222</span></a>
					<a class="xiamianlianjie" href="http://www.baidu.com"><span>分享</span></a>
					<a class="xiamianlianjie" href="http://www.baidu.com"><span>收藏222</span></a>
				</div>
			
			</div>
			<?php
				}
				?>
			
			
			
			
			
			
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
				
			<div class="AnswerAdd">
				<div class="AnswerAdd-header">
						<div class="AuthorInfo">
							<div class="AvatarWrapper">
								<img src="../../resource/images/da8e974dc_xs.jpg" alt="">
							</div>
							<div class="AuthorInfo-content">
								<div class="AuthorInfo-title">朱小军</div>
								<div class="AuthorInfo-badge">
									<span class="tags">前端工程师</span>
									<button class="Button editTopicExperience">
										<svg viewBox="0 0 12 12" class="icon" width="12" height="16" aria-hidden="true" style="height:16px; width=12px;">
											<title></title>
											<g>
												<path d="M.423 10.32L0 1211.667-.474 1.55-.44-2.4-2.33-.394
												1.564zM10.153.233c-.327-.318-.85-.31-1.17.0181-.793.817 2.49
												2.414.792-.814c.318-.328.312-.852-.017-1.171-1.3-1.263M3.84
												10.536L1.35 8.12216.265-6.46 2.49 2.414-6.265 6.46z" fill-rule="evenodd">
												</path>
											</g>
										</svg>
										"编辑资料回收"
									</button>
								</div>
							</div>
						</div>
						<div class="Anonymous">
							<button class="Button">使用匿名身份回答</button>	
						</div>
				</div>
			</div>
		
						
			<form action="http://127.0.0.1/xingxingmama/xingxingmama/Common/answer_submit"  id="js_form" class="AnswerForm" method="post">			
				<div class="text" >
					<!-- 加载编辑器的容器 -->
					<script id="container" name="content" type="text/plain">
					这里写你的初始化内容
					</script>
				</div>
				
				<div class="AnswerForm-footer">
						<input type="submit" value="提交问题">
				</div>
			</form>
		
		</div>
		
		
		<!-- 配置文件 -->
		<script type="text/javascript" src="http://127.0.0.1\UEditor\ueditor1_4_3_3-utf8-php\utf8-php\ueditor.config.js"></script>
		<!-- 编辑器源码文件 -->
		<script type="text/javascript" src="http://127.0.0.1\UEditor\ueditor1_4_3_3-utf8-php\utf8-php\ueditor.all.js"></script>
				<!-- 实例化编辑器 -->	
		<script type="text/javascript">
			var ue = UE.getEditor('container');
		</script>
	<script>
		var question_id='8';
	</script>

	
	
	<!--<script src="127.0.0.1/xingxingmama/xingxingmama/resource/js/reply.js">
	</script>-->
	



	


	
	
	
	
	
	
	
	
	
</body>
</html>