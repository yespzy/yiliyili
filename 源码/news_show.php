<?php
include 'global.php';

if(isset($_GET['id'])){
                  $id = intval($_GET['id']);
                  $query = mysqli_query($conn, "SELECT * FROM `news` WHERE `id` = '$id'");
                  $row = mysqli_fetch_row($query);
              }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo ''.$row[1].''; ?></title>
		<link href="framework/bootstrap3.3.7.min.css" rel="stylesheet" />
		<script src="framework/jquery.min.js"></script>
		<script src="framework/bootstrap.min.js"></script>
		<!--bootstrap引用结束-->
		<link href="css/news_show.css" rel="stylesheet" />
	</head>
	<body>
		<!--页头开始-->
		<div class="header">
			<!-- logo于名称 -->
			<div class="logo">
				<a href="index.php">
					<img src="./img/yiliyiliyi.png" class="">
				</a>
			</div>
			<span></span>
			<!--导航栏开始-->
			<div class="nav_box">
				<ul class="ul-menu-1">
					<li><a href="index.php">网站首页</a></li>
					<li><a href="news.php">新闻资讯</a></li>
					<li><a href="health.php">健康资讯</a></li>
					<li><a href="about.html">关于我们</a></li>
				</ul>
			</div>
			<!--导航栏结束-->
		</div>
		<!--页头结束-->
		<!--页体开始-->
		<div class="bodyer container">
			<div class="content row">
				<div class="content_left col-md-3">
					<div class="row">
						<div class="col-md-12 box_left">
							<div class="box_left_1">
								<div class="headicon"><a href=""><img src="<?php
										$name = $row[3];
										$sql = "SELECT * FROM `admin` WHERE name = '$name'";
										$query = mysqli_query($conn, $sql);
										$headicon = mysqli_fetch_row($query);
										if(!empty($headicon))
											echo "$headicon[4]";
											else echo "files/default_icon.jpg";
										?>"></a></div>
								<p><?php echo ''.$row[3].''; ?></p>
							</div>
						</div>
						<div class="col-md-12 box_left">
							<div class="box_left_1">
								<div>
									<h3>复工复学</h3>
								</div>
								<span></span>
								<div>
									<ul class="list-group">
										<?php
										   $query = mysqli_query($conn, "SELECT * FROM `news` WHERE `type` = '复工复学' ORDER BY `id` DESC");
										    $i = 1;
										    while($row0 = mysqli_fetch_assoc($query) and $i<6){
										        echo "<li class=\"list-group-item\"><a href=\"news_show.php?id=$row0[id]\"><img src=\"img/newsIcon.png\"/>$row0[title]</a></li>";
										        $i++;
										    }
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content_middle">
						<div class="content_title">
							<h2><?php echo ''.$row[1].''; ?></h2>
							<p><?php echo '日期：'.$row[4].'&nbsp&nbsp&nbsp作者：'.$row[3].''; ?></p>
						</div>
						<span></span>
						<div class="content_text">
							<img src="<?php echo ''.$row[5].''; ?>">
							<!--新闻内容开始-->
							<?php echo ''.$row[2].''; ?>
							<!--新闻内容结束-->
						</div>
					</div>
				</div>
				<div class="content_right col-md-3">
					<div class="row">
						<div class="col-md-12 box_right">
							<div class="box_right_1">
								<div class="hot">
									<div>
										<h3>热点排行</h3>
									</div>
									<span></span>
									<div>
										<ul class="list-group">
											<?php
											    $query = mysqli_query($conn, "SELECT * FROM `news` ORDER BY `id` DESC");
											    $i = 1;
											    while($row1 = mysqli_fetch_assoc($query) and $i<6){
											        echo "<li class=\"list-group-item\"><a href=\"news_show.php?id=$row1[id]\"><img src=\"img/newsIcon.png\"/>$row1[title]</a></li>";
											        $i++;
											    }
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 box_right">
							<div class="box_right_1">
								<div class="hot">
									<div>
										<h3>疫情防控</h3>
									</div>
									<span></span>
									<div>
										<ul class="list-group">
											<?php
											      $query = mysqli_query($conn, "SELECT * FROM `news` WHERE `type` = '疫情防控' ORDER BY `id` DESC");
											    $i = 1;
											    while($row_xwss = mysqli_fetch_assoc($query) and $i<6){
											        echo "<li class=\"list-group-item\"><a href=\"news_show.php?id=$row_xwss[id]\"><img src=\"img/newsIcon.png\"/>$row_xwss[title]</a></li>";
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
