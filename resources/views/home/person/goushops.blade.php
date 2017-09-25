@extends('home.person')
	@section('centent')
				<div class="main-wrap">

					<div class="user-collection">
						<!--标题 -->

					@if (session('msg'))
					    <div class="alert alert-success" style="color:red;">
					        {{ session('msg') }}
					    </div>
					@endif
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">买到的商品</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr/>

						<div class="you-like">
							<div class="s-bar">
								买到的商品
								
							</div>
							<form id="myform" action="" method="post" style="display:none">
								{{ csrf_field() }}
										
								{{ method_field('DELETE') }}

							</form>
							<div class="s-content">
							 @foreach($list as $v)



								<div class="s-item-wrap">
									<div class="s-item">
										<div class="s-pic">
											<a href="{{url('home/shops/show').'/'.$v->id}}" class="s-pic-link">
												<img src="{{asset('/home/uplodas/').'/'.$v->image}}" alt="{{$v->shopname}}" title="{{$v->shopname}}" class="s-pic-img s-guess-item-img" height="350">
											</a>
										</div>
										
										<div class="s-info">
											<div class="s-title"><a href="#" title="{{$v->shopname}}">{{$v->shopname}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->reprice}}</em></span>
											</div>
											<div class="s-title">发布时间：{{date('Y-m-d H:i:s', $v->time)}}</div>
											<div class="s-title">点赞数量：{{$v->good}}</div>
											<div class="s-title">买家id：{{$v->mid}}</div>
										</div>
										<div class="s-tp">
										<a href='javascript:Del({{$v->id}})'>
											<span class="ui-btn-loading-before">删除信息</span></a>
											<i class="am-icon-shopping-cart"></i>
											
											
										</div>
										<script>
										var myform = document.getElementById('myform');
										function Del(id){
											if(confirm('确定要删除这条商品吗？')){
												var url = "{{url('home/shops')}}" ;
												myform.action = url+'/'+id;
												myform.submit();
										
											
											}
										}
										</script>
									</div>
								</div>
							@endforeach
							</div>
							
							

						</div>

					</div>

				</div>
				
				<!--底部-->
				 
					@endsection