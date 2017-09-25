<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>购物车页面</title>

		<link href="{{asset('home/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('home/basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('home/css/cartstyle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('home/css/optstyle.css')}}" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="{{asset('home/js/jquery.js')}}"></script>

	</head>

	<body>

		<!--顶部导航条 -->
		

			<!--悬浮搜索框--

			<!--购物车 -->
			<div class="concent">
			<form action="{{url('home/shopcat')}}" method="post">
							{{ csrf_field() }}
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
									@if (session('msg'))
					    <div class="alert alert-success" style="color:red">
					        {{ session('msg') }}
					    </div>
					@endif
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>

					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="bundle-hd">
								<div class="bd-promos">
								
									<span class="list-change theme-login">编辑</span>
								</div>
							</div>
							<div class="clear"></div>
							<form action="{{url('home/shopcat')}}" method="post">
							{{ csrf_field() }}

							<div class="bundle-main">

					

							 @foreach($goods as $v)
						@if($v)



								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check checkprice" name="qian[]" value="{{$v->price}},{{$v->id}}" type="checkbox" onclick="dianji({{$v->id}})" />
								
								
								
											<label for="J_CheckBox_170037950254"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="{{url('home/showUsers').'/'.$v->uid}}" target="_blank" data-title="{{ $v->shopname }}" class="J_MakePoint" data-point="tbcart.8.12">
												<img style="width:100px;height:100px" src="{{url('home/uplodas').'/'.$v->image }}" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="美康粉黛醉美唇膏 持久保湿滋润防水不掉色" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $v->shopname }}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line">颜色：{{ $v->color }}</span>
									<span class="sku-line">点赞量：{{ $v->good }}</span>
											
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original">{{ $v->reprice }}.00</em>
												</div>
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0">{{ $v->price }}.00</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													1
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" class="J_ItemSum number">{{ $v->price }}</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
								
                  						<!-- <form id="myform" action="" method="post" style="display:none">
										{{ csrf_field() }}

										{{ method_field('DELETE') }}
                  						</form> -->
											<a href="{{url('home/shopcat').'/'.$v->id}}/edit" data-point-url="#" class="delete">
                  删除</a>
										</div>
									</li>
								</ul>
								@endif
								@endforeach
						

								<script type="text/javascript">
								//删除商品
									var myform = document.getElementById('myform');
									function fun(id){
										if(confirm('你确定要删除吗?')){
											var url = "{{url('home/shopcat')}}";
											myform.action = url+'/'+id;
											myform.submit();

										}
									}
								

								</script>
								
								
								
								
								
							</div>
						</div>
					</tr>
					<div class="clear"></div>

					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="bundle-hd">
								<div class="bd-promos">
									
									
								</div>
							</div>
							<div class="clear"></div>
							
						</div>
					</tr>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							
						</div>
						<button onclick="doselect(true)">全选</button>
						<script type="text/javascript">
							// 获取所有需要的Input对象
					var list = document.getElementsByTagName('input');
					
    					function doselect(a)
    				{   
    					
    					for(var i = 0; i < list.length; i++)
    					{
    						if(a){
    			//取反之后把结果赋给原来的对象
    							list[i].checked = a;

    							}
    						
    					}
    				var pri =	$("input:checked");
    				var c = 0;
    			
    					  $(function(){
       				 pri.each(function(){
           				 var id = $(this).val();
            // 这里实现你的方法
            		c += parseInt(id)
            			// console.log(id);
       					 })
    });
 				var x = pri.size();
    				 $(".price").html(c);
    				$("#J_SelectedItemsCount").html(x) ;

   					}
   				
   		//当点击时触动dianji方法获取点击的对象，循环出点击val值，+赋值给空对象的和赋值显示出来。
 
   			function dianji(id){
   			
   				// console.log(id);
   				 	var a= 0; 
   				 //获取选中时的对象
   				 var pri =	$("input:checked");
   				var x = pri.size();
    	 $(function(){
       				 pri.each(function(){
           				 var ob = $(this).val();
            // 这里实现你的方法
            		a += parseInt(ob)
            			// console.log(id);
       					 })
    			});

   	           var he = $(".price").html(a);
   	           $("#J_SelectedItemsCount").html(x) ;
   			}

						</script>
					</div>
					
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">0.00</em></strong>
						</div>
						<div class="btn-area">
							
								<input  class="btn-area submit-btn submit-btn-disabled" type="submit" value="结算">
						</div>
					</div>
				</form>
				</div>
					
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
						</p>
					</div>
				</div>

			</div>

			<!--操作页面-->

			<div class="theme-popover-mask"></div>

			<div class="theme-popover">
				<div class="theme-span"></div>
				<div class="theme-poptit h-title">
					<a href="javascript:;" title="关闭" class="close">×</a>
				</div>
				<div class="theme-popbod dform">
					
				</div>
			</div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="/"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li class="active"><a href="{{url('home/shopcat')}}"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="{{asset('home/person')"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>