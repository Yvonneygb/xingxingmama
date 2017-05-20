<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<title>学习写代码是种什么体验</title>
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/ask_questions1.css">
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/style1.css">
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/comments.css">
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/reply1.css">
	<link rel="stylesheet" href="http://127.0.0.1/xingxingmama/xingxingmama/resource/css/question1.css">
	<link rel="stylesheet" type="text/css"  href="http://127.0.0.1/HTNL/question_answer_ask.css">
	<script href="http://127.0.0.1/xingxingmama/xingxingmama/resource/js/common.js"></script>		
</head>
<body>
	
		<div class="main">
		<?php
		            $id=$this->session->myquestion_id;
					$question=$this->Question_model->question($id);
					{
		?>
			<div class="question">
				<div class="tag_box">
					<span class="tag">自闭症</span>
					<span class="tag">教养</span>
					<span class="tag">家长</span>
				</div>
				
				<div class="question_title_box">
					<h1 class="question_title">
					<?php
					echo $question['title'];
					?>
					</h1>
				</div>
				<div class="problem_description_box">
					<span class="problem_description"><?php
					echo $question['describe'];
					?></span>
				</div>			
			</div>
			<?php
					}
			?>
			<?php 
			$id=$this->session->myquestion_id;
			$all_answer=$this->Question_model->get_answers($id);
			
			?>
			<div class="check_all_answer_box">
				<div class="check_all_answer">查看全部<?php
				echo count($all_answer);
				?>个回答</div>
			</div>
						
			
			
			<?php
			foreach($all_answer as $answer_item2){
					?>
			<div class="all_2">
				<div class="user_information">
					<div class="avatar">
						<img src="../../resource/images/da8e974dc_xs.jpg" alt="">
					</div>
					<?php  
								$answer_user=$this->Question_model->get_user($answer_item2['answer_uid']);
								{
								?>
					<div class="name_and_signature">
						<div class="name_box">
							<span class="name">
							<?php  
                                echo $answer_user['name'];								
							?>
							</span>
						</div>
						<div class="signature_box">
							<span class="signature">
							<?php  
                                echo $answer_user['signature'];								
							?>
							</span>
						</div>
					</div>	
					
					
                    <?php
								}
					?>					
				</div>
			
				<div class="agree_count_box">
						<span class="agree_count">
						<?php  echo $answer_item2['agree_count']?>
						人赞同了该回答
						</span>
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
				
				
				<!--评论-->
				<div class="comments_box_border">
					<div class="comments_box">
						<div class="comments_number_box">
							<div class="comments_number">
							<?php
						$comment=$this->Question_model->get_comment($answer_item2['answer_id']);
						echo count($comment);
						?>
						条评论
							</div>
						</div>
						
						
						<?php
						$comment=$this->Question_model->get_comment($answer_item2['answer_id']);
						foreach($comment as $one){
						?>
						<div class="comments_content_box">
							<div class="comments_user_information">
								<div class="comments_user_avatar">
									<img src="../../resource/images/da8e974dc_xs.jpg" alt="">
								</div>
								
								<div class="comments_user_name_box">
									<div class="comments_user_name"><?php  
									$user=$this->Question_model->get_user($one['comment_uid']);									
									echo $user['name'] ?></div>		
								</div>
							</div>
							
							<div class="comments_content">
								<?php  echo $one['comment_content'] ?>
							</div>
							
							<div class="comments_under_box">
								<div class="comments_like_box">
									<button class="comments_like">
										<svg>
											<g>
												<path d="M.718 7.024c-.718 0-.718.63-.718.63l.996 9.693c0 .703.718.65.718.65h1.45c.916 0 .847-.65.847-.65V7.793c-.09-.88-.853-.79-.846-.79l-2.446.02zm11.727-.05S13.2 5.396 13.6 2.89C13.765.03 11.55-.6 10.565.53c-1.014 1.232 0 2.056-4.45 5.83C5.336 6.965 5 8.01 5 8.997v6.998c-.016 1.104.49 2 1.99 2h7.586c2.097 0 2.86-1.416 2.86-1.416s2.178-5.402 2.346-5.91c1.047-3.516-1.95-3.704-1.95-3.704l-5.387.007z"  fill-rule="evenodd"></path>
											</g>
											
										</svg>
										<span class="comments_like_number"><?php  echo $one['like'] ?></span>
										
									</button>
								</div>
							
								<div class="comments_reply_box">
									<button class="comments_reply">
										<svg>
											<g>
												<path d="M21.96 13.22c-1.687-3.552-5.13-8.062-11.637-8.65-.54-.053-1.376-.436-1.376-1.56V.677c0-.52-.635-.915-1.116-.52L.47 6.67C.18 6.947 0 7.334 0 7.763c0 .376.14.722.37.987 0 0 6.99 6.818 7.442 7.114.453.295 1.136.124 1.135-.5V13c.027-.814.703-1.466 1.532-1.466 1.185-.14 7.596-.077 10.33 2.396 0 0 .395.257.535.257.892 0 .614-.967.614-.967z"></path>
											</g>
										</svg>
										<span class="comments_reply_number">233</span>
									</button>
								</div>
								
								<div class="comments_tread_box">
									<button class="commentd_tread">
										<svg>
											<path d="M.718 7.024c-.718 0-.718.63-.718.63l.996 9.693c0 .703.718.65.718.65h1.45c.916 0 .847-.65.847-.65V7.793c-.09-.88-.853-.79-.846-.79l-2.446.02zm11.727-.05S13.2 5.396 13.6 2.89C13.765.03 11.55-.6 10.565.53c-1.014 1.232 0 2.056-4.45 5.83C5.336 6.965 5 8.01 5 8.997v6.998c-.016 1.104.49 2 1.99 2h7.586c2.097 0 2.86-1.416 2.86-1.416s2.178-5.402 2.346-5.91c1.047-3.516-1.95-3.704-1.95-3.704l-5.387.007z"></path>
										</svg>
										<span class="comments_tread_number"><?php  echo $one['tread'] ?></span>
									</button>
								</div>
								
								<div class="comments_report_box">
									<button class="comments_report">
										<svg>
											<g>
												<path d="M16.947 1.13c-.633.135-3.927.638-5.697.384-3.133-.45-4.776-2.54-9.95-.888C.305 1.04.025 1.664.025 2.646L0 18.807c0 .3.1.54.304.718.195.202.438.304.73.304.275 0 .52-.102.73-.304.202-.18.304-.418.304-.718v-6.58c4.533-1.235 8.047.668 8.562.864 2.343.893 5.542.008 6.774-.657.397-.178.596-.474.596-.887V1.964c0-.6-.42-.972-1.053-.835z"></path>
											</g>
										</svg>
										<span class="comments_report_number">233</span>
									</button>
								</div>
							</div>							
						</div>
						
						<?php
						}
						?>
						
						
						<!--
						<div class="comments_content_box">
							<div class="comments_user_information">
								<div class="comments_user_avatar">
									<img src="../../resource/images/da8e974dc_xs.jpg" alt="">
								</div>
								
								<div class="comments_user_name_box">
									<div class="comments_user_name">兰兰</div>		
								</div>
							</div>
							
							<div class="comments_content">
								你说的真对！
							</div>
							
							<div class="comments_under_box">
								<div class="comments_like_box">
									<button class="comments_like">
										<svg>
											<g>
												<path d="M.718 7.024c-.718 0-.718.63-.718.63l.996 9.693c0 .703.718.65.718.65h1.45c.916 0 .847-.65.847-.65V7.793c-.09-.88-.853-.79-.846-.79l-2.446.02zm11.727-.05S13.2 5.396 13.6 2.89C13.765.03 11.55-.6 10.565.53c-1.014 1.232 0 2.056-4.45 5.83C5.336 6.965 5 8.01 5 8.997v6.998c-.016 1.104.49 2 1.99 2h7.586c2.097 0 2.86-1.416 2.86-1.416s2.178-5.402 2.346-5.91c1.047-3.516-1.95-3.704-1.95-3.704l-5.387.007z"  fill-rule="evenodd"></path>
											</g>
											
										</svg>
										<span class="comments_like_number">233</span>
										
									</button>
								</div>
							
								<div class="comments_reply_box">
									<button class="comments_reply">
										<svg>
											<g>
												<path d="M21.96 13.22c-1.687-3.552-5.13-8.062-11.637-8.65-.54-.053-1.376-.436-1.376-1.56V.677c0-.52-.635-.915-1.116-.52L.47 6.67C.18 6.947 0 7.334 0 7.763c0 .376.14.722.37.987 0 0 6.99 6.818 7.442 7.114.453.295 1.136.124 1.135-.5V13c.027-.814.703-1.466 1.532-1.466 1.185-.14 7.596-.077 10.33 2.396 0 0 .395.257.535.257.892 0 .614-.967.614-.967z"></path>
											</g>
										</svg>
										<span class="comments_reply_number">233</span>
									</button>
								</div>
								
								<div class="comments_tread_box">
									<button class="commentd_tread">
										<svg>
											<path d="M.718 7.024c-.718 0-.718.63-.718.63l.996 9.693c0 .703.718.65.718.65h1.45c.916 0 .847-.65.847-.65V7.793c-.09-.88-.853-.79-.846-.79l-2.446.02zm11.727-.05S13.2 5.396 13.6 2.89C13.765.03 11.55-.6 10.565.53c-1.014 1.232 0 2.056-4.45 5.83C5.336 6.965 5 8.01 5 8.997v6.998c-.016 1.104.49 2 1.99 2h7.586c2.097 0 2.86-1.416 2.86-1.416s2.178-5.402 2.346-5.91c1.047-3.516-1.95-3.704-1.95-3.704l-5.387.007z"></path>
										</svg>
										<span class="comments_tread_number">233</span>
									</button>
								</div>
								
								<div class="comments_report_box">
									<button class="comments_report">
										<svg>
											<g>
												<path d="M16.947 1.13c-.633.135-3.927.638-5.697.384-3.133-.45-4.776-2.54-9.95-.888C.305 1.04.025 1.664.025 2.646L0 18.807c0 .3.1.54.304.718.195.202.438.304.73.304.275 0 .52-.102.73-.304.202-.18.304-.418.304-.718v-6.58c4.533-1.235 8.047.668 8.562.864 2.343.893 5.542.008 6.774-.657.397-.178.596-.474.596-.887V1.964c0-.6-.42-.972-1.053-.835z"></path>
											</g>
										</svg>
										<span class="comments_report_number">233</span>
									</button>
								</div>
							</div>							
						</div>
						-->
					</div>					
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
					</script>
				</div>
				
				<div class="AnswerForm-footer">
				        <input type="hidden" name="id" value=<?php echo $this->session->myquestion_id ?> >
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
<script src="http://127.0.0.1/xingxingmama/xingxingmama/resource/js/test.js"></script>	