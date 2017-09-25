@extends('home.parent')
    @section('centent')

            <div class="clear"></div>
            <b class="line"></b>
           <div class="search">
            <div class="search-list">
            <div class="nav-table">
                       <div class="long-title"><span class="all-goods">全部分类</span></div>
                       <div class="nav-cont">
                            <ul>
                                <li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
                            </ul>
                            <div class="nav-extra">
                                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
                                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
                            </div>
                        </div>
            </div>
            
                
                    <div class="am-g am-g-fixed">
                        <div class="am-u-sm-12 am-u-md-12">
                        <div class="theme-popover">                                                     
                            <div class="searchAbout">
                                <span class="font-pale">相关搜索：</span>
                                <a title="{{ $arr->name }}" href="#">{{ $arr->name }}</a>&nbsp;
                            </div>
                            <ul class="select">
                                <p class="title font-normal">
                                    <span class="fl">{{ $arr->name }}</span>
                                    <span class="total fl">搜索到<strong class="num">997</strong>件相关商品</span>
                                </p>
                                <div class="clear"></div>
                                <li class="select-result">
                                    <dl>
                                        <dt>已选</dt>
                                        <dd class="select-no"></dd>
                                        <p class="eliminateCriteria">清除</p>
                                    </dl>
                                </li>
                                <div class="clear"></div>
                                <li class="select-list">
                                    <dl id="select1">
                                        <dt class="am-badge am-round">版块</dt>   
                                    
                                         <div class="dd-conent">                                        
                                            <dd class="select-all selected"><a href="#">全部</a></dd>
                                            @foreach ($list as $li)
                                                @if ($li->pid == '0')
                                            <dd><a href="javascript:doFenci({{ $li->id }})">{{ $li->name }}</a></dd>
                                                @endif
                                            @endforeach
                                         </div>
                        
                                    </dl>
                                </li>
                                <form action='' method='post' style='display:none' name='myform'>
                                    {{ csrf_field() }}
                                    <input type="text" value='' id='fenci' name='id'>
                                </form>
                                <li class="select-list">
                                    <dl id="select2">
                                        <dt class="am-badge am-round">种类</dt>
                                        <div class="dd-conent">
                                            <dd class="select-all selected"><a href="#">全部</a></dd>
                                            @foreach ($list as $ll)
                                            @if($li->id == $ll->id)
                                                
                                            <dd>
                                                <a href="javascript:doFenci('{{ $ll->id }}')">{{ $ll->name }}</a>
                                            </dd>
                                            @endif
                                            @endforeach
                                        </div>
                                    </dl>
                                </li>
                                
                            
                            </ul>
                            <div class="clear"></div>
                        </div>
                            <div class="search-content">
                                <div class="sort">
                                    <li class="first"><a title="综合">综合排序</a></li>
                                    <li><a title="价格">价格优先</a></li>
                                    <li class="big"><a title="评价" href="#">评价为主</a></li>
                                </div>
                                <div class="clear"></div>

                                <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                                @foreach ($shops[0] as $v)
                                    @if ($v->status == 1)
                                    <li>
                                        <div class="i-pic limit">
                                            <a href="{{ url('home/details').'/'.$v->id }}"><img src="{{ asset('home/uplodas').'/'.$v->image }}" style='height:218px;' />                                           
                                            <p class="title fl">{{ $v->shopname }}</p>
                                            <p class="price fl">
                                                <strong>¥{{ $v->price }}</strong>&nbsp;&nbsp;
                                                <del>¥{{ $v->reprice }}</del>
                                            </p>
                                            <p class="number fl">
                                                点赞量<span>{{ $v->good }}</span>
                                            </p></a>
                                        </div>
                                    </li>
                                    @endif
                                @endforeach
                                </ul>
                            </div>
                            <div class="search-side">

                                <div class="side-title">
                                    经典搭配
                                </div>
								@foreach ($ho as $hh)
                                <a href="{{ url('home/details').'/'.$hh->id }}"><li>
                                    <div class="i-pic check">
                                        <img src="{{ asset('home/uplodas').'/'.$hh->image }}" />
                                        <p class="check-title">{{ $hh->shopname }}</p>
                                        <p class="price fl">
                                            <b>¥</b>
                                            <strong>{{ $hh->price }}</strong>
                                        </p>
                                        <p class="number fl">
                                            点赞<span>{{ $hh->good }}</span>
                                        </p>
                                    </div>
                                </li></a>
                                @endforeach

                            </div>
                            <div class="clear"></div>
                            <!--分页 -->
                            {!! $shops[0]->render() !!}    
                            

                        </div>
                    </div>
<script>
    function doFenci(id)
    {
        // alert(id);
        var form = document.myform;
        var fenci = document.getElementById('fenci');
        var url = "{{ url('home/fenci') }}";
        form.action = url + '/' +id;
        fenci.value = id;
        form.submit();
    }
</script>
@endsection