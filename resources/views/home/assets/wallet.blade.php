@extends('home.person')
	@section('centent')
		<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户余额</strong> / <small>Account&nbsp;Balance</small></div>
						</div>
						<hr/>	
						@if (session('msg'))
					    					<div  style="color:red;" class="alert alert-success">
					        				{{ session('msg') }}
					   						</div>
											@endif							
						<div class="finance">
							<div class="financeText">
								<p>可用余额:<span>¥{{ $list->money }}</span></p>
								<a href="">安全中心：保护账户资产安全</a>
								<form action="{{ url('/home/money') }}" method="post">
								{{ csrf_field() }}
								账户充值：<input name="money" placeholder="请输入要充值的金额">
											  <input type="hidden" name="ctime" value="{{ time() }}">
											  <input type="hidden" name="event" value="充值">
											  <input type="hidden" name="uid" value="{{ session('adminuser')->id }}">
								<button>充值</button>
								</form>
							</div>
							<div class="financeTip">
								<img src="{{ ('images/Balance.png') }}" />
								<a href="{{ url('home/walletList') }}">查看账户明细</a>
								<p>提示：余额是您在本商城的一个账户，如账户内有款项，下单时可以直接勾选使用，抵消部分总额，方便快捷安全高效。</p>
							</div>
						</div>
				</div>
	@endsection