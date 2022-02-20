<?php
	error_reporting(0);
	include 'global.php';
	//获取搜索词条
	$seach = $_POST['seach'];
	//echo "<tr><td>返回数据$seach</td></tr>";
	if(!empty($seach)){
		$query = mysqli_query($conn, "SELECT * FROM  `news` WHERE  `title` LIKE  '%$seach%'");
		$i = 1;
		echo "<tr>
					<td colspan=\"1\">序号</td>
					<td colspan=\"2\">标题</td>
					<td colspan=\"4\">功能</td>
				</tr>";
		while($row = mysqli_fetch_assoc($query)){
			echo "<tr>
						<td colspan=\"1\">$row[id]</td>
						<td colspan=\"2\">$row[title]</td>
						<td colspan=\"4\">
							<a href=\"backstage.php?actc=del&id=$row[id]\" name=\"shanchu\" class=\"btn btn-danger\" >删除</a>
							<a href=\"news_modify.php?id=$row[id]\" class=\"btn btn-info\" >修改</a>
						</td>
					</tr>";
			$i++;
		}
	};
?>