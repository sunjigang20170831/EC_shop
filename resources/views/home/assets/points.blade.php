@extends('home.person')
	@section('centent')

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="points" style='background:#fff'>
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的积分</strong> / <small>My&nbsp;Point</small></div>
						</div>
						@if (session('msg'))
                        <div class="alert alert-success" style="color:red;">
                            {{ session('msg') }}
                        </div>
                    	@endif
						<hr/>
						<div class="pointsTitle">
						   	<div class="usable">可用积分<span>{{$users->jifen}}</span></div>
						   	<div class="pointshop"><a href="#"><i><img src="{{asset('home/images/u5.png')}}" /></i>积分商城</a></div>
						  	<form action="" method='post' style='display:none' name='myform'>
						   		{{ csrf_field() }}
						   		<input type="hidden" value="每日签到" name='event'>
								<input type="hidden" value="+5" name='point'>
								<input type="hidden" value="{{ time() }}" name='time'>

						   	</form>
						   
						   		<div class="signIn"><a href="javascript:doSign({{ session('adminuser')->id }})"><i class="am-icon-calendar"></i><em>+5</em>每日签到</a>
								
						   		</div>
						   	
						</div>
						<div class="pointlist am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active" style='background:#fff'><a href="#tab1">全部</a></li>
								
								<li style='background:#fff'><a href="#tab3">支出</a></li>
							</ul>
							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<table>
										<b></b>
										<thead>
											<tr>												
												<th class="th1">积分详情</th>
												<th class="th2">积分变动</th>
												<th class="th3">日期</th>
											</tr>
										</thead>										
										<tbody>
										@foreach ($list as $v)
											<tr>
												<td class="pointType">{{ $v->event }}</td>
												<td class="pointNum">{{ $v->point }}</td>
												<td class="pointTime">{{ date('Y-m-d H:i:s', $v->time) }}</td>
											</tr>
										@endforeach	
										</tbody>
									</table>
									{!! $list->render() !!}
								</div>
								<div class="am-tab-panel am-fade" id="tab2">
									
								</div>
								<div class="am-tab-panel am-fade" id="tab3">
									<table>
										<b></b>
										<thead>
											<tr>												
												<th class="th1">积分详情</th>
												<th class="th2">消耗积分</th>
												<th class="th3">日期</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="pointType">积分兑换</td>
												<td class="pointNum">-300</td>
												<td class="pointTime">2016-03-10&nbsp15:27</td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>

						</div>
					</div>
				</div>
				<script>
				 function doSign(id)
                    {
                        if(confirm('你确定要签到吗？')){
                            var form = document.myform;
                            var url = "{{ url('home/points') }}";
                            form.action = url;
                            form.submit();
                        }
                    }
                </script>
@endsection