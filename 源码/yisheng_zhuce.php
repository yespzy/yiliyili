<?php
include 'global.php';
if(!empty($_POST['liu_tj'])){
	// 取值
	$zh = _ESC($_POST['liu_zh']);
	$miam = _ESC($_POST['liu_mima']);
	$name = _ESC($_POST['liu_name']);
	$sex = _ESC($_POST['liu_sex']);
	$age = _ESC($_POST['liu_age']);
	$phone = _ESC($_POST['liu_phone']);
	$email = _ESC($_POST['liu_email']);
	
	if(empty($name)){
		$tishi = "必须有姓名";
	}else if(empty($zh)){
		$tishi = "必须有账号";
	}else if(empty($miam)){
		$tishi = "必须有密码";
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
	}else{
		$query = mysqli_query($conn, "INSERT INTO `yiliyili`.`yisheng` 
							(`id`, `zhanghao`,`password`,`name`, `sex`, `age`, `phone`, `email`) 
							VALUES (NULL, '$zh','$miam','$name', '$sex', '$age', '$phone', '$email')");
		if(mysqli_insert_id($conn)){
			echo "<script>alert('注册成功');location.href='yisheng_login.php';</script>";
		}else{
			echo "<script>alert('注册失败');location.href='yisheng_zhuce.php';</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>医生注册</title>
	<link href="framework/bootstrap3.3.7.min.css" rel="stylesheet"/>
	<link href="css/login_css.css" rel="stylesheet" media="all"/>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
	<link rel="stylesheet" href="css/box.css" type="text/css">
	<!--bootstrap引用开始-->
	<script src="framework/jquery.min.js"></script>
	<script src="framework/bootstrap.min.js"></script>
<!--bootstrap引用结束-->
</head>

<body style="background-color: #e9f6ff;">


<!--页头开始-->
<div class="">
   	<!-- logo于名称 -->
   	<div class="logo">
   		<a href="index.php">
   			<img src="./img/yiliyiliyi.png" class="">
   		</a>
   	</div>
</div>
<!--页头结束-->

<!--light开始-->
<div class="container">
    <div class="light">
    	<div class="box1"></div>
    	<div class="box2"></div>
    	<div class="box3"></div>
    	<div class="box4"></div>
    	<div class="box5"></div>
    	<div class="box6"></div>
    	<div class="box7"></div>
    </div>
</div>
<!--light结束-->

<!--页体开始-->
<div class="container">
	<style>
		
		.bodyer	form {
			width: 80%;
			margin: 0 auto;
		}
		.bodyer	form p{
			text-align: left;
			display: grid;
			grid-template-columns: 1fr 4fr 2fr;
		}.bodyer form p small{
			color: red;
		}
	.bodyer	form  input{
			margin-left: 40px;
		}
	</style>
    <div class="bodyer">
        <div style="width: 60%; margin: 20px auto;box-shadow: 1px 1px 5px  #777777; " >
            <form class="form-horizontal" role="form" action="#" onsubmit="return Dianji()" method="post">
				<fieldset >
					<legend align="center">医生注册</legend>
					<p>账号：<input type="text" name="liu_zh" placeholder="请输入账号" onblur="Zh()"><small></small></p>
					<p>密码：<input type="password" name="liu_mima" placeholder="请输入密码" onblur="Mima()"><small></small></p>
					<p>确认密码：<input type="password" name="liu_zm" placeholder="确认密码" onblur="Zm()"><small></small></p>
					<p>姓名：<input type="text" name="liu_name" placeholder="请输入你的姓名" onblur="Name()"><small></small></p>
					<p>性别：<span><input type="radio" name="liu_sex" value="男">男
						<input type="radio" name="liu_sex" value="女">女</span><small></small></p>
					<p>年龄：<input type="text" name="liu_age" placeholder="输入您的年龄" onblur="Age()"><small></small></p>
					<p>电话：<input type="text" name="liu_phone" placeholder="输入您的电话" onblur="Phone()"><small></small></p>
					<p>邮箱：<input type="text" name="liu_email" placeholder="输入您的邮箱" onblur="Email()"><small></small></p>
					<p><span></span><input type="submit" class=" btn btn-default" name="liu_tj" value="注册" ><span></span></p>
				</fieldset>
            </form>
        </div>
    </div>
</div>
			<!-- 表单验证脚本 -->
			<script type="text/javascript"> 
			var reg = /^[0-9]+$/;
			var myr = /^(((13[0-9]{1})|(15[0-9]{1})|(1[0-9][0-9]{1}))+\d{8})$/;
			var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
			var regz=/^[\u0391-\uFFE5]+$/;
			
			function Zh(){
				if($("input[name='liu_zh']").val()!=""&&!reg.test($("input[name='liu_zh']").val())){
					$("form fieldset p:nth-child(2) small")
					.text(" *账号只能是数字")
					return false
				}else if($("input[name='liu_zh']").val().length>25){
					$("form fieldset p:nth-child(2) small")
					.text(" *账号不能超过25位")
					return false
				}else if($("input[name='liu_zh']").val().length<6){
					$("form fieldset p:nth-child(2) small")
					.text(" *账号不能小于6位或为空")
					return false
				}else{
					$("form fieldset p:nth-child(2) small")
					.text("")
					return true
				}
			}
			
			function Mima(){
				if($("input[name='liu_mima']").val()!=""&&regz.test($("input[name='liu_mima']").val())){
					$("form fieldset p:nth-child(3) small")
					.text(" *密码不只能是中文")
					return false
				}else if($("input[name='liu_mima']").val().length>25){
					$("form fieldset p:nth-child(3) small")
					.text(" *密码不能超过25位")
					return false
				}else if($("input[name='liu_mima']").val().length<6){
					$("form fieldset p:nth-child(3) small")
					.text(" *密码不能小于6位或为空")
					return false
				}else{
					$("form fieldset p:nth-child(3) small")
					.text("")
					return true
				}
			}
			function Zm(){
				if($("input[name='liu_mima']").val() != $("input[name='liu_zm']").val()){
					$("form fieldset p:nth-child(4) small")
					.text(" *两次密码不一样")
					return false
				}else{
					$("form fieldset p:nth-child(4) small")
					.text("")
					return true
				}
			}
			
			function Name(){
				if($("input[name='liu_name']").val().length>20){
					$("form fieldset p:nth-child(5) small")
					.text(" *你的名字太长了")
					return false
				}else if($("input[name='liu_name']").val().length==0){
					$("form fieldset p:nth-child(5) small")
					.text(" *你的名字不能为空")
					return false
				}else{
					$("form fieldset p:nth-child(5) small")
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
					$("form fieldset p:nth-child(6) small")
					.text(" *选择性别")
					return false
				}else{
					$("form fieldset p:nth-child(6) small")
					.text("")
					return true
				}
			}
			function Age(){
				
				if($("input[name='liu_age']").val().length>3){
						$("form fieldset p:nth-child(7) small")
						.text(" *你的年龄太大了")
						return false
				}else if($("input[name='liu_age']").val()!=""&&!reg.test($("input[name='liu_age']").val())){
					$("form fieldset p:nth-child(7) small")
					.text(" *年龄只能是数字")
					return false
				}else if($("input[name='liu_age']").val().length==0){
					$("form fieldset p:nth-child(7) small ")
					.text(" *年龄不能为空")
					return false
				}else{
					$("form fieldset p:nth-child(7) small")
					.text("")
					return true
				}
			}
			function Phone(){
				if($("input[name='liu_phone']").val().length!=11){
						$("form fieldset p:nth-child(8) small")
						.text(" *输入11位手机号码")
						return false
				}else if($("input[name='liu_phone']").val()!=""&&!myr.test($("input[name='liu_phone']").val())){
					$("form fieldset p:nth-child(8) small")
					.text(" *手机号码格式不对")
					return false
				}else if($("input[name='liu_phone']").val().length==0){
					$("form fieldset p:nth-child(8) small")
					.text(" *手机号码不能为空")
					return false
				}else{
					$("form fieldset p:nth-child(8) small")
					.text("")
					return true
				}
			}
			function Email(){
				if(!myreg.test($("input[name='liu_email']").val())){
						$("form fieldset p:nth-child(9) small")
						.text(" *请输入有效邮箱")
						return false
				}else if($("input[name='liu_email']").val().length==0){
					$("form fieldset p:nth-child(9) small")
					.text(" *邮箱不能为空")
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
					}else if(!Zh()){
						$("form fieldset p:nth-child(10) small")
						.text(" *请正确输入账号")
						return false
					}else if(!Mima()){
						$("form fieldset p:nth-child(10) small")
						.text(" *密码输入不正确")
						return false
					}else if(!Zm()){
						$("form fieldset p:nth-child(10) small")
						.text(" *第二次密码不正确")
						return false
					}else{
						$("form fieldset p:nth-child(10) small")
						.text("")
						return true;
					}
				}
			</script>
<!--页体结束-->
		
		<!--页脚开始-->
		<div class="box=3" style="width: 100%;border: darkblue 1px solid;margin-top: 10px;">
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
		<!--页脚结束-->	
	</body>
</html>