<?php
include 'global.php';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>YiliYili疫站</title>
		<!--bootstrap引用开始-->
		<link href="framework/bootstrap3.3.7.min.css" rel="stylesheet" />
		<script src="framework/jquery.min.js"></script>
		<script src="framework/bootstrap.min.js"></script>
		<script src="framework/echarts.min.js?_v_=1578305236132"></script>
		<script src="framework/data-1495350605523-SJII63Rl-.js" type="text/javascript" charset="utf-8"></script>
		<script src="framework/china.js?_v_=1578305236132" ></script>
		<!--bootstrap引用结束-->
		<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
		<link rel="stylesheet" href="css/box.css" type="text/css">
		<link href="css/index.css" rel="stylesheet" media="all" />
		<link rel="stylesheet" type="text/css" href="css/indexnews.css"/>
		<link href="./css/tubiao.css" rel="stylesheet" media="all" />
		<script type="text/javascript" src="./framework/g2.min.js"></script>
	</head>
	<body>
		<!-- 页头包括导航栏 -->
		<div class="header" id="header_ya">
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
					<li><a href="index.html">网站首页</a></li>
					<li><a href="news.php">新闻资讯</a></li>
					<li><a href="health.php">健康资讯</a></li>
					<li><a href="about.php">关于我们</a></li>
				</ul>
			</div>
		</div>
		<!-- 首页内容开始 -->
		<div class="bodyer">
			<div class="container middle_box">
				<!--轮播开始-->
				<div class="lunbo">
					<div id="slidershow" class="carousel slide" data-ride="carousel">
						<!--轮播图片计数器-->
						<ol class="carousel-indicators">
							<li class="active" data-target="#slidershow" data-slide-to="0"></li>
							<li data-target="#slidershow" data-slide-to="1"></li>
							<li data-target="#slidershow" data-slide-to="2"></li>
						</ol>
						<!--设置轮播图片-->
						<div class="carousel-inner">
							<div class="item active">
								<a href="#">
									<img class="lunbo_img" src="img/lala1.png" alt="" />
								</a>
							</div>
							<div class="item">
								<a href="#">
									<img class="lunbo_img" src="img/lala2.png" alt="" />
								</a>
							</div>
							<div class="item">
								<a href="#">
									<img class="lunbo_img" src="img/lala3.jpg" alt="" />
								</a>
							</div>
							
						</div>
						<!--设置轮播图片控制器-->
						<a href="#slidershow" class="left carousel-control" role="button" data-slide="prev">
							<span class="glyphicon glyphicon=chevron-left"></span></a>
						<a href="#slidershow" class="right carousel-control" role="button" data-slide="next">
							<span class="glyphicon glyphicon=chevron-right"></span></a>
					</div>
				</div>
				<!--轮播结束-->

				<!--疫情数据开始-->
				<div>
					<!--图表开始-->
					<!--国内数据图表开始-->
					<!-- 概况数据 -->
					<div id="biao_box">
					<ul class="daohan_box nav nav-tabs">
						<li><a href="#guonei_biaobox" data-toggle="tab">国内疫情(含港澳台)</a></li>
						<li><a href="#jingwai_biaobox" data-toggle="tab">境外疫情数据</a></li>
					</ul>
					<div id="bigbiao_box" class="tab-content " >
						<div id="guonei_biaobox" class="tab-pane fade in active">
							<div>
								<p>累计确诊</p>
								<p>-</p>
								<p>-</p>
							</div>
							<div>
								<p>累计死亡</p>
								<p>-</p>
								<p>-</p>
							</div>	
							<div>
								<p>累计治愈</p>
								<p>-</p>
								<p>-</p>
							</div>
							<div>
								<p>现有确诊</p>
								<p>-</p>
								<p>-</p>
							</div>
							<div>
								<p>现有重症</p>
								<p>-</p>
								<p>-</p>
							</div>
							<div>
								<p>境外输入</p>
								<p>-</p>
								<p>-</p>
							</div>
						</div>
						<div id="jingwai_biaobox" class="tab-pane fade">
							<div>
								<p>累计确诊</p>
								<p>-</p>
								<p>-</p>
							</div>
							<div>
								<p>累计死亡</p>
								<p>-</p>
								<p>-</p>
							</div>	
							<div>
								<p>累计治愈</p>
								<p>-</p>
								<p>-</p>
							</div>
						</div>
						<p class="bigbiao_box_p">
							<span id="jiezhitime">-</span>
							<span id="s_lai">查看数据来源</span>
						</p>
					</div>
					</div>
					<!-- 数据来源 -->
					<div class="data_tip_pop" >
						<div class="data_tip_pop_text">
							<input type="button" name="" class="btn btn-success" value="关闭" />
						  <p>1. 数据来源：国家卫健委、各省市区卫健委、各省市区政府、港澳台官方渠道公开数据。</p>
						  <p>2. 数据更新时间：实时更新全国、各省市区数据，因核实计算需要，与官方的发布时间相比，将有一定时间延迟。</p>
						  <p>3. 实时数据统计原则：<br>① 每日上午优先将全国各类数据与国家卫健委公布数据对齐（此时各省市区数据尚未及时更新，会出现全国数据大于各省市区合计数的情况）；<br>② 数据实时更新过程中，各省市区卫健委陆续公布数据，如果各省市区公布数据总和大于之前国家公布数据，则全国数据切换为各省市区合计数（“疑似病例”仅使用国家卫健委每天公布的共有疑似病例总数，而不做新增累计）；<br>③ “较昨日+”的数据以国家卫健委每日公布的新增数据为基线，实时根据各省市区陆续公布的数据进行更新；<br>④ 由于各省市区数据发布时间和统计时间各不相同，因此在部分时段可能出现国家总数与各省市区总数不等的情况。</p>
						  <p>4. 疫情趋势图：全国数据使用国家卫健委公布的截至前一日24:00数据，每日更新一次。</p>
						  <p>5. 网易新闻全力以赴提供权威、准确、及时的疫情数据，如有任何疑问，欢迎通过网易新闻客户端留言反馈。</p>
						</div>
					</div>
					<!-- 逻辑js -->
					<script type="text/javascript">
						
						
						$("#s_lai").click(function(){
							 $(".data_tip_pop").css("display","flex").show();
						});
						$(".data_tip_pop_text input").click(function(){
							$(".data_tip_pop").hide();
						});
					</script>
					<!-- 滚动 -->
					<div  style="width: 90%;margin: 0 auto;">
						<p >
							<marquee width="90%" behavior="scroll" direction="right">
								<a href="http://2019ncov.nosugartech.com/">【工具查询】患者相同行程查询工具</a>
								<a href="http://t.cn/A6PIYNvD">【在线直播】武行24小时直播</a>
								<a href="http://t.cn/A6PIeT14">【在线直播】雷神山医院施工直播</a>
							</marquee>
							<span  class="qs ac-dataqs">小知识</span>
						</p>
					</div>
					
					<!-- //中国疫情 -->
					<div style="width: 90%;margin: 20px auto;" ><h2 style="font-weight: bold;text-shadow:1px 1px 2px #999;">国内疫情</h2></div>
					<div id="map_zg" >
						<ul class=" nav nav-tabs" style="width: 100%;height:7.2%;">
							<li><a id="map_a" href="#map_zg_xiancun" data-toggle="tab">现存确诊</a></li>
							<li><a href="#map_zg_ya" data-toggle="tab">累计确诊</a></li>
						</ul>
						<div style="width: 100%;height:92.8%;" class="tab-content " >
							<div id="map_zg_xiancun" class="tab-pane fade in active" ></div>
							<div id="map_zg_ya" class="tab-pane fade in active" ></div>
						</div>
					</div>
					<!-- 表头 -->
					<div id="guonei_biaoge">
						<div>
							<span>地区</span>
							<span>新增确诊</span>
							<span>确诊</span>
							<span>死亡</span>
							<span>治愈</span>
							<span>现存确诊</span>
						</div>
					</div>
					<!-- 内容 js写-->
					<ul id="guonei_biaoge_ul"></ul>
					
					<!-- 国内疫情趋势图 -->
					<div style="width: 90%;margin: 20px auto;" ><h2 style="font-weight: bold;text-shadow:1px 1px 2px #999;">国内趋势图</h2></div>
					<div class="chart_box">
						<div id="tab_a" class="tab-content ">
							<div class="tubiao tab-pane fade in active" id="chart_0"></div>
							<div class="tubiao tab-pane fade in active" id="chart_1"></div>
							<div class="tubiao tab-pane fade in active" id="chart_2"></div>
							<div class="tubiao tab-pane fade in active" id="chart_3"></div>
							<div class="tubiao tab-pane fade in active " id="chart_4"></div>
						</div>
						<div class="a_box">
							<a id="tubiao_span" href="#chart_0" class="tubiao_span btn" data-toggle="tab">国内累计趋势图</a>
							<a href="#chart_1" class="tubiao_span btn" data-toggle="tab">国内现存趋势图</a>
							<a href="#chart_2" class="tubiao_span btn" data-toggle="tab">治愈/死亡率趋势图</a>
							<a href="#chart_3" class="tubiao_span btn" data-toggle="tab">武汉累计趋势图</a>
							<a href="#chart_4" class="tubiao_span btn" data-toggle="tab">境外/每日新增趋势图</a>
						</div>
					</div>
					<!-- //广东 -->
					<div id="gd" style="width: 90%;border: #00A0E9;box-shadow: 1px 1px 5px  #777777;;margin: 20px auto;
					padding-bottom: 10px;background-color:#FFFCFB ;">
						<div id="guangdong" style="width: auto;height:400px;" ></div>
					</div>
					
					<!-- 武汉出入指数 -->
					<div id="wuhan" style="width: 90%;border: #00A0E9;box-shadow: 1px 1px 5px  #777777;;margin: 20px auto;
					padding-bottom: 10px;background-color:#FFFCFB ;">
						<div  id="wuhanzhi" style="width: auto;height:400px;"></div>
						<div>
							<p style="font-weight: bold;
							text-align: center;border-bottom: #101010 1px solid;margin: 10px 0px;">
								可以在图表中看出，在武汉封城之后，仍有人进入武汉，这些就是最美的逆行者————奋战在一线的医生。
							</p>
						</div>
					</div>
					<!--国外数据图表开始-->
					<!-- //海外疫情 -->
					
					<div style="width: 90%;margin: 20px auto;" ><h2 style="font-weight: bold;text-shadow:1px 1px 2px #999;">国外疫情</h2></div>
					<!-- 海外表头 -->
					<div id="map_word" >
						<ul class=" nav nav-tabs" style="width: 100%;height:7.2%;">
							<li><a id="map_a_2" href="#guowai_wroid" data-toggle="tab">累计确诊</a></li>
							<li><a href="#guowai_wroid_2" data-toggle="tab">现存确诊</a></li>
						</ul>
						<div style="width: 100%;height:92.8%;" class="tab-content " >
							<div id="guowai_wroid" class="tab-pane fade in active" ></div>
							<div id="guowai_wroid_2" class="tab-pane fade in active" ></div>
						</div>
					</div>
					<div id="guowai_biaoge">
						<div>
							<span>地区</span>
							<span>新增确诊</span>
							<span>确诊</span>
							<span>新增死亡</span>
							<span>累计死亡</span>
							<span>治愈</span>
						</div>
					</div>
					<!-- 内容 js写-->
					<ul id="guowai_biaoge_ul"></ul>
					<div id="guowai_biaoge_op" >
						<span><a href="#guowai_biaoge">点击关闭</a></span>
					</div>
					
					<div class="chart_box">
						<div id="tab_a2" class="tab-content ">
							<div class="tubiao tab-pane fade in active" id="gw_ya"></div>
							<div class="tubiao tab-pane fade in active" id="wai1"></div>
							<div class="tubiao tab-pane fade in active" id="wai2"></div>
						</div>
						<div class="a_box">
							<a id="tubiao_span2" href="#gw_ya" class="tubiao_span btn" data-toggle="tab">主要国家疫情</a>
							<a  href="#wai1" class="tubiao_span btn" data-toggle="tab">国外累计趋势图</a>
							<a href="#wai2" class="tubiao_span btn" data-toggle="tab">国外现存趋势图</a>
						</div>
					</div>
					
					
					<!--国外数据图表结束-->
					<div class="container chart_box">
					</div>
					<!--chart.js引用开始-->
					<!--图表结束-->
				</div>
				<!--疫情数据结束-->
				<!-- 医疗信息 -->
				<div id="prevent_q" style="width: 90%;margin: 20px auto;" ><h2 style="font-weight: bold;text-shadow:1px 1px 2px #999;">医疗救治医院查询</h2></div>
				<div id="prevent">
					<div class="title sectionTitle titleQg">
						<div class="healthIcon"></div>
					</div>
					<div class="foot">
						<div class="div-hospital">
						</div>
						<!-- 底部预防须知 -->
					</div>
				</div>
				<!-- 医疗信息 -->
				
				<!-- 小知识 -->
				<div class="pop_qs_f">
					<div class="fanghu_card">
						<div class="icon_close ac_qs_close"></div>
						<p class="p-fanghu">新型肺炎预防须知</p>
						<div class="fanghu_title_warp">
							<img class="fanghu_icon" src="https://puui.qpic.cn/vupload/0/1580113954413_67dj6qw9r34.png/0"></img>
							<div class="fanghu_title">个人清洁</div>
						</div>
						<div class="fanghu_item">
							<div class="fanghu_item_point"></div>
							<div class="fanghu_item_text">经常保持双手清洁，尤其在触摸口、鼻或眼之前。</div>
						</div>
						<div class="fanghu_item">
							<div class="fanghu_item_point"></div>
							<div class="fanghu_item_text">经用洗手液和清水清洗双手，搓手最少20秒，并用纸巾擦干。</div>
						</div>
						<div class="fanghu_item">
							<div class="fanghu_item_point"></div>
							<div class="fanghu_item_text">打喷嚏或咳嗽时应用纸巾掩盖口鼻，把用过的纸巾弃置于有盖垃圾箱内，然后彻底清洁双手。</div>
						</div>
						<div class="fanghu_title_warp">
							<img class="fanghu_icon" src="https://puui.qpic.cn/vupload/0/1580113954413_b3dr1w759hr.png/0"></img>
							<div class="fanghu_title">尽量避免</div>
						</div>
						<div class="fanghu_item">
							<div class="fanghu_item_point"></div>
							<div class="fanghu_item_text">减少前往人流密集的场所。如不可避免，应戴上外科口罩。</div>
						</div>
						<div class="fanghu_item">
							<div class="fanghu_item_point"></div>
							<div class="fanghu_item_text">避免到访医院。如有必要到访医院，应佩戴外科口罩及时刻注重个人和手部卫生。</div>
						</div>
						<div class="fanghu_item">
							<div class="fanghu_item_point"></div>
							<div class="fanghu_item_text">避免接触动物（包括野味）、禽鸟或其粪便；避免到海鲜、活禽市场或农场。</div>
						</div>
						<div class="fanghu_item">
							<div class="fanghu_item_point"></div>
							<div class="fanghu_item_text">切勿进食野味及切勿光顾有提供野味的餐馆。</div>
						</div>
						<div class="fanghu_item">
							<div class="fanghu_item_point"></div>
							<div class="fanghu_item_text">注意食物安全和卫生，避免进食或饮用生或未熟透的动物产品，包括奶类、蛋类和肉类。</div>
						</div>
						<div class="fanghu_title_warp">
							<img class="fanghu_icon" src="https://puui.qpic.cn/vupload/0/1580113954413_qs8jz3v8m7.png/0"></img>
							<div class="fanghu_title">尽快就诊</div>
						</div>
						<div class="fanghu_item">
							<div class="fanghu_item_point"></div>
							<div class="fanghu_item_text">如有身体不适，特别是有发烧或咳嗽，应戴上外科口罩并尽快就诊。</div>
						</div>
					</div>
					<div class="pop_qs">
						<div class="icon_close ac_qs_close"></div>
						<div class="h1">小知识</div>
						<p class="h2">1. 传染源: 野生动物，可能为中华菊头蝠。</p>
						<p class="h2">2. 病毒: 新型冠状病毒 2019-nCoV</p>
						<p class="h2">3. 传播途径: 经呼吸道飞沫传播，亦可通过接触传播</p>
						<p class="h2">4. 易感人群: 人群普遍易感。老年人及有基础疾病者感染后病情较重，儿童及婴幼儿也有发病</p>
						<p class="h2">5. 潜伏期: 一般为 3~7 天，最长不超过 14 天，潜伏期内存在传染性</p>
					</div>
				</div>
			</div>
			<!-- 聊天机器人(?) ↓ ------------------------------------------------------------------------------------------------------------------------------->
				<!-- 聊天机器人(?) -->
				<div class="chat_xuanfu" id="chat_show">
					<div><img src="icons/xiaoY_new_left.png"></div>
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
		<!-- 首页内容结束 -->

		<!-- 页脚 -->
		<div class="box=3" style="width: 100%;margin-top: 20px;">
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
		<!-- 浮动导航 -->
		<div id="xuanfu">
			<ul>
				<li><a href="#header_ya">返回顶部</a></li>
				<li><a href="#news_box">今日新闻</a></li>
				<li><a href="#biao_box">国内疫情</a></li>
				<li><a href="#map_word">世界疫情</a></li>
				<li><a href="#prevent_q">医院查询</a></li>
				<li id="yufan"><a >预防须知</a></li>
			</ul>
		</div>
		<script type="text/javascript">
			$(".qs").click(function(){
				$(".pop_qs").css("display","block");
				$(".pop_qs_f").css("display","block");
			});
			$(".pop_qs .icon_close").click(function(){
				$(".pop_qs").css("display","none");
				$(".pop_qs_f").css("display","none");
			});
			$("#yufan").click(function(){
				$(".fanghu_card").css("display","block");
				$(".pop_qs_f").css("display","block");
			});
			$(".fanghu_card .icon_close").click(function(){
				$(".fanghu_card").css("display","none");
				$(".pop_qs_f").css("display","none");
			});
		</script>
		<script type="text/javascript" src="js/guowaitubiao.js"></script>
			<script type="text/javascript" src="js/map_zg.js"></script>
			<script src="js/whuhanlixing.js" type="text/javascript" charset="utf-8"></script>
			<script src="js/guonei_biaoge_data.js" type="text/javascript" charset="utf-8"></script>
			<script type="text/javascript" src="js/chart.js" charset="utf-8"></script>
			<script src="./js/shujubiao.js" charset="utf-8"></script>
	</body>
</html>
