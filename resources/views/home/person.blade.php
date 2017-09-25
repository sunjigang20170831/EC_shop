<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
        
		
		<link href="{{asset('home/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/css/personal.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/css/vipstyle.css')}}" rel="stylesheet" type="text/css">
		<script src="{{asset('home/AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('home/AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>
		<link href="{{asset('home/css/infstyle.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/css/addstyle.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/css/stepstyle.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/css/colstyle.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/css/wallet.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/css/point.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('home/css/orstyle.css')}}" rel="stylesheet" type="text/css">
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
            $('#logo').attr('src',"{{asset('home/uplodas/')}}/"+data.logo);
            console.log(data);
            
        },
        error:function(){
            
        }
    });

        </script>  	
	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
							
							<p style="color:red;">欢迎来到个人中心</p>
							
								<!--<div class="menu-hd">
									<a href="#" target="_top" class="h">亲，请登录</a>
									<a href="#" target="_top">免费注册</a>
								</div>-->
								
							</div>
						</ul>
						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
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
                        <li><img id="logo" src="{{ asset('home/images/logobig.png') }}" height="90" width="200"/></li>
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
					</div>
				</div>
			</article>
		</header>
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
		<b class="line"></b>
		<div class="center">
			<div class="col-main">
				@yield('centent')
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p id="link">
						
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
						
						</p>
					</div>
				</div>

			</div>

			<aside class="menu">
				<ul>
					<li class="person active">
						<a href="{{ url('/home/person') }}"><i class="am-icon-user"></i>个人中心</a>
					</li>
					<li class="person">
						<p><i class="am-icon-newspaper-o"></i>个人资料</p>
						<ul>
							<li> <a href="{{ url('/home/information') }}">个人信息</a></li>
							<li> <a href="{{ url('/home/safety') }}">安全设置</a></li>
							<li> <a href="{{ url('/home/address') }}">地址管理</a></li>
						</ul>
					</li>
					</li>
					<li class="person">
						<p><i class="am-icon-balance-scale"></i>成为卖家</p>
						<ul>
					
    				<li><a href="{{ url('/home/idcard') }}">商店注册</a></li>
				
  					 <li><a href="{{ url('/home/idcards') }}">查看进度</a></li>
  					

					
   					 
    
							
							@if(session('adminuser')->status == '1')
							<li> <a href="{{ url('/home/shops') }}">发布商品</a></li>
							<li> <a href="{{ url('/home/shops').'/'.session('adminuser')->id }}">商品管理</a></li>
							<li><a href="{{ url('/home/sale') }}">我卖出的商品</a></li>
							<li><a href="{{ url('/home/fahuo') }}">需要发货</a></li>
							@endif
							<li><a href="{{ url('/home/lianmeng') }}">商家大联盟</a></li>
							<li><a href="{{ url('/home/huifu') }}">留言回复</a></li>
						</ul>
					</li>
					<li class="person">
						<p><i class="am-icon-balance-scale"></i>我的交易</p>
						<ul>
							<li><a href="{{ url('/home/indent') }}">订单管理</a></li>
							
							
						</ul>
					</li>
					<li class="person">
                        <p><i class="am-icon-dollar"></i>我的资产</p>
                        <ul>
                            <li> <a href="{{ url('home/points') }}">我的积分</a></li>
                       
 
                            <li> <a href="{{ url('home/wallet')}}">账户余额</a></li>
							<li> <a href="{{ url('home/walletList')}}">账单明细</a></li>
                        </ul>
                    </li>


					<li class="person">
						<p><i class="am-icon-tags"></i>我的收藏</p>
						<ul>

							<li> <a href="{{url('home/shopcat')}}">购物车</a></li>
																				
						</ul>
					</li>
					<li class="person">
						<p><i class="am-icon-qq"></i> <a href="{{ url('/home/consultation')}}">意见反馈</a></p>
	
						
					</li>
					
				</ul>

			</aside>
		</div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="/"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="../home/sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="{{url('home/shopcat')}}"><i class="am-icon-shopping-basket"></i>购物车</a></li>
			<li class="active"><a href="{{url('home/person')}}"><i class="am-icon-user"></i>我的</a></li>
			@if(session('adminuser')->status == '1')
			
			<li><a href="{{url('home/shops').'/'.session('adminuser')->id}}"><i class="am-icon-shopping-basket"></i>我的商店</a></li>
			@endif
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