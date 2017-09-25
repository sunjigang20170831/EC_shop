@extends('home.person')
	@section('centent')
				<div class="main-wrap">

					<div class="user-collection">
						<!--标题 -->

					@if (session('msg'))
					    <div class="alert alert-success">
					        {{ session('msg') }}
					    </div>
					@endif
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的商店</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr/>

						<div class="you-like">
							<div class="s-bar">
								正在热卖
								<a class="am-badge am-badge-danger am-round" href="{{url('home/shops').'/'.session('adminuser')->id}}">热卖</a>
								<a class="am-badge am-badge-danger am-round" href="{{url('home/shopsNo').'/'.session('adminuser')->id}}">未审核</a>
							</div>
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
										</div>
										<div class="s-tp">
										<a href="{{url('home/shops').'/'.$v->id.'/'.'edit'}}">
											<span class="ui-btn-loading-before">修改</span></a>
											<form id="myform" action="" method="post" style="display:none">
													{{ csrf_field() }}
				
											{{ method_field('DELETE') }}
											</form>
											<a href="javascript:fun({{$v->id}})">
											<span class="ui-btn-loading-before">删除</span></a>
											<i class="am-icon-shopping-cart"></i>
											<script type="text/javascript">
											var myfrom = document.getElementById('myform');
											function fun(id){
												if(confirm('确定删除？')){
													var url = "{{url('home/shops')}}"
													myform.action = url+'/'+id;
													myform.submit();
												}
											}
											</script>
											
										</div>
									</div>
								</div>
							@endforeach
							</div>
							
							{!! $list->render() !!}

						</div>

					</div>

				</div>
				<!--底部-->
				 
					@endsection