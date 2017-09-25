@extends('home.person')
	@section('centent')
				<div class="main-wrap">
				@if (session('msg'))
					    <div class="alert alert-success" style="color:red">
					        {{ session('msg') }}
					    </div>
					@endif
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">商家信息</strong> / <small>Electronic&nbsp;bill</small></div>
					</div>
					<hr>
					<div class="finance">
						
					</div>

					<!--交易时间	-->

					<div class="order-time">
						
						<div class="clear"></div>
					</div>

					<div class="walletList">

						<div class="walletTitle">
							<li class="time">商家ID</th>
								<li class="name">注册时间</th>
									<li class="amount">有无商店</th>

										<li class="balance">操作</th>
						</div>
						<div class="clear"></div>
						<div class="walletCont">
						 @foreach($list as $v)

							<li class="cost">
								<div class="time">
									
									<p class="text-muted"> {{ $v->id }}
									</p>
								</div>
								<div class="title name">
									<p class="content">
										{{date('Y-m-d H:i:s',($v->utime))}}
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">{{ ($v->status)? '有' : '无' }}</span>
								</div>
								<div class="balance">
								
									<a href="{{url('home/showUsers').'/'.$v->id}}"><em>进入他的商店</em></a>
							
								</div>
							</li>
							@endforeach
						</div>
						
						<!--分页-->
						<ul class="am-pagination am-pagination-right">
							<li class="am-disabled"> {!! $list->render() !!}</li>
						</ul>

					</div>

				</div>
			
				<!--底部-->
				 
					@endsection