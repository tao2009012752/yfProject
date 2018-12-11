{x2;include:header}
<link rel="stylesheet" type="text/css" href="app/core/styles/css/style.css"/>

	<body style="background: #d6dee0;">
		<div class="examBg">
			<div class="contant">
				<div class="kaoshiImgBox">
					<img src="app/core/styles/images/kaoshiTit.png" class="kaoshiImg"/>
				</div>
				<div class="loginBoxWrap">
					<form method="post" action="index.php?user-app-login" class="examForm">
						<div class="inputBox">
							<label for="">用户名：</label>
							<input type="text" name="args[username]" class="username" datatype="userName" needle="needle" msg="请您输入正确的用户名" placeholder="请输入用户名" placeholder="请输入用户名" />
						</div>
						<div class="inputBox">
							<label for="">密&nbsp;码：</label>
							<input type="password" name="args[userpassword]" class="password" placeholder="请输入密码" datatype="password" needle="needle" msg="请您输入正确的密码" />
						</div>
						<div class="inputBox remen">
							<label for="rember"></label>
							<input type="checkbox" id="rember"/>记住密码
						</div>
						<div class="examSubmit">
							<input type="hidden" value="1" name="userlogin"/>
							<input type="image" src="app/core/styles/images/butn.png" style="width: 273px;height: 45px">
						</div>
					</form>
				</div>
			</div>
			<div class="banquan">版权所有：安徽皖信人力资源管理有限公司</div>
		</div>

		<script>
			function getCookie(c_name)
			{
				if (document.cookie.length>0)
				  {
				  c_start=document.cookie.indexOf(c_name + "=")
				  if (c_start!=-1)
				    { 
				    c_start=c_start + c_name.length+1 
				    c_end=document.cookie.indexOf(";",c_start)
				    if (c_end==-1) c_end=document.cookie.length
				    return unescape(document.cookie.substring(c_start,c_end))
				    } 
				  }
				return ""
			}

			function setCookie(c_name,value,expiredays)
			{
				var exdate=new Date()
				exdate.setDate(exdate.getDate()+expiredays)
				document.cookie=c_name+ "=" +escape(value)+
				((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
			}

			$(function(){
				var uname = getCookie('username');
				var pwd = getCookie('password');
				if(uname.length > 0 && pwd.length > 0){
					$('.username').val(uname);
					$('.password').val(pwd);
				}


				$('input[type="image"]').on('click',function(){
					//记住密码
					if($('input[type="checkbox"]:checked').length){
						var username = $.trim($('.username').val());
						var password = $.trim($('.password').val());
						if(username.length > 0 && password.length > 0){
							setCookie('username',username,7);
							setCookie('password',password,7);
						}
					}
				});
			});

		</script>

	</body>
</html>
