<?php
	error_reporting(0);
	include 'global.php';
	//获取搜索词条
	$seach = $_POST['seach'];
	//echo "<tr><td>返回数据$seach</td></tr>";
	if(!empty($seach)){
		if($seach=="全部"){
			$query = mysqli_query($conn, "SELECT * FROM  `liuyan` ORDER BY `id` DESC");
		}else if($seach=="有回复"){
			$query = mysqli_query($conn, "SELECT * FROM  `liuyan` WHERE  `yname` is not null");
		}else if($seach=="没回复"){
			$query = mysqli_query($conn, "SELECT * FROM  `liuyan` WHERE  `yname` is null");
		}else{
			$query = mysqli_query($conn, "SELECT * FROM  `liuyan` WHERE  `type` LIKE  '%$seach%'");
			
		}
		$i = 1;
		echo "<h3 >留言墙</h3>";
		if(mysqli_num_rows($query)==0){
			echo "<div>";
			echo	"<p>暂无此类问题</p>";
			echo "</div>";
		}else{
			while($row = mysqli_fetch_assoc($query)){
			   if(empty($row[yname])){
					echo "<div>";
					echo	"<p>$row[name]&nbsp;&nbsp;<small>$row[type]</small></p>";
					echo	"<p><span>问题：</span>$row[text]</p>";
					echo "</div>";
				}else{
					echo "<div>";
					echo	"<p>$row[name]&nbsp;&nbsp;<small>$row[type]</small></p>";
					echo	"<p><span>问题：</span>$row[text]</p>";
					echo	"<p><span>$row[yname]</span>&nbsp;医生回复：</p>";
					echo	"<p>$row[yhuifu]</p>";
					echo "</div>";
				}
				$i++;
			}
		}
	};
?>