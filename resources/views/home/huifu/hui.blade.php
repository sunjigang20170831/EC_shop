@extends('home.person')
	@section('centent')
				<div class="main-wrap">
			
					
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">留言信息</strong> / <small>Electronic&nbsp;bill</small></div>
					</div>
					<hr>
					<div class="finance">
						<p style="color:red;">您尚未发布产品或您的产品尚未被留言</p>
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
						
							
							<li class="cost">
								<div class="time">
									
									<p class="text-muted">
									</p>
								</div>
								<div class="time">
									<p class="content">
										
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">
									
								
									</span>
								</div>
								<div class="amount">
									
									
									
								</div>
								<div class="balance">
								

								</div>
							</li>
						
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