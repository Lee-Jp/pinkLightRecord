<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"F:\phpStudy\PHPTutorial\WWW\shequTp\public/../application/index\view\index\login.html";i:1564716500;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta author="flx.me ">
	<title>登录 - 拾光纪 - Thousands Find</title>
	<link rel="stylesheet" type="text/css" href="/shequTp/public/static/index/css/login_register.css">
</head>
<body>
<div id="box"></div>
<div class="cent-box">
	<div class="cent-box-header">
		<h1 class="main-title hide">拾光纪</h1>
		<h2 class="sub-title">爱生活，爱分享 - Life loves to share</h2>
	</div>

	<div class="cont-main clearfix">
		<div class="index-tab">
			<div class="index-slide-nav">
				<a href="login.html" class="active">登录</a>
				<a href="register.html">注册</a>
				<div class="slide-bar"></div>				
			</div>
		</div>

		<div class="login form">
			<div class="group" style="height: 134px;">
				<div class="group-ipt email">
					<input type="text" name="email" id="email" class="ipt" placeholder="邮箱地址" required>
				</div>
				<div class="group-ipt password">
					<input type="password" name="password" id="password" class="ipt" placeholder="输入您的登录密码" required>
				</div>
				<div class="group-ipt verify" style="border-top: 1px solid #d5d5d5">
					<input type="text" name="verify" id="in1" class="ipt" placeholder="输入验证码" required>
					<span id="verify" style="text-align: center;" ></span>
				</div>
				<label id="l1"></label>
			</div>
		</div>

		<div class="button">
			<button type="submit" class="login-btn register-btn" id="button">登录</button>
		</div>

		<div class="remember clearfix">
			<label class="remember-me"><span class="icon"><span class="zt"></span></span><input type="checkbox" name="remember-me" id="remember-me" class="remember-mecheck" checked>记住我</label>
			<label class="forgot-password">
				<a href="forgetlogin.html">忘记密码？</a>
			</label>
		</div>
	</div>
</div>

<div class="footer">
	<p>拾光纪 - Thousands Find</p>
	<p>Designed By shiguang & <a href="shequ.me">shiguang.me</a> 2019</p>
</div>

<script src='/shequTp/public/static/index/js/particles.js' type="text/javascript"></script>
<script src='/shequTp/public/static/index/js/background.js' type="text/javascript"></script>
<script src='/shequTp/public/static/index/js/jquery.min.js' type="text/javascript"></script>
<script src='/shequTp/public/static/index/js/layer/layer.js' type="text/javascript"></script>
<script src='/shequTp/public/static/index/js/myjs.js' type="text/javascript"></script>
<script>
	$(document).ready(function() {
			 
			//验证码
			var code;
			function createCode(){
	        	code = '';//首先默认code为空字符串
		        var codeLength = 4;//设置长度，这里看需求，我这里设置了4
		        var codeV = $("#verify");
		        //设置随机字符
		        var random = new Array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R', 'S','T','U','V','W','X','Y','Z');
		        for(var i = 0; i < codeLength; i++){ //循环codeLength 我设置的4就是循环4次   
		             var index = Math.floor(Math.random()*36); //设置随机数范围,这设置为0 ~ 36  
		             code += random[index];  //字符串拼接 将每次随机的字符 进行拼接
	        }
		        codeV.text(code);//将拼接好的字符串赋值给展示的Value
	    	}
		
    		//页面开始加载验证码
			createCode();
			//验证码Div加载点击事件
			$("#verify").bind('click',function() {
					createCode();
				});
		//下面就是判断是否==的代码，无需解释
		    	
				$("#button").bind('click',function() {
		    	 var oValue = $("#in1").val().toUpperCase();
		    	 $("#l1").html("");
		        if(oValue ==""){
		        	$("#l1").html("<font color='red'>请输入验证码</font>");
		        }else if(oValue != code){
		        	$("#l1").html("<font color='red'>验证码不正确，请重新输入</font>");
		            oValue = "";
		            createCode();
		        }else{
		        	var email = $(" #email ").val();
					var password = $(" #password ").val();
					if(email == ''){
						$("#l1").html("<font color='red'>请输入邮箱</font>");
					}else if(password == ''){
						$("#l1").html("<font color='red'>请输入密码</font>");
					}else{
						$.ajax({
						type: "POST",
						dataType: "json",
						url: httpurl + "user/ajaxLoginUser",  
						data: {
							'email':email,
							'password':password
						},
						success: function(res){
							if(res.code == 200){
                                localStorage.user =  JSON.stringify(res.data);
								window.location.href="index.html";
							}else{
								alert('用户名或密码不正确！');
							}
						},
						error:function(err){
							// alert(err.msg)
							console.log(err)
						}
					});  
					}
		        }
		    });	
		});
	$("#remember-me").click(function(){
		var n = document.getElementById("remember-me").checked;
		if(n){
			$(".zt").show();
		}else{
			$(".zt").hide();
		}
	});
</script>
</body>
</html>