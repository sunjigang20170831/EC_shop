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
								
								
							</div>

							<div class="order-main">

								<div class="order-status3">
									
									<div class="order-content">
										<div class="order-left">
										 @foreach($ob as $v)
											@if($v)
				
											
											<ul class="item-list">
												<li class="td td-item">
													<div class="item-pic">
														<a href="{{ url('home/shops/show').'/'.$v->id }}" class="J_MakePoint">
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
														@if($v->status == 3)
														买家已发货
														@elseif($v->status == 2)
														买家正在发货
														@else($v->status == 1)
														未支付
														@endif
													</div>
												</li>
												
											</ul>
										@endif
										@endforeach

										</div>
									
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
				
@endsection