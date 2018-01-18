<!DOCTYPE html>
<html lang="en">
<head>


	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">

			<form action="{{url('admin/logincheck')}}" method="post">
				{{csrf_field ()}}
				<ul>
					<li class='loginmsg'>
						<?php session_start();echo @$_SESSION['msg'];$_SESSION['msg']=null; ?>
					</li>
					<li>
					<span><i class = "fa fa-user"></i></span>
					<input type="text" name="username"  class="text"/>

					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>

						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="/app/Http/Model/gd2.php" title="看不清，点击切换图片" onclick="this.src='/app/Http/Model/gd2.php'+'?nowtime='+new Date().getTime()">
					</li>
					<li>

						<input type="submit" value="立即登陆" onclick="return check(form)"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2017 Powered by <a href="http://togethergo.me" target="_blank">http://togethergo.me</a></p>
		</div>
	</div>

</body>

	<script language="javascript">
			function check(form){
				if(form.username.value==""){ alert("用户名不能为空！");form.username.focus();return false;}
				if(form.password.value==""){ alert("密码不能为空！");form.password.focus();return false;}
				if(form.code.value.length<4){ alert("验证码错误");form.code.focus();return false;}
			}



	</script>

	</script>>

</html>
