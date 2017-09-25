@extends('home.person')
	@section('centent')
<div class="main-wrap">
				
					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
								@foreach($res as $v)
							<li class="user-addresslist defaultAddr">
							
								<span class="new-option-r"><i class="am-icon-check-circle"></i>
								<a href="{{ url('home/xuan').'/'.$v->id}}" ">默认地址</a></span>

								
								<p class="new-tit new-p-re">
									<span class="new-txt">{{ $v->name }}</span>
									<span class="new-txt-rd2">{{ $v->phone }}</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">{{ $v->hotadd}}</span>
										
								</div>
								<div class="new-addr-btn">
									<a href="{{ url('/home/del')}}" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
								</div>
										
											
							</li>
							@endforeach	
						
							
						</ul>
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>
										@if (session('msg'))
					    					<div  style="color:red;" class="alert alert-success">
					        				{{ session('msg') }}
					   						</div>
											@endif						
								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action="{{ url('/home/addre')}}" method="post">
											{{ csrf_field() }}

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name"  name="name" placeholder="收货人">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
											<input type="text" id="user-name"  name="phone" placeholder="收货人">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">地址</label>
											<div class="am-form-content address">
												<input type="text" id="user-name"  name="hotadd" placeholder="详细地址">
											
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<button>保存</button>
											
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
							var lid = document.getElementById('lid');
							function doDel(ob)
							{
							//通过表格去删除指定位置的行（通过删除按钮的父级td的父级tr）
							lid.delete(ob.parentNode.parentNode.rowIndex);
							}
					
					</script>


					<div class="clear"></div>

				</div>
				<!--底部-->
				@endsection