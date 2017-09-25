@extends('home.parent')
@section('centent')


    <div class="banner">
        <!--轮播 -->
        <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0" >
            <ul class="am-slides">
                @foreach($carousel as $c)
                    <li class="banner1"><a href=""><img src="{{ asset("$c->address") }}" /></a></li>
                @endforeach

            </ul>
        </div>
        <div class="clear"></div>
    </div>

    <div class="shopNav">
        <div class="slideall">

            <div class="long-title"><span class="all-goods">全部分类</span></div>
            <div class="nav-cont">
                <ul>
                    <li class="index"><a href="/">首页</a></li>
                    <li class="qc"><a href="{{url('home/person')}}">个人中心</a></li>
                    <li class="qc"><a href="{{url('home/consultation')}}">意见反馈</a></li>
                    <li class="qc"><a href="{{url('home/news')}}">新闻公告</a></li>

                </ul>
                <div class="nav-extra">
                    <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>福利抢购
                    <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
                </div>
            </div>

            <!--侧边导航 -->
            <form action='' method='post' style='display:none' name='myform'>
                {{ csrf_field() }}
                <input type="text" value='' id='fenci' name='fenci'>
            </form>
            <div id="nav" class="navfull">
                <div class="area clearfix">
                    <div class="category-content" id="guide_2" style='height:436px;background:#2B2B2B'>

                        <div class="category">
                            <ul class="category-list" id="js_climit_li">
                                @foreach($list as $v)
                                    @if ($v->pid == '0')

                                        <li class="appliance js_toggle relative">
                                            <div class="category-info">
                                                <h3 class="category-name b-category-name"><i><img src="{{ asset('../home/images/cookies.png') }}"></i><a class="ml-22" title="{{ $v->name }}">{{ $v->name }}</a></h3>
                                                <em>&gt;</em></div>
                                            <div class="menu-item menu-in top">
                                                <div class="area-in">
                                                    <div class="area-bg">
                                                        <div class="menu-srot">
                                                            <div class="sort-side">
                                                                @foreach($list as $lists)

                                                                    @if ($lists->pid == $v->id)

                                                                        <dl class="dl-sort">
                                                                            <dt><span title="{{ $lists->name }}">{{ $lists->name }}</span></dt>
                                                                            @foreach($fenci as $f)
                                                                                @if($f->pid == $lists->id)

                                                                                    <dd><a title="{{ $f->word }}" href="javascript:doFenci('{{ $f->word }}')"><span>{{ $f->word }}</span></a></dd>
                                                                                @endif
                                                                            @endforeach
                                                                        </dl>
                                                                    @endif
                                                                @endforeach
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <b class="arrow"></b>
                                        </li>
                                    @endif
                                @endforeach
                                <li class="appliance js_toggle relative"></li>
                                <li class="appliance js_toggle relative"></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!--轮播 -->
            <script type="text/javascript">
                (function() {
                    $('.am-slider').flexslider();
                });
                $(document).ready(function() {
                    $("li").hover(function() {
                        $(".category-content .category-list li.first .menu-in").css("display", "none");
                        $(".category-content .category-list li.first").removeClass("hover");
                        $(this).addClass("hover");
                        $(this).children("div.menu-in").css("display", "block")
                    }, function() {
                        $(this).removeClass("hover")
                        $(this).children("div.menu-in").css("display", "none")
                    });
                })
            </script>


            <!--小导航 -->
            <div class="am-g am-g-fixed smallnav">
                <div class="am-u-sm-3">
                    <a href="sort.html"><img src="{{ asset('../home/images/navsmall.jpg') }}" />
                        <div class="title">商品分类</div>
                    </a>
                </div>
                <div class="am-u-sm-3">
                    <a href="#"><img src="{{ asset('../home/images/huismall.jpg') }}" />
                        <div class="title">大聚惠</div>
                    </a>
                </div>
                <div class="am-u-sm-3">
                    <a href="#"><img src="{{ asset('../home/images/mansmall.jpg') }}" />
                        <div class="title">个人中心</div>
                    </a>
                </div>
                <div class="am-u-sm-3">
                    <a href="#"><img src="{{ asset('../home/images/moneysmall.jpg') }}" />
                        <div class="title">投资理财</div>
                    </a>
                </div>
            </div>

            <!--走马灯 -->

            <div class="marqueen">
                <span class="marqueen-title">商城头条</span>
                <div class="demo">

                    <ul>


                        <div class="mod-vip">



                            <div class="clear"></div>
                        </div>
                        @foreach($news as $n)
                            <li><a target="_blank" href="{{url('home/news').'/'.$n->id}}"><span>[公告]</span>{{$n->title}}</a></li>

                        @endforeach
                    </ul>
                    <div class="advTip"><img src="{{ asset('../home/images/advTip.jpg') }}"/></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <script type="text/javascript">
            if ($(window).width() < 640) {
                function autoScroll(obj) {
                    $(obj).find("ul").animate({
                        marginTop: "-39px"
                    }, 500, function() {
                        $(this).css({
                            marginTop: "0px"
                        }).find("li:first").appendTo(this);
                    })
                }
                $(function() {
                    setInterval('autoScroll(".demo")', 3000);
                })
            }
        </script>
        <script>
            function doFenci(word)
            {
                var form = document.myform;
                var fenci = document.getElementById('fenci');
                var url = "{{ url('home/fenci') }}";
                form.action = url;
                fenci.value = word;
                form.submit();
            }
        </script>
    </div>
    <div class="shopMainbg">
        <div class="shopMain" id="shopmain">

            <!--今日推荐 -->

            <div class="am-g am-g-fixed recommendation">
                <div class="clock am-u-sm-3" ">
                <img src="{{ asset('../home/images/2016.png') }} "></img>
                <p>品牌秒杀<br>限时抢购</p>

            </div>

            @foreach($shops as $ss)
                @if($ss->hot == 1)
                    <div class="am-u-sm-4 am-u-lg-3 ">
                        <a href="{{ url('home/details').'/'.$ss->id }}"><div class="info ">
                                <h3>{{ $ss->shopname }}</h3>
                                <h4>开年福利篇</h4>
                            </div>
                            <div class="recommendationMain ">
                                <img src="{{ asset('/home/uplodas').'/'.$ss->image }}"></img>
                            </div></a>
                    </div>
                @endif
            @endforeach

        </div>
        <div class="clear "></div>
        <!--热门活动 -->

        <div class="am-container activity ">
            <div class="shopTitle ">
                <h4>活动</h4>
                <h3>每期活动 优惠享不停 </h3>
                <span class="more ">
                              <a class="more-link " href="# ">全部活动</a>
                            </span>
            </div>

            <div class="am-g am-g-fixed ">
                <div class="am-u-sm-3 ">
                    <div class="icon-sale one "></div>
                    <h4>秒杀</h4>
                    <div class="activityMain ">
                        <img src="{{ asset('../home/images/activity1.jpg') }} "></img>
                    </div>
                    <div class="info ">
                        <h3>春节送礼优选</h3>
                    </div>
                </div>

                <div class="am-u-sm-3 ">
                    <div class="icon-sale two "></div>
                    <h4>特惠</h4>
                    <div class="activityMain ">
                        <img src="{{ asset('../home/images/activity2.jpg') }} "></img>
                    </div>
                    <div class="info ">
                        <h3>春节送礼优选</h3>
                    </div>
                </div>

                <div class="am-u-sm-3 ">
                    <div class="icon-sale three "></div>
                    <h4>团购</h4>
                    <div class="activityMain ">
                        <img src="{{ asset('../home/images/activity3.jpg') }} "></img>
                    </div>
                    <div class="info ">
                        <h3>春节送礼优选</h3>
                    </div>
                </div>

                <div class="am-u-sm-3 last ">
                    <div class="icon-sale "></div>
                    <h4>超值</h4>
                    <div class="activityMain ">
                        <img src="{{ asset('../home/images/activity.jpg') }} "></img>
                    </div>
                    <div class="info ">
                        <h3>春节送礼优选</h3>
                    </div>
                </div>

            </div>
        </div>
        <div class="clear "></div>

        <!--甜点-->
        @foreach($list as $v)
            @if ($v->pid == '0')

                <div id="f1">
                    <!--甜点-->

                    <div class="am-container ">
                        <div class="shopTitle ">

                            <h4>
                                {{ $v->name }}
                            </h4>

                            <h3>每一道甜品都有一个故事</h3>
                            <div class="today-brands ">

                                @foreach($list as $li)

                                    @if ($v->id == $li->pid)

                                        <a href="# ">{{ $li->name }}</a>
                                    @endif
                                @endforeach
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>

                    <div class="am-g am-g-fixed floodFour">
                        <div class="am-u-sm-5 am-u-md-4 text-one list ">
                            <div class="word">

                            </div>
                            <a href="# ">
                                <div class="outer-con ">
                                    <div class="title ">
                                        开抢啦！
                                    </div>
                                    <div class="sub-title ">
                                        零食大礼包
                                    </div>
                                </div>
                                <img src="../images/act1.png " />
                            </a>
                            <div class="triangle-topright"></div>
                        </div>
                        @foreach($list as $li)
                            @if ($v->id == $li->pid)
                                @foreach ($shop as $sh)
                                    @if($sh->pid == $li->id)
                                        <a href="{{ url('home/details').'/'.$sh->id }}"><div class="am-u-sm-7 am-u-md-4 text-two">
                                                <div class="outer-con ">
                                                    <div class="title ">
                                                        {{ $sh->shopname }}
                                                    </div>
                                                    <div class="sub-title ">
                                                        ¥{{ $sh->price }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <input id="" class="submit am-btn" type="button" value='点击查看详情'>
                                                    </div>
                                                    <!-- <i class="am-icon-shopping-basket am-icon-md  seprate"></i> -->
                                                </div>
                                                <a href="{{ url('home/details').'/'.$sh->id }} "><img src="{{ asset('home/uplodas'.'/'.$sh->image) }}" height='140'/></a>
                                            </div></a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                    </div>
                    <div class="clear "></div>
                </div>
            @endif
        @endforeach
    </div>
@endsection