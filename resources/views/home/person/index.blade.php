﻿		@extends('home.person')
		@section('centent')
				<div class="main-wrap">
					<div class="wrap-left">
						<div class="wrap-list">

							<div class="box-container-bottom"></div>

							<!--订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>我的订单
									<a class="i-load-more-item-shadow" href="order.html">全部订单</a>
								</div>
								<ul>
									<li><a href="order.html"><i><img src="{{asset('home/images/pay.png')}}"/></i><span>待付款</span></a></li>
									<li><a href="order.html"><i><img src="{{asset('home/images/send.png')}}"/></i><span>待发货<em class="m-num">1</em></span></a></li>
									<li><a href="order.html"><i><img src="{{asset('home/images/receive.png')}}"/></i><span>待收货</span></a></li>
									<li><a href="order.html"><i><img src="{{asset('home/images/comment.png')}}"/></i><span>待评价<em class="m-num">3</em></span></a></li>
									<li><a href="change.html"><i><img src="{{asset('home/images/refund.png')}}"/></i><span>退换货</span></a></li>
								</ul>
								
 											@foreach($goods as $g)

										
									
								<div class="orderContentBox">
									<div class="orderContent">
										<div class="orderContentpic">
											<div class="imgBox">
												<a href=""><img src="{{asset('home/uplodas').'/'.$g->image}}"></a>
											</div>
										</div>
										<div class="detailContent">
											<a href="orderinfo.html" class="delivery">派件</a>
											<div class="orderID">
												<span class="time">{{ date('Y-m-d H:i:s',($g->time)) }}</span>
												
												
											</div>
											<div class="orderID">
												<span class="num">共1件商品</span>
											</div>
										</div>
										<div class="state">已发货</div>
										<div class="price"><span class="sym">¥</span>{{ $g->reprice}}</div>

									</div>
									<a href="javascript:void(0);" class="btnPay">再次购买</a>
								</div>
								@endforeach
							</div>
							<!--九宫格-->
							<div class="user-squaredIcon">
								<div class="s-bar">
									<i class="s-icon"></i>我的常用
								</div>
								<ul>
									<a href="">
										<li class="am-u-sm-4"><i class="am-icon-truck am-icon-md"></i>
											<p>物流查询</p>
										</li>
									</a>
									<a href="">
										<li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i>
											<p>我的收藏</p>
										</li>
									</a>
									<a href="">
										<li class="am-u-sm-4"><i class="am-icon-paw am-icon-md"></i>
											<p>我的足迹</p>
										</li>
									</a>
									<a href="#">
										<li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i>
											<p>为你推荐</p>
										</li>
									</a>
									<a href="">
										<li class="am-u-sm-4"><i class="am-icon-share-alt am-icon-md"></i>
											<p>我的分享</p>
										</li>
									</a>
									<a href="">
										<li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i>
											<p>限时活动</p>
										</li>
									</a>

								</ul>
							</div>

							<div class="user-suggestion">
								<div class="s-bar">
									<i class="s-icon"></i>会员中心
								</div>
								<div class="s-bar">
									<a href="suggest.html"><i class="s-icon"></i>意见反馈</a>
								</div>
							</div>

							<!--优惠券积分-->
							<div class="twoTab">
								<div class="twoTabModel Coupon">
									<h5 class="squareTitle"><a href="#"><span class="splitBorder"></span>优惠券<i class="am-icon-angle-right"></i></a></h5>
									<div class="Box">
										<div class="CouponList">
											<span class="price">¥<strong class="num">50</strong></span>
	                                        <p class="brandName"><a href="#">ABC品牌499减50</a></p>
	                                        <p class="discount">满<span>499</span>元抵扣</p>
                                            <a  href="#" class="btnReceive">立即领取</a>
										</div>
									</div>
								</div>
								<div class="twoTabModel credit">
									<h5 class="squareTitle"><a href="#"><span class="splitBorder"></span>积分商城<i class="am-icon-angle-right"></i></a></h5>
									<div class="Box">
										<p class="countDown">
											<span class="hour">12</span>：<span class="minute">09</span>：<span class="second">02</span><em class="txtStart">即将开始</em>
										</p>
										<div class="am-slider am-slider-default am-slider-carousel" data-am-flexslider="{itemWidth:108, itemMargin:3, slideshow: false}">
											<ul class="am-slides">
												<li><a href="#"><img src="{{asset('home/images/333.jpg')}}" /></a></li>
												<li><a href="#"><img src="{{asset('home/images/222.jpg')}}" /></a></li>
												<li><a href="#"><img src="{{asset('home/images/111.jpg')}}" /></a></li>
												<li><a href="#"><img src="{{asset('home/images/333.jpg')}}" /></a></li>
												<li><a href="#"><img src="{{asset('home/images/222.jpg')}}" /></a></li>
												<li><a href="#"><img src="{{asset('home/images/111.jpg')}}" /></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="wrap-right">

						<!-- 日历-->
						<div class="day-list">
							<div class="s-title">
								每日新鲜事
							</div>
							<div class="s-box">
								<ul>
									<li><a><p>粮油冲锋周 满128减18</p></a></li>
									<li><a><p>防晒这么重要的事怎能随意</p></a></li>
									<li><a><p>春日护肤面膜不可少，你选对了吗？</p></a></li>
									<li><a><p>纯粹时尚，摩登出游，吸睛美衣</p></a></li>
									<li><a><p>粮油冲锋周 满128减18</p></a></li>
									<li><a><p>春日护肤面膜不可少，你选对了吗？</p></a></li>									
								</ul>
							</div>
						</div>
						<!--新品 -->
						<div class="new-goods">
							<div class="s-bar">
								<i class="s-icon"></i>今日新品
								<a class="i-load-more-item-shadow">15款新品</a>
							</div>
							<div class="new-goods-info">
								<a class="shop-info" href="#">
									<div class="face-img-panel">
										<img src="{{asset('home/images/imgsearch1.jpg')}}" alt="">
									</div>
									<span class="new-goods-num ">4</span>
									<span class="shop-title">剥壳松子</span>
								</a>
								<a class="follow">收藏</a>
							</div>
						</div>						

						<!--热卖推荐 -->
						<div class="new-goods">
							<div class="s-bar">
								<i class="s-icon"></i>热卖推荐
							</div>
							<div class="new-goods-info">
								<a class="shop-info" href="#" target="_blank">
									<div >
										<img src="{{asset('home/images/666.jpg')}}" alt="">
									</div>
                                    <span class="one-hot-goods">￥189.60</span>
								</a>
							</div>
						</div>						
     				</div>
     				<div class="clear"></div>
     				
     				<!--收藏和足迹-->
     				 <div data-am-widget="tabs" class="am-tabs collection">
                         <ul class="am-tabs-nav am-cf">
                         	<li class="am-active"><a href="[data-tab-panel-0]"><i class="am-icon-heart"></i>商品收藏</a></li>
                            <li class=""><a href="[data-tab-panel-1]"><i class="am-icon-paw"></i>购物足迹</a></li>
                        </ul>
                        <div class="am-tabs-bd">

                            <div data-tab-panel-0 class="am-tab-panel am-active">
                        		<div class="am-slider am-slider-default am-slider-carousel" data-am-flexslider="{itemWidth:155,slideshow: false}">
									<ul class="am-slides">
									 @foreach($shop as $s)

							
                                       <li>
                                       	  <a><img class="am-thumbnail" src="{{asset('home/uplodas').'/'.$s->image}}" /></a>
                                       	  <strong class="price">¥{{$s->price}}</strong>
                                       </li>
                                      
									@endforeach
									</ul>
								</div>
                            </div>
                            <div data-tab-panel-1 class="am-tab-panel "> 
                        		<div class="am-slider am-slider-default am-slider-carousel" data-am-flexslider="{itemWidth:155, slideshow: false}">
									<ul class="am-slides">
                                     @foreach($shop as $s)
                                       <li>
                                       	  <a><img class="am-thumbnail" src="{{asset('home/uplodas').'/'.$s->image}}" /></a>
                                       	  <strong class="price">¥{{$s->price}}</strong>
                                       </li>
                                       @endforeach
									</ul>
								</div>                            	
                            </div>
                        </div>
                     </div>


				</div>
				@endsection