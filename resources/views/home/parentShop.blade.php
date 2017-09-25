<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	

       
		<link href="{{ asset('home/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css" />
		
		<link href="{{ asset('home/basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
		<link type="text/css" href="{{ asset('home/css/optstyle.css')}}" rel="stylesheet" />
		<link type="text/css" href="{{ asset('home/css/style.css')}}" rel="stylesheet" />

		<script type="text/javascript" src="{{ asset('home/basic/js/jquery-1.7.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('home/basic/js/quick_links.js')}}"></script>

		<script type="text/javascript" src="{{ asset('home/AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>
		<script type="text/javascript" src="{{ asset('home/js/jquery.imagezoom.min.js')}}"></script>
		<script type="text/javascript" src="{{ asset('home/js/jquery.flexslider.js')}}"></script>
		<script type="text/javascript" src="{{ asset('home/js/list.js')}}"></script>
		<script>
		var url = "{{ url('/ajax') }}";
		$.ajax({
		url:url,
		type:'get',
		dataType:'json',
		data:{upid:0},
		success:function(data){
			$("head").append('<meta name="keywords" content="'+data.keywords+'" />');
			$("head").append('<meta name="description" content="'+data.des+'" />');
			$("head").append('<title id="title">'+data.title+'</title>');
					$('#logo').attr('src',"{{asset('home/uplodas/')}}"+'/'+data.logo);
			// console.log(data.keywords);
			
		},
		error:function(){
			
		}
	});

		</script>		
	</head>

	<body>


		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
					<!-- 	<a href="#" target="_top" class="h">亲，请登录</a>
						<a href="#" target="_top">免费注册</a> -->
					</div>
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="{{url('home/person')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="{{url('home/shopcat')}}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			 <!--悬浮搜索框-->

                <div class="nav white">
                    
                    <div class="logoBig">
                        <li><img id="logo" src="{{ asset('home/images/logobig.png') }}" height="100" width="100"/></li>
                    </div>

                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="#"></a>
                        <form action='{{ asset("home/fenci") }}' method='post'>
                        {{ csrf_field() }}
                            <input id="searchInput" name="fenci" type="text">
                            <input id="ai-topsearch" class="submit am-btn" type="submit">
                        </form>
                    </div>
                </div>

			<div class="clear"></div>
            <b class="line"></b>
			<div class="listMain">

				<!--分类-->
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
					<li class="index"><a href="/">首页</a></li>
					<li class="qc"><a href="{{url('home/shops').'/'. $uid = session('adminuser')->id }}">我发布的闲置</a></li>
					<li class="qc"><a href="{{url('home/goushops')}}">我购买的物品</a></li>
					<li class="qc"><a href="{{url('home/news')}}">新闻公告</a></li>
					<li class="qc last"><a href="{{url('home/consultation')}}">消息反馈</a></li>
				</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			  @yield('centent')

						<div class="footer">
							<div class="footer-hd">
								<p id='link'>
                                
                            </p>
							</div>
							<div class="footer-bd">
								<ul>
					<li class="index"><a href="/">首页</a></li>
					<li class="qc"><a href="{{url('home/shops').'/'. $uid = session('adminuser')->id }}">我发布的闲置</a></li>
					<li class="qc"><a href="{{url('home/goushops')}}">我购买的物品</a></li>
					<li class="qc"><a href="{{url('home/news')}}">新闻公告</a></li>
					<li class="qc last"><a href="{{url('home/consultation')}}">消息反馈</a></li>
				</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
			<!--菜单 -->
			<div class=tip>
				<div id="sidebar">
					<div id="wrap">
						<div id="prof" class="item">
							<a href="#">
								<span class="setting"></span>
							</a>
							<div class="ibar_login_box status_login">
								<div class="avatar_box">
									<p class="avatar_imgbox"><img src="../images/no-img_mid_.jpg" /></p>
									<ul class="user_info">
										<li>用户名：sl1903</li>
										<li>级&nbsp;别：普通会员</li>
									</ul>
								</div>
								<div class="login_btnbox">
									<a href="#" class="login_order">我的订单</a>
									<a href="#" class="login_favorite">我的收藏</a>
								</div>
								<i class="icon_arrow_white"></i>
							</div>

						</div>
						<div id="shopCart" class="item">
							<a href="{{url('home/shopcat')}}">
								<span class="message"></span>
							</a>
							<p>
								购物车
							</p>
							<p class="cart_num">0</p>
						</div>
						<div id="asset" class="item">
							<a href="#">
								<span class="view"></span>
							</a>
							<div class="mp_tooltip">
								我的资产
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="foot" class="item">
							<a href="#">
								<span class="zuji"></span>
							</a>
							<div class="mp_tooltip">
								我的足迹
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="brand" class="item">
							<a href="#">
								<span class="wdsc"><img src="../images/wdsc.png" /></span>
							</a>
							<div class="mp_tooltip">
								我的收藏
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div id="broadcast" class="item">
							<a href="#">
								<span class="chongzhi"><img src="../images/chongzhi.png" /></span>
							</a>
							<div class="mp_tooltip">
								我要充值
								<i class="icon_arrow_right_black"></i>
							</div>
						</div>

						<div class="quick_toggle">
							<li class="qtitem">
								<a href="#"><span class="kfzx"></span></a>
								<div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
							</li>
							<!--二维码 -->
							<li class="qtitem">
								<a href="#none"><span class="mpbtn_qrcode"></span></a>
								<div class="mp_qrcode" style="display:none;"><img src="../images/weixin_code_145.png" /><i class="icon_arrow_white"></i></div>
							</li>
							<li class="qtitem">
								<a href="#top" class="return_top"><span class="top"></span></a>
							</li>
						</div>

						<!--回到顶部 -->
						<div id="quick_links_pop" class="quick_links_pop hide"></div>

					</div>

				</div>
				<div id="prof-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						我
					</div>
				</div>
				<div id="shopCart-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						购物车
					</div>
				</div>
				<div id="asset-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						资产
					</div>

					<div class="ia-head-list">
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">优惠券</div>
						</a>
						<a href="#" target="_blank" class="pl">
							<div class="num">0</div>
							<div class="text">红包</div>
						</a>
						<a href="#" target="_blank" class="pl money">
							<div class="num">￥0</div>
							<div class="text">余额</div>
						</a>
					</div>

				</div>
				<div id="foot-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						足迹
					</div>
				</div>
				<div id="brand-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						收藏
					</div>
				</div>
				<div id="broadcast-content" class="nav-content">
					<div class="nav-con-close">
						<i class="am-icon-angle-right am-icon-fw"></i>
					</div>
					<div>
						充值
					</div>
				</div>
			</div>

	</body>
<script>
        var url = "{{ url('/ajaxdemo/get') }}";
        $.ajax({
            url:url,
            type:'get',
            dataType:'json',
            data:{upid:0},
            success:function(data){
                for (var i = 0; i < data.length; i++) {
                    $('#link').append("<a href="+data[i].address+">"+data[i].name+"</a><b>|</b>");
                }
                console.log(data);
            },
            error:function(){
                
            }
        });

        
        </script>
</html>