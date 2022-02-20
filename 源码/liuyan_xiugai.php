<?php
	error_reporting(0);
	include 'global.php';
	if(empty($_SESSION['islogin'])) exit('请先登录...<a href="login.php">点击登录</a>');
	//获取搜索词条
	$seach = explode("?//__//?",$_POST['seach']);
	
	if(!empty($seach)){
		$author = $_SESSION['islogin'];
		$query = mysqli_query($conn, "UPDATE `liuyan` SET `yname`= '$author',`yhuifu`= '$seach[0]' WHERE `Id`= '$seach[1]'");
		if(mysqli_affected_rows($conn)){
			echo "回复或修改成功";
		}else{
			echo "回复或修改失败'";
		}
	};
?>