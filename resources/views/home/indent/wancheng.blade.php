@extends('home.person')
	@section('centent')

			<div class="main-wrap">

					<div class="user-orderinfo">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
						</div>
						<hr/>
						<!--进度条-->
							<div class="m-progress-list">
								<span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <a href="{{url('home/shou')}}">
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">待查收</p></a>
                                </span>
								<span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <a href="{{url('home/wancheng')}}">
                                   <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                   <p class="stage-name">完成订单</p>
                                </span>
								
								<span class="u-progress-placeholder"></span>
							</div>
						
						<div class="order-infomain">

							<div class="order-top">
								<div class="th th-item">
									<td class="td-inner">商品</td>
								</div>
								<div class="th th-price">
									<td class="td-inner">单价</td>
								</div>
								<div class="th th-number">
									<td class="td-inner">数量</td>
								</div>
								<div class="th th-number">
									<td class="td-inner">操作</td>
								</div>
								
								
								
							</div>

							<div class="order-main">

								<div class="order-status3">
									
									<div class="order-content">
										<div class="order-left">
										 @foreach($list as $v)
											
				
											
											<ul class="item-list">
												<li class="td td-item">
													<div class="item-pic">
														<a href="{{ url('home/details').'/'.$v->id }}" class="J_MakePoint">
															<img src="{{url('home/uplodas').'/'.$v->image}}" class="itempic J_ItemImg">
														</a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="{{ url('home/details').'/'.$v->id }}">
																<p>{{$v->shopname}}</p>
																<p class="info-little">颜色：{{$v->color}}
																	<br/>点赞：{{$v->good}} </p>
															</a>
														</div>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price">
														{{$v->price}}.00
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number">
														@if($v->status == 4)
														完成此订单
														
														@endif
													</div>
												</li>
													<li class="td td-price">
													<div class="item-price">
														<a href="{{url('home/queren').'/'.$v->id}}">确认收货</a>
													</div>
												</li>
											</ul>

										@endforeach

										</div>
									
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
				
@endsection