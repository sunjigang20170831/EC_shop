
<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="stylesheet" href="{{ asset('../home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" />
		<link href="{{ asset('../home/css/dlstyle.css') }}" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="{{ asset('../home/images/logobig.png') }}" /></a>
		</div>
					
		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="{{ asset('../home/images/big.jpg') }}" /></div>
				<div class="login-box">
				@if (session('msg'))
					    <div style = "color:red" class="alert alert-success">
					        {{ session('msg') }}
					    </div>
					@endif
							
							<h3 class="title">登录商城</h3>

						<div class="clear"></div>
					@if (count($errors) > 0)
						<div class="mark">
							<ul>
								@if(is_object($errors))
									@foreach ($errors->all() as $error)
										<li style="color:red">{{ $error }}</li>
									@endforeach
								@else
									<li style="color:red">{{ $errors }}</li>
								@endif
							</ul>
						</div>
					@endif
						<div class="login-form">

							<div class="login-form">
								<form action="{{ url('/login')}}" method="post" id="form1">
									{{ csrf_field() }}
									<div class="user-name">
										<label for="user"><i class="am-icon-user"></i></label>
										<input type="text" name="name" id="user" placeholder="请输入邮箱">
										<input type="hidden" name="lasttime" value="{{ time() }}">
									</div>
									<div class="user-pass">
										<label for="password"><i class="am-icon-lock"></i></label>
										<input type="password" name="pass" id="password" placeholder="请输入密码">
									</div>
									<div class="user-pass">
										<label for="password"><i class="am-icon-check"></i></label>
										<input type="text" class="form-control" name="code" placeholder="请输入验证码" style="width:160px;" />
										<img src="{{ url('home/code') }}" onclick="this.src='{{url('home/code')}}?'+Math.random()"  alt="">

									</div>
								</form>


								<script>
             			 function dosubmit(id)
                		{
                			var form = document.getElementById('form1');
                				form.submit();	
                		}
             		</script>
           </div>
            		
            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
								<a href="#" class="am-fr">忘记密码</a>
								<a href="{{ url('/register') }}" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            </div>
								<div class="am-cf">
									<input type="submit"  onclick="dosubmit(id)"; value="登 录" class="am-btn am-btn-primary am-btn-sm">
								</div>
						<div class="partner">		
								<h3>合作账号</h3>
							<div class="am-btn-group">
								<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
								<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
								<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
							</div>
						</div>	

				</div>
			</div>
		</div>


					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
							</p>
						</div>
					</div>
	</body>

</html>