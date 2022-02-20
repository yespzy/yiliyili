<?php
	error_reporting(0);
	include 'global.php';
	if(empty($_SESSION['islogin'])) exit('请先登录...<a href="login.php">点击登录</a>');
	//获取搜索词条
	$seach = $_POST['seach'];
	if(!empty($seach)){
		if($seach=="全部"){
			$query = mysqli_query($conn, "SELECT * FROM  `liuyan` ORDER BY `id` DESC");
		}else if($seach=="有回复"){
			$query = mysqli_query($conn, "SELECT * FROM  `liuyan` WHERE  `yname` is not null");
		}else if($seach=="没回复"){
			$query = mysqli_query($conn, "SELECT * FROM  `liuyan` WHERE  `yname`  is null");
		}else{
			$query = mysqli_query($conn, "SELECT * FROM  `liuyan` WHERE  `type` LIKE  '%$seach%'");
			
		}
		$i = 1;
		echo "<h3 >留言墙内容</h3>";
		if(mysqli_num_rows($query)==0){
			echo "<div>";
			echo	"<p>暂无此类问题</p>";
			echo "</div>";
		}else{
			while($row = mysqli_fetch_assoc($query)){
			   if(empty($row[yname])){
					echo "<div>";
					echo	"<p>$row[name]&nbsp;&nbsp;<small>$row[type]</small>";
					echo	"<a href=\"liuyan_guanli.php?actc=del&id=$row[Id]\"  class=\"btn  btn-sm btn-danger\" >删除</a></p>";
					echo	"<p><span>问题：</span>$row[text]</p>";
					echo  	"<p><textarea rows=\"5\" name=\"text_$i\" placeholder = \"输入您的解决方案\"></textarea></p>";
					echo  	"<p><input type=\"button\" name=\"$i/$row[Id]\" value=\"回复\"  onclick=\"Xg_a(this.name) \"></p>";
					echo "</div>";
				}else{
					echo "<div>";
					echo	"<p>$row[name]&nbsp;&nbsp;<small>$row[type]</small>";
					echo	"<a href=\"liuyan_guanli.php?actc=del&id=$row[Id]\"  class=\"btn  btn-sm btn-danger\" >删除</a></p>";
					echo	"<p><span>问题：</span>$row[text]</p>";
					echo	"<p><span>$row[yname]</span>&nbsp;医生回复：</p>";
					echo  	"<p><textarea rows=\"5\" name=\"text_$i\" >$row[yhuifu]</textarea></p>";
					echo  	"<p><input type=\"button\" name=\"$i/$row[Id]\" value=\"修改回复\" onclick=\"Xg_a(this.name) \"></p>";
					echo "</div>";
				}
				$i++;
			}
		}
	};
?>