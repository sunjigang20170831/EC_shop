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
						<li class="amount">标题</th>
								<li class="name">发表时间</th>
									<li class="amount">发表人</th>

						</div>
						<div class="clear"></div>
						<div class="walletCont">
						 @foreach($news as $v)

							<li class="cost">
								<div class="time">
									<a href="{{url('home/news').'/'.$v->id}}">
									<p class="text-muted"> {{$v->title}}
									</p></a>
								</div>
								<div class="title name">
									<p class="content">
										{{date('Y-m-d H:i:s',($v->time))}}
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">{{$v->name}}</span>
								</div>
								
							</li>
							@endforeach
						</div>
						
						<!--分页-->
						<ul class="am-pagination am-pagination-right">
							<li class="am-disabled"> {!! $news->render() !!}</li>
						</ul>

					</div>

				</div>
			
				<!--底部-->
				 
					@endsection