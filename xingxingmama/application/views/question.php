<?php
	$header['title'] = $title;
	$header['css'] = array('question','reply');
	$this->load->view('header', $header);
 ?>
 <div class="wrap">
	 <div class="main">
	 	<div class="question">
		 	<?php
		 		$tags = array(1 => 'PHP', 2 => 'JS' , 3 => 'HTML');
		 		foreach ($tags as $key => $value)
		 		{
		 			if ($key == $tag)
		 			{
		 				echo '<span class="tag" >' . $value . '</span>';
		 			}
		 		}
		 	 ?>
			<h1 class="questions_title">
				<?php echo $title; ?>
			</h1>
			<div class="problem_description">
				<?php echo $content; ?>
			</div>
		</div>

		<div class="AnswerAdd">
			<div class="AnswerAdd-header">
				<div class="AuthorInfo">
					<div class="AvatarWrapper">
						<img src="../../resource/images/da8e974dc_xs.jpg" alt="">
					</div>
					<div class="AuthorInfo-content">
						<div class="AuthorInfo-title">
							朱小军
						</div>
						<div class="AuthorInfo-badge">
							<span class="tags">前端工程师</span>
							<button class="Button editTopicExperience">
								<svg viewBox="0 0 12 12" class="icon" width="12" height="16" aria-hidden="true" style="height: 16px; width: 12px;"><title></title><g><path d="M.423 10.32L0 12l1.667-.474 1.55-.44-2.4-2.33-.394 1.564zM10.153.233c-.327-.318-.85-.31-1.17.018l-.793.817 2.49 2.414.792-.814c.318-.328.312-.852-.017-1.17l-1.3-1.263zM3.84 10.536L1.35 8.122l6.265-6.46 2.49 2.414-6.265 6.46z" fill-rule="evenodd"></path></g></svg>
								编辑话题经验
							</button>
						</div>
					</div>
				</div>
				<div class="Anonymous"><button class="Button">使用匿名身份回答</button></div>
			</div>

			<form  action="<?php echo base_url('Common/answer_submit') ?>" id="js_form" class="AnswerForm" method="post" >
				<div class="tools">工具栏</div>
				<div class="RichText">
					<textarea name="text" class="textarea">
					</textarea>
				</div>

				<div class="AnswerForm-footer">
					<input type="submit" value="提交回答">
				</div>
			</form>

		</div>



	</div>
</div>

<script>
	var question_id = '<?php echo $id ?>';
</script>
<?php
	$footer['js'] = array('reply');
	$this->load->view('footer', $footer);
 ?>
