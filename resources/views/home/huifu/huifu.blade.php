@extends('home.person')
	@section('centent')
				<div class="main-wrap">
			
					
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">留言信息</strong> / <small>Electronic&nbsp;bill</small></div>
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
							<li class="time">留言时间</th>
							<li class="time">留言内容</th>
								<li class="balance">昵称</th>
								
							
								<li class="balance">商品</th>
									<!--<li class="amount">昵称</th>-->
										<li class="balance">回复</th>
						</div>
						<div class="clear"></div>
						
						<div class="walletCont">
						 @foreach($li as $v)
							
							<li class="cost">
								<div class="time">
									
									<p class="text-muted">
								{{date('Y-m-d H:i:s',($v->time))}}	</p>
								</div>
								<div class="time">
									<p class="content">
									{{$v->byliuyan}}	
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">
									
								{{ $v->name}}
									</span>
								</div>
								<div class="amount">
									<span class="amount-pay">
									{{ $v->sname }}
									</span>
								</div>
								<div class="balance">
								<form action="{{ url('home/huif')}}" method="post" id="fm" >
									{{ csrf_field() }}
										<input type="hidden" value="{{$v->sid}}" name="sid">
										<input type="hidden" value="{{time()}}" name="time">
										<input type="hidden" value="{{$v->uid}}" name="uid">
										<input type="hidden" value="{{$v->name}}" name="lname">
										<textarea  name="reply" cols ="15" rows = "1" ></textarea>
										<br>
										<button onclick='show("none")'>提交回复</button>
						</form>	

								</div>
							</li>
						@endforeach
						</div>
						
						<script>
							var fm = document.getElementById('fm');
							
							 function show (a)
							{
								fm.style.display = a;
							}
						</script>

						<!--分页-->
						<ul class="am-pagination am-pagination-right">
							<li class="am-disabled"> </li>
						</ul>

					</div>

				</div>
			
				<!--底部-->
				 
					@endsection