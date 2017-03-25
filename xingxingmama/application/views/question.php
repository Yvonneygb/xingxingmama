<?php 
	$header['title'] = $title;
	$header['css'] = array('question');
	$this->load->view('header', $header);
 ?>			
 <div class="wrap">
	 <div class="main">
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
</div>

<?php 
	$footer['js'] = array();
	$this->load->view('footer', $footer);
 ?>