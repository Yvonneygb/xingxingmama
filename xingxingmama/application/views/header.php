<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<?php 
		echo '<title>' . $title . '</title>';
		echo '<link rel="stylesheet" href="' . base_url('resource/css/style.css') . '">';
		if (isset($css)) 
		{
			foreach ($css as $item) 
			{
				echo '<link rel="stylesheet" href="' . base_url('resource/css/' . $item . '.css') .'">';
			}
		}
		echo '<script src="' . base_url('resource/js/common.js') . '"></script>';;
	 ?>
</head>
<body>