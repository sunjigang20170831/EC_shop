@extends('home.person')
	@section('centent')
		<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账单明细</strong> / <small>Electronic&nbsp;bill</small></div>
					</div>
					<hr>
					<div class="finance">
						<div class="financeText">
							<p>可用余额:<span>¥{{ $li->money }}</span></p>
							<p>账户状态:<span>有效</span></p>
							<a href="safety.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;安全中心：保护账户资产安全</a>
						</div>
					</div>

					<!--交易时间	-->

					<div class="order-time">

						<label class="form-label">详情查询：</label>
						<div class="show-input">
						<form action="{{ url('/home/sele')}}">
							<input type="text" name="event">
							<button>查询</button>
						</form>
						</div>
						<div class="clear"></div>
					</div>

					<div class="walletList">

						<div class="walletTitle">
							<li class="time">创建时间</th>
								<li class="name">详情</th>
									<li class="amount">金额</th>
										<li class="balance">余额</th>
						</div>
						<div class="clear"></div>
						<div class="walletCont">
						@foreach($list as $v)

							<li class="cost">
							
								<div class="time">
									<p>{{ date("Y-m-d H:i:s",$v->ctime) }}  
									</p>
									<p class="text-muted">
									</p>
								</div>
								<div class="title name">
									<p class="content">
										{{ $v->event }}
									</p>
								</div>

								<div class="amount">
									<span class="amount-pay">{{ $v->money }}</span>
								</div>
								<div class="balance">
									<span>余额：</span><em>{{ $v->ye }}</em>
								</div>
							</li>
						@endforeach	
							
							
						</div>
						
						<!--分页-->
						<ul class="am-pagination am-pagination-right">
							<li class="am-disabled"><a href="#">&laquo;</a></li>
							
							<li>{!! $list->render() !!}</li>
							<li><a href="#">&raquo;</a></li>
						</ul>

					</div>

				</div>
			
@endsection