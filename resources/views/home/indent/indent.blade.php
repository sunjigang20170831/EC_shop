@extends('home.person')
	@section('centent')

			<div class="main-wrap">

					<div class="user-orderinfo">
	@if (session('msg'))
					    <div class="alert alert-success" style="color:red">
					        {{ session('msg') }}
					    </div>
					@endif
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
						</div>
						<hr/>
						<!--进度条-->
						<div class="m-progress">
							<div class="m-progress-list">
								<span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <a href="{{url('home/indent')}}">
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">未支付</p></a>
                                </span>
								<span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <a href="{{url('home/indent/create')}}">
                                   <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                   <p class="stage-name">待发货</p>
                                </span>
								
								<span class="u-progress-placeholder"></span>
							</div>
							<div class="u-progress-bar total-steps-2">
								<div class="u-progress-bar-inner"></div>
							</div>
						</div>
						<div class="order-infoaside">
							<div class="order-logistics">
								<a href="logistics.html">
								
									<div class="latest-logistics">
									
									</div>
									<span class="am-icon-angle-right icon"></span>
								</a>
								<div class="clear"></div>
							</div>
								<div class="order-addresslist">
								<div class="order-address">
									<div class="icon-add">
									</div>
									<p class="new-tit new-p-re">
										<span class="new-txt">{{$dizhi->name}}</span>
										<span class="new-txt-rd2">{{$dizhi->phone}}</span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">收货地址：</span>
											
											<span class="street">{{$dizhi->hotadd}}</span></p>
											<span class="title"><a href="{{url('home/address')}}">编辑</a></span>
									</div>
								</div>
							</div>
						</div>
						<div class="order-infomain">

							<div class="order-top">
								<div class="th th-item">
									<td class="th th-number td-inner">编号</td>
								</div>
							
								<div class="th th-number">
									<td class="td-inner">成交时间</td>
								</div>
								
								<div class="th th-amount">
									<td class="td-inner">合计</td>
								</div>
								<div class="th th-status">
									<td class="td-inner">交易状态</td>
								</div>
								<div class="th th-change">
									<td class="td-inner">交易操作</td>
								</div>
							</div>

							<div class="order-main">

								<div class="order-status3">
								 @foreach($list as $u)
									<div class="order-title">
									



									
										<!--    <em>店铺：小桔灯</em>-->
									</div>
									<div class="order-content">
										<div class="order-left">
										
					@if (session('msg'))
					    <div class="alert alert-success" style="color:red">
					        {{ session('msg') }}
					    </div>
					@endif
											<ul class="item-list">
												<li class="td td-item">
													<div class="dd-num">订单编号：<a href="{{url('home/indent').'/'.$u->sid}}">{{ $u->order }}</a></div>
													
												</li>
												<li class="td td-price">
													<div class="item-price">
													<span>{{ date('Y-m-d H:i:s',($u->time)) }}</span></a>
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number">
														<span>×</span>1
													</div>
												</li>
												
											</ul>

								
										</div>
										<div class="order-right">
											<li class="td td-amount">
												<div class="item-amount">
													合计：{{$u->money}}
													<p>含运费：<span>10.00</span></p>
												</div>
											</li>
											<div class="move-right">
												<li class="td td-status">
													<div class="item-status">
														<p class="Mystatus">
														@if($u->status == 0)
														未支付
														@elseif($u->status == 1)
														支付成功等待发货
														@elseif($u->status == 2)
														待收货
														@endif
														</p>
														<p class="order-info"><a href="{{url('home/indent').'/'.$u->sid}}">查看订单</a></p>
														
													</div>
													<form id="myform" action="" method="post">
														{{ csrf_field() }}

													{{ method_field('PUT') }}

													</form>
												</li>
												<li class="td td-change">
													<div class="am-btn am-btn-green anniu">
														<a href="javascript:prom({{$u->id}})">确认支付</a></div>
												</li>
												<li class="td td-change">
													<div class="am-btn am-btn-danger anniu">
														<a href="{{url('home/indent').'/'.$u->id}}/edit">删除订单</a></div>
												</li>
											</div>
										</div>
									</div>
										@endforeach
								</div>
								{!! $list->render() !!}
								<script>
								function prom(id)
 
							{
 
    						var name=prompt("请输入您的密码","");//将输入的内容赋给变量 name ，
 								var myform = document.getElementById('myform');
    //这里需要注意的是，prompt有两个参数，前面是提示的话，后面是当对话框出来后，在对话框里的默认值
 
   										if(name == "{{session('adminuser')->pass}}")
    							{
 									var url = "{{url('home/indent')}}";
 									myform.action = url+'/'+id;
 									myform.submit();
       					  			alert("密码正确,等待支付")
 
     							}else{
     								alert('你输入的密码有误。')
     							}
 
								}
</script>
							</div>
						</div>
					</div>

				</div>
				
@endsection