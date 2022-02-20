<?php
include 'global.php';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>新闻资讯</title>
		<!--bootstrap引用开始-->
		<link href="framework/bootstrap3.3.7.min.css" rel="stylesheet" />
		<script src="framework/jquery.min.js"></script>
		<script src="framework/bootstrap.min.js"></script>
		<!--bootstrap引用结束-->
		<link href="css/news.css" rel="stylesheet" />
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
		<div class="bodyer">
			<div class="middle_box container">
				<div class="navbar_menu_2 row">
					<ul class="" id="newsTab">
						<li class="active col-md-3"><a href="#news_ac" data-toggle="tab">最新动态</a></li>
						<li class="col-md-3"><a href="#news_dt" data-toggle="tab"><span>疫情动态</span></a></li>
						<li class="col-md-3"><a href="#news_fk" data-toggle="tab">疫情防控</a></li>
						<li class="col-md-3"><a href="#news_fg" data-toggle="tab">复工复学</a></li>
					</ul>
				</div>
				<!--新闻盒子1开始-->
				<div class="tab-content" id="newsTab_content">
					<!--最新动态盒子开始-->
					<div class="row news_box tab-pane fade in active affair_list" id="news_ac">
						<?php
						    $query = mysqli_query($conn, "SELECT * FROM `news` ORDER BY `id` DESC");
						    $i = 1;
						    while($row = mysqli_fetch_assoc($query) and $i<30){
						        echo "<div class=\"col-md-4\">
										<div class=\"news_box_1\">
											<a href=\"news_show.php?id=$row[id]\"><img src=\"$row[img]\" class=\"img-responsive\" /></a>
											<p><a href=\"news_show.php?id=$row[id]\">$row[title]</a></p>
										</div>
									</div>";
								$i++;
						    }
						?>
						<!-- 新闻模板开始-->
						<!-- <div class="col-md-4">
								<div class="news_box_1">
									<a href="news_show.html"><img src="./img/news_0.jpg" class="img-responsive" /></a>
									<p><a href="news_show.html">盒子1</a></p>
								</div>
							</div> -->
						<!--新闻模板结束 -->
						<div class="col-md-12 loading">
							<!-- <input class="load_more" type="button" id="new_zxdt" value="加载更多"> -->
						</div>
					</div>
					<!--最新动态盒子结束-->
					<!--疫情动态盒子开始-->
					<div class="row news_box tab-pane fade" id="news_dt">
						<!--php查询疫情动态-->
						<?php
						    $query = mysqli_query($conn, "SELECT * FROM `news` WHERE `type` = '疫情动态' ORDER BY `id` DESC");
						    $i = 1;
						    while($row = mysqli_fetch_assoc($query) and $i<30){
						        echo "<div class=\"col-md-4\">
										<div class=\"news_box_1\">
											<a href=\"news_show.php?id=$row[id]\"><img src=\"$row[img]\" class=\"img-responsive\" /></a>
											<p><a href=\"news_show.php?id=$row[id]\">$row[title]</a></p>
										</div>
									</div>";
								$i++;
						    }
						?>
						<div class="col-md-12 loading">
							<!-- <p><a href="">加载更多</a></p> -->
						</div>
					</div>
					<!--疫情动态盒子结束-->
					<!--疫情防控盒子开始-->
					<div class="row news_box tab-pane fade" id="news_fk">
						<!--php查询疫情防控-->
						<?php
						    $query = mysqli_query($conn, "SELECT * FROM `news` WHERE `type` = '疫情防控' ORDER BY `id` DESC");
						    $i = 1;
						    while($row = mysqli_fetch_assoc($query) and $i<30){
						        echo "<div class=\"col-md-4\">
										<div class=\"news_box_1\">
											<a href=\"news_show.php?id=$row[id]\"><img src=\"$row[img]\" class=\"img-responsive\" /></a>
											<p><a href=\"news_show.php?id=$row[id]\">$row[title]</a></p>
										</div>
									</div>";
								$i++;
						    }
						?>
						<div class="col-md-12 loading">
							<!-- <p><a href="">加载更多</a></p> -->
						</div>
					</div>
					<!--疫情防控盒子结束-->
					<!--复工复学盒子开始-->
					<div class="row news_box tab-pane fade" id="news_fg">
						<!--php查询复工复学-->
						<?php
						    $query = mysqli_query($conn, "SELECT * FROM `news` WHERE `type` = '复工复学' ORDER BY `id` DESC");
						    $i = 1;
						    while($row = mysqli_fetch_assoc($query) and $i<30){
						        echo "<div class=\"col-md-4\">
										<div class=\"news_box_1\">
											<a href=\"news_show.php?id=$row[id]\"><img src=\"$row[img]\" class=\"img-responsive\" /></a>
											<p><a href=\"news_show.php?id=$row[id]\">$row[title]</a></p>
										</div>
									</div>";
								$i++;
						    }
						?>
						<div class="col-md-12 loading">
							<!-- <p><a href="">加载更多</a></p> -->
						</div>
					</div>
				</div>
				<!--新闻盒子1结束-->
			</div>
			
			<!-- 聊天机器人(?) ↓ ------------------------------------------------------------------------------------------------------------------------------->
				<!-- 聊天机器人(?) -->
				<div class="chat_xuanfu" id="chat_show">
					<div><img src="icons/xiaoY_new.png"></div>
				</div>
				<div class="panel panel-default" id="chat_box" style="display: none;">
					<div class="panel-heading" style="text-align: center;">
					        小Y
					</div>
				    <div class="panel-body">
				        <div class="chat_box1">
							<div class="chat_text">
								<ul class="chat_ul" id="chat_ul">
									<!-- 模板 -->
									<!-- <li class="chat_li1"><div>用户信息</div><img src="icons/untitled.png"></li>
									<li class="chat_li2"><img src="icons/untitled.png"><div>返回信息</div></li> -->
								</ul>
							</div>
						</div>
				        <div class="chat_box2">
							<span class="popover-show chatMsg" data-container="body" data-toggle="popover" data-placement="right"
							 data-content="消息不能为空"></span>
							<textarea class="form-control" name="chat_content" type="Text" id="chat_content"
							 placeholder="点击输入内容"></textarea>
							 <div class="chat_btn">						 
								<input class="chat_btn1 btn-success" id="chat_hide" type="button" value="关闭" />
								<input class="chat_btn2 btn-success" id="chat_faso" type="button" value="发送" />
							 </div>
						</div>
				    </div>
				</div>
				<!-- 添加脚本 -->
				<script>
					var chat_show = document.querySelector('#chat_show');
					var chat_box = document.querySelector('#chat_box');
					var chat_hide = document.querySelector('#chat_hide');
					var i = 0;	//保存用户点击小Y的次数
					chat_show.onclick = function(){
						if(i==0){
							initChat('<strong>您好！我是小Y，请问您要咨询点什么呢？回复选项前的的序列号即可咨询哦！</strong><br />1、本站导航指引；<br />2、新型冠状病毒肺炎概述；<br />3、传播途径；<br />4、常见症状；<br />5、预防方法；<br />6、易感染人群；<br />7、临床表现；<br />8、疑似病例；<br />	0、唤出本菜单(⊙.⊙)。<br /><br />');
						}
						++i;
						if(i % 2){
							chat_box.style.display = 'block';
						}else{	
							chat_box.style.display = 'none';
							$('.chatMsg').popover('hide');			
						}
					}
					chat_hide.onclick = function(){
						++i;
						chat_box.style.display = 'none';
						$('.chatMsg').popover('hide');	
					}					
					//初始回复
					function initChat(str) {
						var  myLi = document.createElement('li');
						myLi.innerHTML = str;
						myLi.style.backgroundColor = 'skyblue';
						document.querySelector('#chat_ul').appendChild(myLi);
					}
					//点击事件
					document.querySelector('#chat_faso').onclick = function() {
						//判断输入值是否为空
						var chat_content = document.querySelector('#chat_content');
						var value = chat_content.value;
						if(!value){
							$(function() {
								$('.chatMsg').popover('show');
							});
							return false;
						} else {
							$(function() {
								$('.chatMsg').popover('hide');
							});
						}
						//创建聊天框
						var myLi = document.createElement('li');
						//设置内容
						myLi.innerHTML = document.querySelector('#chat_content').value;
						myLi.style.backgroundColor = 'hotpink';
						//添加到页面上
						document.querySelector('#chat_ul').appendChild(myLi);
					
						//ajax
						//1、创建对象
						var xhr = new XMLHttpRequest();
						//2、设置请求行(get请求数据写在url后面)
						xhr.open('post', 'chat.php');
						//3、设置请求头(get请求可以省略， post不发生数据也可以省略)
						xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
						//3.5注册回调函数
						xhr.onload = function() {
							//获取数据
							console.log(xhr.responseText);
							//修改页面dom元素
							//创建
							var herLi = document.createElement('li');
							//设置
							herLi.innerHTML = xhr.responseText;
							herLi.style.backgroundColor = 'skyblue';
							//添加
							document.querySelector('#chat_ul').appendChild(herLi);
							document.querySelector('.chat_text').scrollTop = myLi.offsetTop;
							//清空输入框的内容
							document.querySelector('#chat_content').value = "";
						}
						//4、请求主体发送(post请求数据写在这里,如果没有数据，直接为空或者写null)
						//post请求发送数据，写在send中
						//key=value$key2=value2
						//正则表达式筛选常用语句
						if(value.match(/你好/)){
							value = '你好';
						} else if(value.match(/导航/)){
							value = '导航';
						}
						xhr.send('seach='+value);
						return true;
					}
				</script>
				
				
			<!-- 聊天机器人(?) ↑ ------------------------------------------------------------------------------------------------------------------------------->
						
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
								<li><a href="login.php">后台管理</a></li>
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


