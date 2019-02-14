<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:52:"G:\PHP\daily/application/admin\view\index\index.html";i:1534145048;}*/ ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>CaptionQR</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/assets/My/login/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__/assets/My/login/css/demo.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/assets/My/login/css/component.css" />
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>CaptionQR</h3>
						<form action="#" name="f" method="post">
						<!-- 	<div class="input_outer">
								<span class="u_user"></span>
								<input name="logname" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
							</div> -->
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="pwd" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<div class="mb2"><a class="act-but submit" href="index/login" style="color: #FFFFFF">登录</a></div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
		<script src="__PUBLIC__/assets/My/login/js/TweenLite.min.js"></script>
		<script src="__PUBLIC__/assets/My/login/js/EasePack.min.js"></script>
		<script src="__PUBLIC__/assets/My/login/js/rAF.js"></script>
		<script src="__PUBLIC__/assets/My/login/js/demo-1.js"></script>
	</body>
</html>