<?php
	error_reporting(0);
	include 'global.php';
	//获取接收到的信息
	$seach = $_POST['seach'];
	$messageList = array();
	if(!empty($seach)){
		$query = mysqli_query($conn, "SELECT * FROM  `reply` WHERE  `Keyword` LIKE  '%$seach%'");
		$i = 1;
		while($row = mysqli_fetch_assoc($query)){
			$messageList[]=$row['Reply']; 
			$i++;
		}
	};
	if(!empty($messageList)){
		//从 数组中 随机 取出 消息
		//array_rand 返回的 是一个 随机 下标的数据
		$randomKey = array_rand($messageList,1);
		//稍稍延迟一下，假装思考
		sleep(1);
		//使用 随机 下标 返回 随机的 值
		echo $messageList[$randomKey];
	}else{
		echo "没有找到您要找的东西( ╯□╰ )。"; 
	}
	

	// //根据 发送 过来的 消息 返回 不同的内容
	// $messageList = array(
	// 	'你好啊O(∩_∩)O',
	// 	'见到你很高兴！',
	// 	'你说什么？',
	// 	'不好意思，我没听懂( ╯□╰ )',
	// 	'<a href="#">不要点我哦！(●ˇ∀ˇ●)。</a>',
	// 	'早上好！'
	// );
	// //从 数组中 随机 取出 消息
	// //array_rand 返回的 是一个 随机 下标的数据
	// $randomKey = array_rand($messageList,1);
	// //使用 随机 下标 返回 随机的 值
	// echo $messageList[$randomKey];
?>