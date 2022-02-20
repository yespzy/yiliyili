<?php
error_reporting(0);
include 'global.php';

if(empty($_SESSION['islogin'])) exit('请先登录...<a href="login.php">点击登录</a>');
if(!empty($_POST['sub_chat'])){
	$Keyword = _ESC($_POST['Keyword']);
	$Reply = _ESC($_POST['Reply']);
	$query = mysqli_query($conn, "INSERT INTO `yiliyili`.`reply` (`id`, `Keyword`, `Reply`) VALUES (NULL, '$Keyword', '$Reply')");
	echo "<script>alert('添加成功'); location.href='backstage.php';</script>";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>新闻发布-当前管理员:<?php echo $_SESSION['islogin'] ?></title>
		<link href="framework/bootstrap3.3.7.min.css" rel="stylesheet" />
		<script src="framework/jquery.min.js"></script>
		<script src="framework/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/index.css">
		<!--bootstrap引用结束-->
		<link href="css/news_add.css" rel="stylesheet" />
	</head>
	<body>
		<!-- 页头开始 -->
		<div class="header">
			<!-- logo于名称 -->
			<div class="logo">
				<a href="index.php">
					<img src="./img/yiliyiliyi.png" class="">
				</a>
			</div>
			<!-- 水平线 -->
			<span></span>
			<div class="nav_box">
				<ul class="">
					<li><a href="backstage.php">返回后台</a></li>
					
				</ul>
			</div>
		</div>
		<!-- 页头结束 -->
		<!--页体开始-->
		<div class="bodyer container">
			<div class="content row">
				<div class="content_left col-md-3">
					<div class="row">
						<div class="col-md-12 box_left">
							<div class="box_left_1">
								<div class="headicon"><a href=""><img src="<?php
										$name = $_SESSION['islogin'];
										$sql = "SELECT * FROM `admin` WHERE name = '$name'";
										$query = mysqli_query($conn, $sql);
										$result = mysqli_fetch_row($query);
										echo "$result[4]";
										?>"></a></div>
								<p><?php echo $_SESSION['islogin'];?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="content_middle col-md-6">
					<div class="row">
						<div class="col-md-12 box_content">
							<div class="box_content_1">
								<div class="content_title">
									<h2><img src="img/pen.png" />为小Y添加新的回复</h2>
								</div>
								<span></span>
								<div class="content_text">
									<div class="content" align="center">
										<!--表单开始-->
										<form class="form-horizontal" onsubmit="return checkForm();" method="post" enctype="multipart/form-data" action="chat_add.php">
											<div class="form-group">
												<div class="col-sm-12 box_form">
													<input class="form-control" name="Keyword" type="text" id="news_title" placeholder="请输入关键字" onkeyup="checkTitle();">
													<span class="popover-show titleMsg" data-container="body" data-toggle="popover" data-placement="bottom"
													 data-content="关键字不能为空"></span>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12 box_form">
													<textarea class="form-control" name="Reply" rows="20" cols="80" type="Text" id="news_content"
													 placeholder="请输入消息内容" onkeyup="checkContent();"></textarea>
													<span class="popover-show contentMsg" data-container="body" data-toggle="popover" data-placement="bottom"
													 data-content="内容不能为空"></span>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-12 center_btn">
												<input type="submit" name="sub_chat" class="btn btn-default" value="添加消息">
												</div>
											</div>
										</form>
										<!--表单结束-->
										<script type="text/javascript" src="js/news_add_validation.js"></script>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="content_right col-md-3">
					<div class="row">
						<div class="col-md-12 box_right">
							<div class="box_right_1">
								<div class="hot">
									<div>
										<h3>小Y消息列表</h3>
									</div>
									<span></span>
									<div>
										<ul class="list-group">
											<?php
											    $query = mysqli_query($conn, "SELECT * FROM `reply` ORDER BY `id` DESC");
											    $i = 1;
											    while($row_rdph = mysqli_fetch_assoc($query) and $i<11){
											        echo "<li class=\"list-group-item\"><img src=\"img/newsIcon.png\"/>$row_rdph[Reply]</li>";
											        $i++;
											    }
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
		<!--页体结束-->
		<!--页脚开始-->
		<div class="footer">
			<div class="footer-agile">
				<div class="container">
					<div class="footer-btm-agileinfo" style="margin-top: 100px;">
						<div class="col-md-3 col-xs-3 footer-grid w3social">
							<h3>Our Links</h3>
							<ul>
								<li><a href="index.php">网站首页</a></li>
								<li><a href="news.php">新闻资讯</a></li>
								<li><a href="health.php">健康资讯</a></li>
								<li><a href="about.html">关于我们</a></li>
							</ul>
						</div>
						<div class="col-md-3 col-xs-3 footer-grid">
							<h3>Contact Info</h3>
							<ul>
								<li><img src="img/phone.png"> +199 2453 8970</li>
								<li><img src="img/pho.png"> +987 6542 3210</li>
								<li class="li-thrd"><img src="img/address.png"> 广东石油化工学院</li>
								<li><img src="img/email.png"> <a>2093897006@qq.com</a></li>
							</ul>
						</div>
						<div class="col-md-6 col-xs-6 footer-grid footer-review">
							<h3>About us</h3>
							<p>我们是广东石油化工学院的三名学子，学习努力，态度认真</p>
							<p class="w3l-para-mk">我们想让我们的网站能够为你服务，让它的存在变得有意义</p>
							
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
		<!--页脚结束-->
	</body>
</html>
