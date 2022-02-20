<?php
error_reporting(0);
include 'global.php';

if(empty($_SESSION['islogin'])) exit('请先登录...<a href="login.php">点击登录</a>');

if(isset($_GET['actc'])&&$_GET['actc']=='del')//删除
{
	$ids=$_GET['id'];
	echo "<script>alert('删除成功');</script>";
	mysqli_query($conn, "delete  FROM  `liuyan` where Id='".$ids."' ");//删除sql语句
	header('location:liuyan_guanli.php');
}
//退出登录
if(!empty($_GET['sub_exit'])){
	session_destroy();
	switch ($_GET['sub_exit']){
		case 'exit': 
			echo "<script>alert('退出登录成功');</script>";
			header('location:health.php');
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
		<link rel="stylesheet" href="css/liuyan_guanli.css">
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
								留言管理系统
							</h3>
							<h3 style="display: inline-block; margin-left: 10px; color: #1592FF;">
								<a href="liuyan_guanli.php?sub_exit=exit" class="btn btn-warning">退出登录</a>
							</h3>
						</div>
						<!-- 索引条件 -->
						<div class="suoyin_tiao_box">
							<h3 style="margin-left: 10px;display: inline-block;margin-right: 50px;">分类/关键字</h3>
							<input type="text" name="fenlei_text" value="">
							<input type="button" name="fenlei_btn" class="btn btn-success" value="搜索" onclick="Dianji_b()">
							<div>
								<a id="btn_a_1" onclick="Dianji_a(this.text)">全部</a>
								<a id="btn_a_2" onclick="Dianji_a(this.text)">有回复</a>
								<a id="btn_a_3" onclick="Dianji_a(this.text)">没回复</a>
								<?php 
									$query = mysqli_query($conn, "SELECT distinct `type` from `liuyan`");
									$i = 1;
									while($row = mysqli_fetch_assoc($query)){//$row = mysqli_fetch_assoc($query)就是读取全部
										$y = $i+3;
										echo "<a id=\"btn_a_$y\" onclick=\"Dianji_a(this.text)\">";
										echo "$row[type]";
										echo "</a>";
										$i++;
									}
								?>
							</div>
						</div>
						<!-- 索引内容 -->
						<div class="suoyin_nei_box">
							<!-- //动态内容 -->
							<div id="liuyan_qiang">
								
							</div>
							<!-- ajax动态获取数据库数据 -->
							<script type="text/javascript">
								// 太难了
								function Dianji_a(text){
										//1、创建对象
										var xhr = new XMLHttpRequest();
										//2、设置请求行(get请求数据写在url后面)
										xhr.open('post', 'liuyan_ajax.php');
										//3、设置请求头(get请求可以省略， post不发生数据也可以省略)
										xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
										//3.5注册回调函数
										xhr.onload = function() {
											//获取数据
											//修改页面dom元素
											$("#liuyan_qiang").html(xhr.responseText);
										}
										//4、请求主体发送(post请求数据写在这里,如果没有数据，直接为空或者写null)
										//post请求发送数据，写在send中，即发送seach = xx 到php
										xhr.send('seach='+text);
										return true;
								}
								
								function Dianji_b(){
									if($("input[name='fenlei_text']").val().trim().length==0){
										alert("你输入的要我好迷惑呀！找不到呢")
										return;
									}else{
										Dianji_a($("input[name='fenlei_text']").val());
									}
								}
								$("#btn_a_1").click();
							</script>
							<!-- //回复与修改 -->
							<script type="text/javascript">
								// 太难了
								function Xg_a(name_x){
										var arr = new Array();
										arr = name_x.split("/");
										var text  =  $("textarea[name='text_"+arr[0]+"']").val();
										//1、创建对象
										var xhr = new XMLHttpRequest();
										//2、设置请求行(get请求数据写在url后面)
										xhr.open('post', 'liuyan_xiugai.php');
										//3、设置请求头(get请求可以省略， post不发生数据也可以省略)
										xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
										//3.5注册回调函数
										xhr.onload = function() {
											alert(xhr.responseText);
										}
										//4、请求主体发送(post请求数据写在这里,如果没有数据，直接为空或者写null)
										//post请求发送数据，写在send中，即发送seach = xx 到php
										xhr.send('seach='+text+'?//__//?'+arr[1]);
										return true;
								}
							</script>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>
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
