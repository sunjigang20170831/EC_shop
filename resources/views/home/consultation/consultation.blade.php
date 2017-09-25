@extends('home.person')
	@section('centent')

<div class="main-wrap">
					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">商品咨询</strong> / <small>Commodity&nbsp;Consultation</small></div>
					</div>
					@if (session('msg'))
					    					<div  style="color:red;font-size:15px;" class="alert alert-success">
					        				{{ session('msg') }}
					   						</div>
											@endif	
					<hr/>
					<form action="{{ url('/home/suggest')}}" method="post">
					{{ csrf_field()}}
					<div class="suggestmain">
						<p>咨询问题分类：</p>
						<div class="suggestlist">
							<select data-am-selected name="problem">
								<option value="a" selected>请选择问题类型</option>
								<option value="产品问题">产品问题</option>
								<option value="促销问题">促销问题</option>
								<option value="支付问题">支付问题</option>
								<option value="退款问题">退款问题</option>
								<option value="配送问题">配送问题</option>
								<option value="售后问题">售后问题</option>
								<option value="发票问题">发票问题</option>
								<option value="退换货">退换货</option>
								<option value="其他">其他</option>
							</select>
						</div>
						<div class="suggestDetail">
						<br/>
						<br/>
						<br/>
						<input type="hidden" name="time" value="{{time()}}">
							<p>描述问题：</p>
							<blockquote class="textArea">
								<textarea name="content" id="say_some" cols="60" rows="5" autocomplete="off" placeholder="在此描述您的意见具体内容"></textarea>
								<div class="fontTip"><i class="cur">0</i> / <i>200</i></div>
							</blockquote>
						</div>
						<div>
						<button class="am-btn am-btn-danger anniu">提交</button>
						</div>
						</form>
						<p class="suggestTel"><i class="am-icon-phone"></i>客服电话：400-007-1234</p>
					</div>
				</div>
					@endsection