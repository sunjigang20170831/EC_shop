@extends('home.parentShop')
    @section('centent')
				
				<script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							
						</div>
					</section>
				</div>

				<!--放大镜-->

				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>

							<div class="tb-booth tb-pic tb-s310">
								<a href="{{url('home/uplodas').'/'.$list->image}}"><img src="{{url('home/uplodas').'/'.$list->image}}" alt="细节展示放大镜特效" rel="{{url('home/uplodas').'/'.$list->image}}" class="jqzoom" style="height:350px;width:300px" /></a>
							</div>
							
						</div>

						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1>	
				 {{$list->shopname}}
	          </h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
									<dt>促销价</dt>
									<dd><em>¥</em><b class="sys_item_price"> {{$list->price}}</b>  </dd>                                 
								</li>
								<li class="price iteminfo_mktprice">
									<dt>原价</dt>
									<dd><em>¥</em><b class="sys_item_mktprice"> {{$list->reprice}}</b></dd>									
								</li>
								<div class="clear"></div>
							</div>

							<!--地址-->
							
							<div class="clear"></div>

							<!--销量-->
							<ul class="tm-ind-panel">
							@if (session('msg'))
					    <div class="alert alert-success" style="color:red">
					        {{ session('msg') }}
					    </div>
					@endif
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon"><span class="tm-label"><a href="{{url('home/goodshops').'/'.$list->id}}" id="dianzhan">点赞</a></span><span class="tm-count">{{$list->good}}</span></div>
								</li>
							
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>

									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">
											<form class="theme-signin" name="loginform" action="" method="post">

												<div class="theme-signin-left">

													<div class="theme-options">
														<div class="cart-title">参数</div>
														<ul>
															
															<li class="sku-line">八成新<i></i></li>
																<li class="sku-line">六成新<i></i></li>
																<li class="sku-line">{{$list->color}}<i></i></li>
																	<li class="sku-line">发布时间：{{date('Y-m-d H:i:s',($list->time))}}<i></i></li>

														</ul>
													</div>
													
													
													<div class="clear"></div>

													<div class="btn-op">
														<div class="btn am-btn am-btn-warning">确认</div>
														<div class="btn close am-btn am-btn-warning">取消</div>
													</div>
												</div>
												<div class="theme-signin-right">
													<div class="img-info">
														<img src="{{url('home/uplodas').'/'.$list->image}}" />
													</div>
													
												</div>

											</form>
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">店铺优惠</dt>
									<div class="gold-list">
										<p>新品倒卖。低价出售<span>点击领券<i class="am-icon-sort-down"></i></span></p>
									</div>
								</div>
								<div class="clear"></div>
								<div class="coupon">
									<dt class="tb-metatit">优惠券</dt>
									<div class="gold-list">
										<ul>
											<li>125减5</li>
											<li>198减10</li>
											<li>298减20</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="pay">
							<div class="pay-opt">
							<a href="/"><span class="am-icon-home am-icon-fw">首页</span></a>
							<a><span class="am-icon-heart am-icon-fw">收藏</span></a>
							
							</div>
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="{{url('home/goumai').'/'.$list->id}}">立即购买</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="LikBasket" title="加入购物车" href="{{url('home/shopcat').'/'.$list->id}}"><i></i>加入购物车</a>
								</div>
							</li>
						</div>

					</div>

					<div class="clear"></div>

				</div>

				<!--优惠套装-->
				<div class="match">
					<div class="match-title">店主其它商品</div>
					<div class="match-comment">
						<ul class="like_list">
						 @foreach($arr as $v)


							<li>
								<div class="s_picBox">
									<a class="s_pic" href="{{ url('home/details').'/'.$v->id }}"><img src="{{url('home/uplodas').'/'.$v->image}}" style="height:120px;width:130px;"></a>
								</div> <a class="txt" target="_blank" href="#">{{$v->shopname}}</a>
								<div class="info-box"> <span class="info-box-price">{{$v->price}}</span> <span class="info-original-price">{{$v->reprice}}</span> </div>
							</li>
							<li class="plus_icon"><i>+</i></li>
							
							
							@endforeach
						</ul>
					</div>
				</div>
				<div class="clear"></div>
				
							
				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						     <ul>					    
						     	<div class="mt">            
						            <h2>其它精品推荐</h2>        
					            </div>
					            
						     	 @foreach($hot as $h)
						     	 @if($h)
							      <li class="first">
							      	<div class="p-img">                    
							      		<a  href="{{ url('home/details').'/'.$h->id }}"> <img class="" src="{{url('home/uplodas').'/'.$h->image}}" style="height:150px"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		{{$h->shopname}}
							      	</a>
							      	</div>
							      	<div class="p-price"><strong> <span class="info-box-price">{{$h->price}}</span> <span class="info-original-price">{{$h->reprice}}</span> </strong></div>
							      </li>
							      	@else
							      	没有热卖的商品
							      	@endif	      
					      @endforeach
					      
						     </ul>					
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
						
							<div class="am-tabs-bd">

								<div class="am-tab-panel am-fade am-in am-active">
									<div>
									
								  <h1 style="color:blue;font-size:25px">留&nbsp;言&nbsp;板</h1>
								  
								    @foreach($li as $p)
								    @if($p->sid==$list->id)
										<span class="info-box-price"><p>{{ date("Y-m-d H:i:s",$p->time) }}&nbsp;&nbsp;&nbsp;
										{{$p->name}}:	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		 {{ $p->byliuyan }}</p></span>
									
									@endif

								@endforeach
								
									<form action="{{ url('home/liuyan') }}" method="post">
									{{ csrf_field() }}
										<input type="hidden" value="{{ $list->id }}" name="sid">
										<input type="hidden" value="{{ time()}}" name="time">
										<input type="hidden" value="{{ $list->uid}}" name="fid">
										<input type="hidden" value="{{ $list->shopname}}" name="sname">
										<textarea name="byliuyan" cols ="100" rows = "10" ></textarea>
										<br><button>提交留言</button>
									</form>	
							</div>		

								<div class="am-tab-panel am-fade">
									
                                    <div class="actor-new">

                                    	<div class="rate">                
                                    	
                                    </div>	
                                    <div class="clear"></div>
								
									<div class="clear"></div>

									<ul class="am-comments-list am-comments-list-flip">
										<li class="am-comment">
											
												<!-- 评论内容 -->
											</div>
										</li>
										
										
									
									</ul>

									<div class="clear"></div>

								
									<div class="clear"></div>

								
								</div>

								<div class="am-tab-panel am-fade">
									<div class="like">
										<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
											<?php echo $list->content; ?>
										</ul>
									</div>
									<div class="clear"></div>
									
							     <h1 style="color:blue;font-size:25px">回&nbsp;复&nbsp;墙</h1>
									@foreach($hi as $z)
									@if($z->sid==$list->id)
									<span class="info-box-price"><p>{{ date("Y-m-d H:i:s",$z->time) }}&nbsp;&nbsp;&nbsp;
										{{$z->name}}:回复了：{{$z->lname}}的消息：	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		 {{ $z->reply }}</p></span>
										@endif
									@endforeach

									<!--分页 -->
									
									<div class="clear"></div>

								</div>

							</div>

						</div>		
							
						<div class="clear"></div>
						@endsection