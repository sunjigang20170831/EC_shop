@extends('home.person')
	@section('centent')

			<div class="main-wrap">

					<div class="user-orderinfo">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发货详情</strong> / <small>Order&nbsp;details</small></div>
						</div>
						<hr/>
						<!--进度条-->
						
						@if (session('msg'))
					    <div class="alert alert-success" style="color:red">
					        {{ session('msg') }}
					    </div>
					@endif
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
									<td class="td-inner">发货地址</td>
								</div>
								<div class="th th-number">
									<td class="td-inner">收货人</td>
								</div>
								<div class="th th-number">
									<td class="td-inner">收货人电话</td>
								</div>
								
								<div class="th th-number">
									<td class="td-inner">操作</td>
								</div>
							</div>

							<div class="order-main">

								<div class="order-status3">
									
									<div class="order-content">
										<div class="order-left">
										 @foreach($ob as $v)
											
										
											
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
														<span>1</span>
													</div>
												</li>
												<div class="item-info">
													
													</div>
													<li class="td td-number">
													<div class="item-number">
														<span>{{$v->xinxi->hotadd}}</span>
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number">
														<span>{{$v->xinxi->nickname}}</span>
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number">
														<span>{{$v->xinxi->phone}}</span>
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number">
														<a href="{{url('home/fahuo').'/'.$v->id}}"><span>确认发货</span></a>
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