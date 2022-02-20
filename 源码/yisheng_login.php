<?php
include 'global.php';
if(!empty($_POST['sub'])){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$sql = "SELECT * FROM `yisheng` WHERE `zhanghao` = '$username' AND `password` = '$password'";
	$query = mysqli_query($conn, $sql);
	$result = mysqli_fetch_row($query);
	
	if(is_array($result)){
		$_SESSION['islogin'] = $result[3];
		echo "<script>alert('登陆成功');location.href='liuyan_guanli.php';</script>";
	}else{
		echo "<script>alert('登陆失败')</script>";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link href="framework/bootstrap3.3.7.min.css" rel="stylesheet"/>
<link href="css/login_css.css" rel="stylesheet" media="all"/>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="css/box.css" type="text/css">
</head>

<body style="background-color: #e9f6ff;">
<!--bootstrap引用开始-->
<script src="framework/jquery.min.js"></script>
<script src="framework/bootstrap.min.js"></script>
<!--bootstrap引用结束-->

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
<div class="container" >
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
    <div class="bodyer" style="box-shadow: #777 1px 1px 3px;">
        <div class="box_login" align="center" style="box-shadow: #777 1px 1px 1px;">
            <form class="form-horizontal" role="form" action="#" onsubmit="return checkForm();" method="post">
    		<h2>医生登录！</h2>
                <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" name="username" id="inputName" placeholder="请输入用户名" onkeyup="checkName();">
                      <span class="popover-show nameMsg_1" data-container="body" data-toggle="popover" data-placement="bottom" data-content="用户名不能为空"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">密&nbsp;&nbsp;&nbsp;码</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" id="password" placeholder="请输入密码" onkeyup="checkPsw();">
                      <span class="popover-show pswMsg_1" data-container="body" data-toggle="popover" data-placement="bottom" data-content="密码不能为空"></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="sub" class="btn btn-default btn_login" value="登录">
                    </div>
                </div>
				<div style="text-align: right;" >
					<p ><a href="yisheng_zhuce.php">立即注册</a></p>
					
				</div>
            </form>
        </div>
    </div>
</div>
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
<script type="text/javascript" src="js/login_validation.js"></script>
</html>
