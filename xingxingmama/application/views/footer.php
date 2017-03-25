</body>
</html>
<?php 
	if (isset($js)) 
	{
		foreach ($js as $item) 
		{
			echo '<script src="' . base_url('resource/js/' . $item . '.js').'"></script>';
		}
	}
 ?>
