<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="{{ asset('../home/AmazeUI-2.4.2/assets/css/amazeui.min.css') }}" />
		<link href="{{ asset('../home/css/dlstyle.css') }}" rel="stylesheet" type="text/css">
		<script src="{{ asset('../home/AmazeUI-2.4.2/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('../home/AmazeUI-2.4.2/assets/js/amazeui.min.js') }}"></script>
		<style type="text/css">
			.res-banner{
				background:url('../home/images/back.jpg') no-repeat 4px 5px;
				background-size: 100%;	
			}
		</style>
	</head>

	<body>
		
		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="{{ asset('../home/images/logo1.jpg') }}" /></a>
		</div>

		<div class="res-banner">

			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="{{ asset('../home/images/cuxiao.jpg') }}" style="padding:80px;"/></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">用户名</a></li>
							</ul>

							<div class="am-tabs-bd">

								
								<div class="am-tab-panel am-active">
									@if (count($errors) > 0)
										<div class="mark">
											<ul>
												@if(is_object($errors))
													@foreach ($errors->all() as $error)
														<li style="color: red">{{ $error }}</li>
													@endforeach
												@else
													<li style="color: red">{{ $errors }}</li>
												@endif
											</ul>
										</div>
									@endif

									<form  action="{{ url('/register')}}" method="post" id="form1" >
										{{ csrf_field() }}

							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="name" id="email" placeholder="请输入账号">
										<input type="hidden" name="utime" value="{{ time() }}">
                 </div>										
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pass" id="password"   placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="repass"  id="passwordRepeat"  placeholder="确认密码">
                 </div>	  
                 		
										
										
                                </form>


								<script>
									function dosubmit(id)
									{
										var form = document.getElementById('form1');
										form.submit();
									}
								</script>
                 
                 <div class="login-links">
										{{--<label for="reader-me">--}}
											{{--<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》--}}
										{{--</label>--}}
							  	</div>
										<div class="am-cf">
										
											<input type="submit"  onclick="dosubmit(id)"; value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
										
								</div>

								<div class="partner">
									<h3>合作账号</h3>
									<div class="am-btn-group">
										<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
										<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
										<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
									</div>
								</div>

								<hr>
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
								
							</p>
						</div>
					</div>
	</body>

</html>