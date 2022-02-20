<?php
error_reporting(0);
include 'global.php';

if(empty($_SESSION['islogin'])) exit('请先登录...<a href="login.php">点击登录</a>');

if(isset($_GET['actc'])&&$_GET['actc']=='del')//删除新闻信息
{
	$ids=$_GET['id'];
	mysqli_query($conn, "delete from news where id='".$ids."' ");//删除sql语句
	echo "<script>alert('删除成功');location.href='backstage.php';</script>";
}
if(isset($_GET['chat'])&&$_GET['chat']=='delchat')//删除小Y信息
{
	$ids=$_GET['id'];
	mysqli_query($conn, "delete from reply where id='".$ids."' ");//删除sql语句
	echo "<script>alert('删除成功');location.href='backstage.php';</script>";
}
//退出登录
if(!empty($_GET['sub_exit'])){
	session_destroy();
	switch ($_GET['sub_exit']){
		case 'exit': 
			echo "<script>alert('退出登录成功');location.href='index.php';</script>";
		break;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>后台管理系统</title>
		<link href="framework/bootstrap3.3.7.min.css" rel="stylesheet" />
		<script src="framework/jquery.min.js"></script>
		<script src="framework/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/index.css">
		<!--bootstrap引用结束-->
		<!-- 表单验证 -->
		<script type="text/javascript" src="js/backstage_validation.js"></script>
		<link href="css/backstage_css.css" rel="stylesheet" />
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
					<li><a href="index.php">网站首页</a></li>
					<li><a href="news.php">新闻资讯</a></li>
					<li><a href="health.php">健康资讯</a></li>
					<li><a href="about.html">关于我们</a></li>
				</ul>
			</div>
		</div>
		<!-- 页头结束 -->
		<!-- 页体开始 -->
		<div class="container bodyer">
			<div class="bodyer_box">
				<div class="bodyer_box_1">
					<div>
						
							<div class="form_box">
								<h3 style="display: inline-block;font-weight: 600;">
									后台管理系统
								</h3>
								<h3 style="display: inline-block; margin-left: 10px; color: #1592FF;">
									<a href="news_add.php" class="btn btn-primary">发布新闻</a>
								</h3>
								<h3 style="display: inline-block; margin-left: 10px; color: #1592FF;">
									<a href="chat_add.php" class="btn btn-info">小Y信息添加</a>
								</h3>
								<h3 style="display: inline-block; margin-left: 10px; color: #1592FF;">
									<a href="backstage.php?sub_exit=exit" class="btn btn-warning">退出登录</a>
								</h3>
							</div>
							<!--标签页切换按钮开始-->
							<div class="row navbar_menu_1">
								<ul class="col-xs-12" id="newsTab">
									<li class="active"><input class="btn btn-success" type="button" href="#news_list" data-toggle="tab" value="新闻总览"></li>
									<li><input class="btn btn-success" type="button" href="#news_seach" data-toggle="tab" value="搜索新闻"></li>
									<li><input class="btn btn-success" type="button" href="#chat_list" data-toggle="tab" value="小Y信息管理"></li>
								</ul>
							</div>
							<!--标签页切换按钮结束-->
							<!--标签页切换开始-->
							<div class="tab-content" id="newsTab_content">
								<div class="row news_box tab-pane fade in active" id="news_list">
									<div class="col-xs-12 form_box">
										<table class="table table-bordered">
											<tr>
												<td colspan="5" style="text-align: center;font-weight: 600;font-size: 20px;">序号</td>
												<td colspan="5" style="text-align: center;font-weight: 600;font-size: 20px;">标题</td>
												<td colspan="2" style="text-align: center;font-weight: 600;font-size: 20px;">操作</td>
											</tr>
											<?php
												$query = mysqli_query($conn, "SELECT * FROM `news` ORDER BY `id` DESC");
												$i = 1;
												while($row = mysqli_fetch_assoc($query) and $i<24){
													echo "<tr>";
													echo "<td colspan=\"5\">$row[id]</td>";
													echo "<td colspan=\"5\">$row[title]</td>";
													echo "<td colspan=\"2\" style=\"text-align: center;\" >
													<a href=\"backstage.php?actc=del&id=$row[id]\" name=\"shanchu\" class=\"btn btn-danger\" >删除</a>
													<a href=\"news_modify.php?id=$row[id]\" class=\"btn btn-info\" >修改</a></td>";
													echo "</tr>";
													$i++;
												}
											?>
										</table>
									</div>
								</div>
								<div class="row news_box tab-pane fade" id="news_seach">
									<div class="col-xs-12 form_box">
										<!--搜索盒子开始-->
										<div class="form_seach">
											<div class="input-group">
												<span class="popover-show seachMsg" data-container="body" data-toggle="popover" data-placement="top"
												 data-content="搜索内容不能为空"></span>
												<input type="text" class="form-control" name="seach" id="seach" placeholder="请输入查询内容" onkeyup="checkSeach();"/>
												<span class="input-group-btn">
													<input type="button" class="btn btn-default" name="sub_seach" id="btn_seach" value="搜索">
												</span>
											</div>
										</div>
										<!--搜索盒子结束-->
										<table class="table table-bordered seach_table" id="show_seach">								
											<tr>
												<td colspan="1">序号</td>
												<td colspan="2">标题</td>
												<td colspan="4">功能</td>
											</tr>
											<!--获取查询结果-->
											<script>
												//点击事件
												document.querySelector('#btn_seach').onclick = function() {
													seachObj = document.getElementById("seach");
													var value = seachObj.value;
													if(!value){
														$(function() {
															$('.seachMsg').popover('show');
														});
														return false;
													} else {
														$(function() {
															$('.seachMsg').popover('hide');
														});
														//1、创建对象
														var xhr = new XMLHttpRequest();
														//2、设置请求行(get请求数据写在url后面)
														xhr.open('post', 'postSeach.php');
														//3、设置请求头(get请求可以省略， post不发生数据也可以省略)
														xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
														//3.5注册回调函数
														xhr.onload = function() {
															//获取数据
															console.log(xhr.responseText);
															//修改页面dom元素
															document.querySelector('#show_seach').innerHTML = xhr.responseText;
														}
														//4、请求主体发送(post请求数据写在这里,如果没有数据，直接为空或者写null)
														//post请求发送数据，写在send中
														xhr.send('seach='+value);
														return true;
													}
												}
											</script>
										</table>
									</div>
								</div>
								<div class="row news_box tab-pane fade" id="chat_list">
									<div class="col-xs-12 form_box">
										<table class="table table-bordered">
											<tr>
												<td colspan="3" style="text-align: center;font-weight: 600;font-size: 20px;">序号</td>
												<td colspan="3" style="text-align: center;font-weight: 600;font-size: 20px;">关键字</td>
												<td colspan="3" style="text-align: center;font-weight: 600;font-size: 20px;">回复内容</td>
												<td colspan="2" style="text-align: center;font-weight: 600;font-size: 20px;">操作</td>
											</tr>
											<?php
												$query = mysqli_query($conn, "SELECT * FROM `reply` ORDER BY `id` DESC");
												$i = 1;
												while($row = mysqli_fetch_assoc($query) and $i<24){
													echo "<tr>";
													echo "<td colspan=\"3\">$row[id]</td>";
													echo "<td colspan=\"3\">$row[Keyword]</td>";
													echo "<td colspan=\"3\">$row[Reply]</td>";
													echo "<td colspan=\"2\" style=\"text-align: center;\" >
													<a href=\"backstage.php?chat=delchat&id=$row[id]\" name=\"shanchu\" class=\"btn btn-danger\" >删除</a>
													<a href=\"chat_modify.php?id=$row[id]\" class=\"btn btn-info\" >修改</a></td>";
													echo "</tr>";
													$i++;
												}
											?>
										</table>
									</div>
								</div>
							</div>
							<!--标签页切换结束-->
						
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
