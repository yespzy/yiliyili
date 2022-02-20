<?php
	$tishi = "";
include 'global.php';
if(!empty($_POST['liu_tj'])){

	// 取值
	$name = _ESC($_POST['liu_name']);
	$sex = _ESC($_POST['liu_sex']);
	$age = _ESC($_POST['liu_age']);
	$phone = _ESC($_POST['liu_phone']);
	$email = _ESC($_POST['liu_email']);
	$text = _ESC($_POST['liu_text']);
	$type = trim(_ESC($_POST['liu_type']),"");
	date_default_timezone_set('PRC');
	$date = date("Y/m/d a-h:i");//时间 年月日 上下午 小时（12制）分钟
	
	if(empty($name)){
		$tishi = "必须有姓名";
	}else if(empty($sex)){
		$tishi = "必须有性别";
	}else if(empty($age)){
		$tishi = "必须有年龄";
	}else if(!preg_match("/^[0-9]+$/",$age)){
		$tishi = "必须为数字";
	}else if(empty($phone)){
		$tishi = "必须有电话";
	}else if(empty($email)){
		$tishi = "必须有邮箱";
	}else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
		$tishi = "非法邮箱";
	}else if(empty($text)){
		$tishi = "必须有文本";
	}else if(empty($type)){
		$tishi = "必须有类型";
	}else{
		// echo "<script>alert('标题：$name \\n时间：$sex \\n作者：$age \\n图片路径：$phone \\n类型：$email\\n$text\\n$type\\n$date');</script>";
		$query = mysqli_query($conn, "INSERT INTO `yiliyili`.`liuyan` 
							(`id`, `name`, `sex`, `age`, `phone`, `email`, `text`, `type`, `date`) 
							VALUES (NULL, '$name', '$sex', '$age', '$phone', '$email', '$text', '$type', '$date')");
		if(mysqli_insert_id($conn)){
			$tishi = "留言成功";
		}else{
			$tishi = "留言失败";
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>健康资讯</title>
		<link href="framework/bootstrap3.3.7.min.css" rel="stylesheet" />
		<script src="framework/jquery.min.js"></script>
		<script src="framework/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
		<link rel="stylesheet" href="css/box.css" type="text/css">
		<link rel="stylesheet" href="css/health.css">
		
	</head>	
	<body>
		<!-- 页头包括导航栏 -->
		<div id="header" class="header">
			<!-- logo于名称 -->
			<div class="logo">
				<a href="index.php">
					<img src="./img/yiliyiliyi.png">
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
					<span class="popover-show chatMsg" data-container="body" data-toggle="popover" data-placement="left"
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
			var i = 0;	
			//保存用户点击小Y的次数
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
			//回车事件绑定
			// $('#chat_content').bind('keyup', function(event) {
			// 	if (event.keyCode == "13") {
			// 		//回车执行查询
					
			// 		$('#chat_faso').onclick();
			// 	}
			// });
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
		
		<!-- 内容 -->
		<div class="bodyer">
			<div class="daohan">
				<ul>
					<li><a id="jiankan_a_0" data-toggle="tab" href="#jiankan_box_0">疫情防范小知识</a></li>
					<li><a id="jiankan_a_1" data-toggle="tab" href="#jiankan_box_1">健康科普</a></li>
					<li><a id="jiankan_a_2" data-toggle="tab" href="#jiankan_box_2">友情链接</a></li>
					<li><a id="jiankan_a_3" data-toggle="tab" href="#jiankan_box_3">留言墙</a></li>
				</ul>
			</div>
			<!-- 三个内容 -->
			<div class="tab-content jainkan_box">
				<!-- 疫情防范小知识 -->
				<div id="jiankan_box_0" class="tab-pane fade  in active">
					<div class="xiaoshizhi" style="width: 100%;">
						<h1 style="text-align: center;">疫情期间的防疫小知识</h1>
						<p style="font-size: 0.75rem;color: #AAAAAA;text-align: center;">转载自知乎——‘极缔咨询’</p>
						<img src="img/fan1.jpg" alt="防疫无小事-从我做起" style="display: block;margin:0 auto;">
						<img src="img/fan2.jpg" alt="防疫无小事-从我做起" style="display: block;margin:0 auto;">
						<img src="img/fan3.jpg" alt="防疫无小事-从我做起" style="display: block;margin:0 auto;">
						<img src="img/fan4.jpg" alt="防疫无小事-从我做起" style="display: block;margin:0 auto;">
						<img src="img/fan5.jpg" alt="防疫无小事-从我做起" style="display: block;margin:0 auto;">
						<img src="img/fan6.jpg" alt="防疫无小事-从我做起" style="display: block;margin:0 auto;">
						<img src="img/fan7.jpg" alt="防疫无小事-从我做起" style="display: block;margin:0 auto;">
						<img src="img/fan8.jpg" alt="防疫无小事-从我做起" style="display: block;margin:0 auto;">
					</div>
				</div>
				<!-- 健康科普 -->
				<div id="jiankan_box_1" class="tab-pane fade">
					<div style="width: 100%;">
						<div class="md-3">
							<div class="row">
								<div class="row-img col-md-4">
									<img class="img-responsive img-thumbnail" src="img/w.png" >
								</div>
								<div class="col-md-7 row-right">
									<h3>
										<a >蚊子叮咬怎样治疗？</a>
									</h3>
									<p>如果叮咬处很痒，可先用手指弹一弹，再涂上花露水、风油精等。被叮咬后不能抓。被蚊子叮到，我们会马上去抓。可是抓挠后，皮肤里的组织液、淋巴液等渗出，肿成一个包，就会越抓越痒，而且还不易消退，长满红包的“赤豆腿”就是这样被抓出来的。如果坚持不抓，一般10至15分钟后，痒感就能明显消退了。 </p>
								</div>
							</div>
						</div>
						<div class="md-3">
							<div class="row">
								<div class="row-img col-md-4">
									<img class="img-responsive img-thumbnail" src="img/w1.png" >
								</div>
								<div class="col-md-7 row-right">
									<h3>
										<a >身上的红点是什么？是血管瘤吗？为什么会长这个？该怎么处理？</a>
									</h3>
									<p>用冷冻，电解，电灼，激光等方法都可以去除。只要是破坏了增生的血管组织就可以了，好了以后有可能会有一个白色的小瘢痕。当然一些皮肤愈合能力好的人，可能和正常人一样，看不出任何瘢痕。</p>
								</div>
							</div>
						</div>
						<div class="md-3">
							<div class="row">
								<div class="row-img col-md-4">
									<img class="img-responsive img-thumbnail" src="img/w2.png" >
								</div>
								<div class="col-md-7 row-right">
									<h3>
										<a >现阶段，要不要去打疫苗？</a>
									</h3>
									<p>我们的建议是：打！当然去打！放心去打！ 一方面，根据规范，目前的疫苗接种门诊必须远离发热、肝炎、肠道门诊等地，也都做好了日常的消毒，避免人员聚集，属于医院里安全系数较高的地方。 另一方面，当下情况的持续时间很难预计，不可能一直推迟接种疫苗。我们永远不知道疫苗产生的抗体和孩子感染的病毒细菌哪个会先来。因此，早接种，早保护。</p>
								</div>
							</div>
						</div>
						<div class="md-3">
							<div class="row">
								<div class="row-img col-md-4">
									<img class="img-responsive img-thumbnail" src="img/w3.png" >
								</div>
								<div class="col-md-7 row-right">
									<h3>
										<a >酒精、紫外线灯没用对，当心消毒变“投毒”</a>
									</h3>
									<p>随着“新型冠状病毒怕酒精不耐高温”的词眼登上热搜，以及各路防疫专家推荐居家消毒使用消毒液，一时间大家纷纷抢购酒精、紫外线灯、84消毒液，号称“三大消毒神器”。防疫指引推荐居家消毒，选择含乙醇75%浓度的酒精，直接可以擦拭皮肤，90%浓度的酒精须经稀释后使用。乙醇的易燃性极高，属于甲类火灾危险品，空气中浓度超过3%即可引起火灾。</p>
								</div>
							</div>
						</div>
						<div class="md-3">
							<div class="row">
								<div class="row-img col-md-4">
									<img class="img-responsive img-thumbnail" src="img/w4.png" >
								</div>
								<div class="col-md-7 row-right">
									<h3>
										<a >牙龈肿痛，应该怎么处理？</a>
									</h3>
									<p>当发生牙龈肿痛时，可以口服止痛药（如布洛芬）缓解疼痛症状。怀孕、哺乳及止痛药过敏等情况可含一些冰凉的水，或用冰块在面部冷敷，以缓解疼痛。 在方便的时候，尽早选择正规的医院或口腔诊所就诊。 医生会通过检查来确定是牙龈炎还是牙周炎，并采取相应的措施，比如拍片、冲洗、刮治甚至是手术切开等。 在医生诊断后，你需要配合进行相关的药物治疗。一般会建议口服头孢、甲硝唑等抗菌药，配合漱口水同时使用。</p>
								</div>
							</div>
						</div>
						<div class="md-3">
							<div class="row">
								<div class="row-img col-md-4">
									<img class="img-responsive img-thumbnail" src="img/w6.png" >
								</div>
								<div class="col-md-7 row-right">
									<h3>
										<a >灭菌和非灭菌口罩区别 非灭菌口罩能直接戴吗？</a>
									</h3>
									<p>灭菌口罩是指口罩在出厂前经过了7天左右的消毒杀菌处理，这样的口罩安全性和卫生性都更高一些，一般为医用口罩，而非灭菌口罩则没有经过这个消毒处理，在口罩上面可能残存有其他细菌的存在，但是这种细菌一般不致病，通常做防尘、防雾霾口罩使用。非灭菌口罩能直接戴，非灭菌口罩在生产过程中也是有严格的标准的，只不过和灭菌口罩相比，没有那么长时间的消毒处理，在口罩上面可能会残存一些细菌，但是这些细菌是不致病的，普通人可以正常使用。</p>
								</div>
							</div>
						</div>
						<div class="md-3">
							<div class="row">
								<div class="row-img col-md-4">
									<img class="img-responsive img-thumbnail" src="img/w5.png" >
								</div>
								<div class="col-md-7 row-right">
									<h3>
										<a >鼻子出血了，要马上仰头止血？</a>
									</h3>
									<p>鼻子出血时不要低头，正确的止血姿势是低头而非仰头，虽然低头看不到血流出来，但实际上鼻血会顺着咽部流进消化道，出血一点都不会减少，反而容易引起恶心、呕吐。</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- 友情链接 -->
				<div id="jiankan_box_2" class="tab-pane fade">
					<div style="width: 100%;">
						<div class="yuoqin_nav">
							<a href="https://www.msdmanuals.cn/" target="view_window">
								<img class="img-responsive img-thumbnail" src="img/a9cb25b1ceb3931bd84d8bba7bf4310.png" alt="默沙东诊疗手册">
							</a>
							<h3><a href="https://www.msdmanuals.cn/" target="view_window">默沙东诊疗手册</a></h3>
							<p>美国新泽西州凯尼尔沃思 Merck and Co., Inc.（美加以外地区称为默沙东）是努力改善全球福祉的健康护理引领者。从开发治疗和预防疾病的新疗法，到满足人们需求，我们致力于改善全世界人们的健康和福祉。 本手册于 1899 年作为一项社区服务首次出版。 此宝贵资源将继续传承下去，在美加拿大地区被称作《默克诊疗手册》，在世界其余地区被称作《默沙东诊疗手册》。详细了解我们对全球医学知识 2020 的承诺。</p>
						</div>
						<div class="yuoqin_nav">
							<a href="http://www.39.net/" target="view_window">
								<img class="img-responsive img-thumbnail" src="img/微信图片_20200405171327.png" alt="39健康网">
							</a>
							<h3><a href="http://www.39.net/" target="view_window">39健康网</a></h3>
							<p>39健康网，专业的健康资讯门户网站，中国优质医疗保健信息与在线健康服务平台，医疗保健类网站杰出代表，荣获中国标杆品牌称号。提供专业、完善的健康信息服务，包括疾病，保健，健康新闻，专家咨询，病友论坛，男科，妇科，育儿，性爱，心理，整形，减肥，药品，急救，中医，美容，饮食，健身，医院查询，医生查...</p>
						</div>
						<div class="yuoqin_nav">
							<a href="https://www.120ask.com/" target="view_window">
								<img class="img-responsive img-thumbnail" src="img/微信图片_20200405171333.png" alt="有问必答网">
							</a>
							<h3><a href="https://www.120ask.com/" target="view_window">有问必答网</a></h3>
							<p>快速问医生旗下有问必答网是优秀的医生在线健康问答咨询平台。来自全国数万名医生为您免费解答任何健康问题，可以通过电话、文字等多种方式与医生进行一对一咨询!</p>
						</div>
						<div class="yuoqin_nav">
							<a href="https://www.leha.com/" target="view_window">
								<img class="img-responsive img-thumbnail" src="img/微信图片_20200405172334.png" alt="乐哈健康网">
							</a>
							<h3><a href="https://www.leha.com/" target="view_window">乐哈健康网</a></h3>
							<p>乐哈网是一家传播健康生活理念的分享交流平台,这里聚集了一批健康养生爱好者。在这里，你不但可以了解到实用的健康生活信息，还可以与大家分享你的健康养生秘诀。</p>
						</div>
						<div class="yuoqin_nav">
							<a href="https://www.cndzys.com/" target="view_window">
								<img class="img-responsive img-thumbnail" src="img/微信图片_20200405172337.png" alt="大众养生网">
							</a>
							<h3><a href="https://www.cndzys.com/" target="view_window">大众养生网</a></h3>
							<p>中国养生第一门户：大众养生网秉承传播科学养生方法和理念将养生贯穿于日常生活，真正做到让养生大众化，全民化</p>
						</div>
						<div class="yuoqin_nav">
							<a href="https://beijing.haodf.com/" target="view_window">
								<img class="img-responsive img-thumbnail" src="img/微信图片_20200405172339.png" alt="好大夫在线">
							</a>
							<h3><a href="https://beijing.haodf.com/" target="view_window">好大夫在线</a></h3>
							<p>好大夫在线，值得信赖的医疗平台，汇集全国17万+优质医疗权威专家，为患者提供网上看病、挂专家号，在线开药，线上买药，线上复诊，网络预约手术等全方位服务；患者通过好大夫在线获得全国优质医疗专家的权威诊治，小病大病网上就诊，让行医简单，看病不难。</p>
						</div>
						<div class="yuoqin_nav">
							<a href="http://drugs.dxy.cn/" target="view_window">
								<img class="img-responsive img-thumbnail" src="img/微信图片_20200405172343.png" alt="丁香园">
							</a>
							<h3><a href="http://drugs.dxy.cn/" target="view_window">丁香园</a></h3>
							<p>丁香园用药助手收录来自生产厂家的新药品说明书,可通过商品名、通用名、疾病名称、形状等迅速找到药品说明书内容。</p>
						</div>
						<div class="yuoqin_nav">
							<a href="https://www.jianke.com/" target="view_window">
								<img class="img-responsive img-thumbnail" src="img/微信图片_20200405172346.png" alt="健客网">
							</a>
							<h3><a href="https://www.jianke.com/" target="view_window">健客网</a></h3>
							<p>健客网成立于2006年，总部位于广东省，09年获得国家食品药品监督管理局颁发的《互联网药品交易服务资格证书》，成为广东省第一家(B2C)互联网药品经营企业</p>
						</div>
					</div>
				</div>
				<!-- 健康留言 -->
				<div id="jiankan_box_3" class="tab-pane fade">
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
						<div id="liuyan_qiang"></div>
						<!-- ajax动态获取数据库数据 -->
						<script type="text/javascript">
							// 太难了
							function Dianji_a(text){
									//1、创建对象
									var xhr = new XMLHttpRequest();
									//2、设置请求行(get请求数据写在url后面)
									xhr.open('post', 'wenti_fa.php');
									//3、设置请求头(get请求可以省略， post不发生数据也可以省略)
									xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
									//3.5注册回调函数
									xhr.onload = function() {
										//获取数据
										console.log(xhr.responseText);
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
					</div>
					<!-- 留言 -->
					<div id="liuyan_box" class="liuyan_box">
						<form action="health.php" method="post" onsubmit="return Dianji()">
							<fieldset>
								<legend>我要留言！！！</legend>
								<p>姓名：<input type="text" name="liu_name" placeholder="请输入你的姓名" onblur="Name()"><small></small></p>
								<p>性别：<input type="radio" name="liu_sex" value="男">男
									<input type="radio" name="liu_sex" value="女">女<small></small></p>
								<p>年龄：<input type="text" name="liu_age" placeholder="输入您的年龄" onblur="Age()"><small></small></p>
								<p>电话：<input type="text" name="liu_phone" placeholder="输入您的电话" onblur="Phone()"><small></small></p>
								<p>邮箱：<input type="text" name="liu_email" placeholder="输入您的邮箱" onblur="Email()"><small></small></p>
								<p>输入问题：</p>
								<p><textarea rows="10" name="liu_text" placeholder = "输入您的问题"></textarea></p>
								<p>问题类型<input type="text" name="liu_type" value="" onblur="Type()"><small></small></p>
								<p><input type="submit" name="liu_tj" value="留言" >
								<input type="reset" name="liu_cx" value="重置" /><small><?php echo "$tishi" ?></small></p>
							</fieldset>
						</form>
						<!-- 表单验证脚本 -->
						<script type="text/javascript"> 
						var reg = /^[0-9]+$/;
						var myr = /^(((13[0-9]{1})|(15[0-9]{1})|(1[0-9][0-9]{1}))+\d{8})$/;
						var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
						var regz=/^[\u0391-\uFFE5]+$/;
						function Name(){
							if($("input[name='liu_name']").val().length>20){
								$("form fieldset p:nth-child(2) small")
								.text(" *你的名字太长了")
								return false
							}else if($("input[name='liu_name']").val().length==0){
								$("form fieldset p:nth-child(2) small")
								.text(" *你的名字不能为空")
								return false
							}else{
								$("form fieldset p:nth-child(2) small")
								.text("")
								return true
							}
						}	
						function Sex(){
						  var obj2=$("input[name='liu_sex']");
							for(var i=0;i<obj2.length;i++){
								 if(obj2[i].checked==true){
									 temp=1;
									 break;
								 }else{
									 temp=0;
								}
							}
							if(temp==0){
								$("form fieldset p:nth-child(3) small")
								.text(" *选择性别")
								return false
							}else{
								$("form fieldset p:nth-child(3) small")
								.text("")
								return true
							}
						}
						function Age(){
							
							if($("input[name='liu_age']").val().length>3){
									$("form fieldset p:nth-child(4) small")
									.text(" *你的年龄太大了或输入不正确")
									return false
							}else if($("input[name='liu_age']").val()!=""&&!reg.test($("input[name='liu_age']").val())){
								$("form fieldset p:nth-child(4) small")
								.text(" *年龄只能是数字")
								return false
							}else if($("input[name='liu_age']").val().length==0){
								$("form fieldset p:nth-child(4) small ")
								.text(" *年龄不能为空")
								return false
							}else{
								$("form fieldset p:nth-child(4) small")
								.text("")
								return true
							}
						}
						function Phone(){
							if($("input[name='liu_phone']").val().length!=11){
									$("form fieldset p:nth-child(5) small")
									.text(" *输入11位手机号码")
									return false
							}else if($("input[name='liu_phone']").val()!=""&&!myr.test($("input[name='liu_phone']").val())){
								$("form fieldset p:nth-child(5) small")
								.text(" *手机号码格式不对")
								return false
							}else if($("input[name='liu_phone']").val().length==0){
								$("form fieldset p:nth-child(5) small")
								.text(" *手机号码不能为空")
								return false
							}else{
								$("form fieldset p:nth-child(5) small")
								.text("")
								return true
							}
						}
						function Email(){
							if(!myreg.test($("input[name='liu_email']").val())){
									$("form fieldset p:nth-child(6) small")
									.text(" *请输入有效邮箱")
									return false
							}else if($("input[name='liu_email']").val().length==0){
								$("form fieldset p:nth-child(6) small")
								.text(" *邮箱不能为空")
								return false
							}else{
								$("form fieldset p:nth-child(6) small")
								.text("")
								return true
							}
						}
						function Type(){
							if($("input[name='liu_type']").val().length==0){
								$("form fieldset p:nth-child(9) small")
								.text(" *类型不能为空")
								return false
							}else if(!regz.test($("input[name='liu_type']").val())){
								$("form fieldset p:nth-child(9) small")
								.text(" *类型必须为中文")
								return false
							}else{
								$("form fieldset p:nth-child(9) small")
								.text("")
								return true
							}
							
						}
							function Dianji(){
								if(!Name()){
									$("form fieldset p:nth-child(10) small")
									.text(" *请正确输入姓名");
									return false
								}else if(!Sex()){
									$("form fieldset p:nth-child(10) small")
									.text(" *选择性别")
									return false
								}else if(!Age()){
									$("form fieldset p:nth-child(10) small")
									.text(" *请正确输入年龄")
									return false
								}else if(!Phone()){
									$("form fieldset p:nth-child(10) small")
									.text(" *请正确输入手机号码")
									return false
								}
								else if(!Email()){
									$("form fieldset p:nth-child(10) small")
									.text(" *请正确输入邮箱")
									return false
								}else if($("textarea[name='liu_text']").val().length==0){
									$("form fieldset p:nth-child(10) small")
									.text(" *请输入问题")
									return false
								}else if(!Type()){
									$("form fieldset p:nth-child(10) small")
									.text(" *请正确输入类型")
									return false
								}else{
									$("form fieldset p:nth-child(10) small")
									.text("")
									return true;
								}
							}
						</script>
					</div>
					<div id="xuanfu">
						<ul>
							<li><a href="#header">顶部</a></li>
							<li><a href="#liuyan_box">留言</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- 添加脚本 -->
		<script type="text/javascript">
			$("#jiankan_a_0").on('click',function(){
				$(this).css({"background-color":"#4bcffa","color":"white","width":"117%"});
				$("#jiankan_a_1").css({"background-color":"","color":"","width":""});
				$("#jiankan_a_2").css({"background-color":"","color":"","width":""});
				$("#jiankan_a_3").css({"background-color":"","color":"","width":""});
				});		
			$("#jiankan_a_1").on('click',function(){
				$(this).css({"background-color":"#4bcffa","color":"white","width":"117%"});
				$("#jiankan_a_0").css({"background-color":"","color":"","width":""});
				$("#jiankan_a_2").css({"background-color":"","color":"","width":""});
				$("#jiankan_a_3").css({"background-color":"","color":"","width":""});
				});				
			$("#jiankan_a_2").on('click',function(){
				$(this).css({"background-color":"#4bcffa","color":"white","width":"117%"});
				$("#jiankan_a_0").css({"background-color":"","color":"","width":""});
				$("#jiankan_a_1").css({"background-color":"","color":"","width":""});
				$("#jiankan_a_3").css({"background-color":"","color":"","width":""});
				});
			$("#jiankan_a_3").on('click',function(){
				$(this).css({"background-color":"#4bcffa","color":"white","width":"117%"});
				$("#jiankan_a_0").css({"background-color":"","color":"","width":""});
				$("#jiankan_a_1").css({"background-color":"","color":"","width":""});
				$("#jiankan_a_2").css({"background-color":"","color":"","width":""});
				});
			
			$("#jiankan_a_0").click();//开始就点击
		</script>
		
		
	<!-- 页脚 -->
	<div class="box=3" style="width: 100%;margin-top: 10px;">
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
							<li><a href="yisheng_login.php">后台管理</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-xs-3 footer-grid">
						<h3>Contact Info</h3>
						<ul>
							<li><img src="images/phone.png"> +199 2453 8970</li>
							<li><img src="images/pho.png"> +987 6542 3210</li>
							<li class="li-thrd"><img src="images/address.png"> 广东石油化工学院</li>
							<li><img src="images/email.png"> <a>2093897006@qq.com</a></li>
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
		
	</body>
</html>
