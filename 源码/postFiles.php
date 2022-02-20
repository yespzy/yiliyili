<?php
//接收提交的文件
//超全局变量 用来接收提交的文件
	print_r($_FILES);
	
	move_uploaded_file($_FILES['img']['tmp_name'],'files/'.$_FILES['img']['name']);
?>
