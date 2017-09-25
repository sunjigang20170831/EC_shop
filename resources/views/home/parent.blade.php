<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
@if($config->open == 0)
    
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404</title>
    <style>
        #dd{
            height:30px;
            width:300px;
            margin:0 auto;
        }
    </style>

</head>
<body>
    <div id='dd'>
        <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oh! NO</h1>
        <p>网站正在更新中,敬请期待........</p>
    </div>
</body>
</html>
@else

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head id="head">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <link href="{{ asset('home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('home/AmazeUI-2.4.2/assets/css/admin.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('home/css/seastyle.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('home/css/hmstyle.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('home/AmazeUI-2.4.2/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('home/AmazeUI-2.4.2/assets/js/amazeui.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('home/basic/js/jquery-1.7.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('home/js/script.js') }}"></script>
        <script>
        var url = "{{ url('/ajax') }}";
        $.ajax({
        url:url,
        type:'get',
        dataType:'json',
        data:{upid:0},
        success:function(data){
            $("#head").append('<meta name="keywords" content="'+data.keywords+'" />');
            $("#head").append('<meta name="description" content="'+data.des+'" />');
            $("#head").append('<title id="title">'+data.title+'</title>');
            $('#logo').attr('src',"{{asset('home/uplodas/')}}/"+data.logo);
            console.log(data);
            
        },
        error:function(){
            
        }
    });

        </script>   

    </head>

    <body>
        <div class="hmtop">
            <!--顶部导航条 -->
            <div class="am-container header">
                <ul class="message-l">
                    <div class="topMessage">
                        <div class="menu-hd">
                            @if (session('adminuser'))
                          <p style="color:red">亲,您已登录成功! &nbsp;<a href="{{ url('/over')}}" target="_top" class="h" style="color:blue">退出登录</a></p>
                           @else 
                           <a href="{{ url('/login')}}" target="_top" class="h">亲，请登录</a>
                            <a href="{{ url('/register')}}" target="_top">免费注册</a>
                            
                    @endif
                        </div>
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd"><a href="{{ url('/') }}" target="_top" class="h">商城首页</a></div>
                    </div>
                    <div class="topMessage my-shangcheng">
                        <div class="menu-hd MyShangcheng"><a href="{{url('home/person')}}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
                    </div>
                    <div class="topMessage mini-cart">
                        <div class="menu-hd"><a id="mc-menu-hd" href="{{url('home/shopcat')}}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
                    </div>
                    <div class="topMessage favorite">
                        
                </ul>
                </div>

                <!--悬浮搜索框-->

                <div class="nav white">
                <div class="logo"><img src=""></div>
                <div class="logoBig">
                    <li class=""><img id='logo' src="{{ asset('home/images/logo.jpg') }}"></li>
                </div>

                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="#"></a>
                        <form action='{{ asset("home/fenci") }}' method='post'>
                        {{ csrf_field() }}&nbsp
                            <label for="user"> <i class="am-icon-search bigger-140"> </i></label>
                            <input id="searchInput" name="fenci" type="text" placeholder="请输入需要搜索的商品名称">
                            <input id="ai-topsearch" class="submit am-btn" type="submit" value="搜索">
                        </form>
                        <ul>
                            <li><a href="#">百度</a> |
                                <a href="#">联想23</a> |
                                <a href="#">联想23</a> |
                                <a href="#">联想23</a> |
                                <a href="#">联想23</a> |
                                <a href="#">联想23</a> |
                                <a href="#">联想23</a> |
                            </li>
                        </ul>
                  
                    </div>
                </div>

                <div class="clear"></div>
            </div>
                @yield('centent')
                <div class="footer ">
                        <div class="footer-hd ">
                            <p id='link'>
                                
                            </p>
                        </div>
                        <div class="footer-bd ">
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        </div>
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
        <!--引导 -->

        <div class="navCir">
            <li class="active"><a href="/"><i class="am-icon-home "></i>首页</a></li>
            <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
            <li><a href="{{url('home/shopcat')}}"><i class="am-icon-shopping-basket"></i>购物车</a></li> 
            <li><a href="{{url('home/person')}}"><i class="am-icon-user"></i>我的</a></li>                  
        </div>
        <!--菜单 -->
        <div class=tip>
            <div id="sidebar">
                <div id="wrap">
                    <div id="prof" class="item ">
                        <a href="# ">
                            <span class="setting "></span>
                        </a>
                        <div class="ibar_login_box status_login ">
                            <div class="avatar_box ">
                                <p class="avatar_imgbox "><img src="{{ asset('home/images/no-img_mid_.jpg') }} " /></p>
                                <ul class="user_info ">
                                    <li>用户名：sl1903</li>
                                    <li>级&nbsp;别：普通会员</li>
                                </ul>
                            </div>
                            <div class="login_btnbox ">
                                <a href="# " class="login_order ">我的订单</a>
                                <a href="# " class="login_favorite ">我的收藏</a>
                            </div>
                            <i class="icon_arrow_white "></i>
                        </div>

                    </div>
                    <div id="shopCart " class="item ">
                        <a href="{{url('home/shopcat')}}">
                            <span class="message "></span>
                        
                        <p>
                            购物车
                        </p>
                         </a>
                        <p class="cart_num ">0</p>
                    </div>
                    <div id="asset " class="item ">
                        <a href="# ">
                            <span class="view "></span>
                        </a>
                        <div class="mp_tooltip ">
                            我的资产
                            <i class="icon_arrow_right_black "></i>
                        </div>
                    </div>

                    <div id="foot " class="item ">
                        <a href="# ">
                            <span class="zuji "></span>
                        </a>
                        
                    </div>

                    <div id="brand " class="item ">
                        <a href="#">
                            <span class="wdsc "><img src="{{ asset('home/images/wdsc.png') }} " /></span>
                        </a>
                       
                    </div>

                    <div id="broadcast " class="item ">
                        <a href="# ">
                            <span class="chongzhi "><img src="{{ asset('home/images/chongzhi.png') }} " /></span>
                        </a>
                        <div class="mp_tooltip ">
                            我要充值
                            <i class="icon_arrow_right_black "></i>
                        </div>
                    </div>

                    <div class="quick_toggle ">
                       
                        <!--二维码 -->
                        <li class="qtitem ">
                            <a href="#none "><span class="mpbtn_qrcode "></span></a>
                            <div class="mp_qrcode " style="display:none; "><img src="{{ asset('home/images/weixin_code_145.png') }} " /><i class="icon_arrow_white "></i></div>
                        </li>
                        <li class="qtitem ">
                            <a href="#top " class="return_top "><span class="top "></span></a>
                        </li>
                    </div>

                    <!--回到顶部 -->
                    <div id="quick_links_pop " class="quick_links_pop hide "></div>

                </div>

            </div>
            <div id="prof-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    我
                </div>
            </div>
            <div id="shopCart-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    购物车
                </div>
            </div>
            <div id="asset-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    资产
                </div>

                <div class="ia-head-list ">
                    <a href="# " target="_blank " class="pl ">
                        <div class="num ">0</div>
                        <div class="text ">优惠券</div>
                    </a>
                    <a href="# " target="_blank " class="pl ">
                        <div class="num ">0</div>
                        <div class="text ">红包</div>
                    </a>
                    <a href="# " target="_blank " class="pl money ">
                        <div class="num ">￥0</div>
                        <div class="text ">余额</div>
                    </a>
                </div>

            </div>
            <div id="foot-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    足迹
                </div>
            </div>
            <div id="brand-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    收藏
                </div>
            </div>
            <div id="broadcast-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    充值
                </div>
            </div>
        </div>
        <script>
            window.jQuery || document.write('<script src="{{ asset('basic/js/jquery.min.js') }} "><\/script>');
        </script>
        <script type="text/javascript " src="{{ asset('home/basic/js/quick_links.js') }} "></script>
    </body>

</html>
@endif