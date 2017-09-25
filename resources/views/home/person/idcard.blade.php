@extends('home.person')
	@section('centent')
	

<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">实名认证</strong> / <small>Real&nbsp;authentication</small></div>
					</div>
					<hr/>
					<div class="authentication">
					
					
					<br>
						<p class="tip">请填写您身份证上的真实信息，以用于报关审核</p>
						<div class="authenticationInfo">
						@if (count($errors) > 0)
					    <div class="alert alert-danger" style="color:red;">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
							<p class="title">填写个人信息</p>

							<div class="am-form-group">
							<form action="{{ url('/home/idcard') }}" method="post" enctype="multipart/form-data" name="form">
							{{ csrf_field() }}
								<label for="user-name" class="am-form-label">真实姓名</label>
								<div class="am-form-content">
									<input type="text" id="user-name" placeholder="请输入您的真实姓名" name="pername">
								</div>

							</div>
							<div class="am-form-group">
								<label for="user-IDcard" class="am-form-label">身份证号</label>
								<div class="am-form-content">
									<input type="tel" id="user-IDcard" placeholder="请输入您的身份证信息" name="pernumber">
								</div>
								@if (session('shenfen'))
					    <div class="alert alert-success" style="color:red;">
					        {{ session('shenfen') }}
					    </div>
					@endif

							</div>
							<div class="am-form-group">
								<label for="user-IDcard" class="am-form-label">注册用途：</label>
							<textarea name="content"></textarea>

							</div>
							<div class="am-form-group">
								
							</div>
						</div>
						<div class="authenticationPic">
						@if (session('msg'))
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg" style="color:red;">{{ session('msg') }}</strong> / </div>
					@endif
							<p class="title">上传身份证照片</p>
							<p class="tip">请按要求上传身份证</p>
							<ul class="cardlist">
								<li>
									<div class="cardPic">
										<img id="shenfen" src="{{asset('admin/avatars/cardbg.jpg')}}" onclick='fun()'>
										<script>
										var l = 1;
										var shenfen = document.getElementById('shenfen');
										function fun(){
											if(l == '1'){
												shenfen.style.width='700';
												l = 0;
											}else{
												shenfen.style.width='200';
												l = 1
											}
											
											// shenfen.style.height='200';
											// shenfen.style.width='200';
										}
										
										
										</script>
										<p class="titleText">身份证手持照实例：</p>
								
									</div>
									
									
								</li>
								<li>

									<div class="cardPic">
									
								<p class="titleText">身份证上传：</p><input type='file' name='perphoto'>
							
							
						
									</div>
								</li>

							</ul>
							<input class="am-btn am-btn-danger" type="submit" value='提交审核'>
							</form>
						</div>
						<div class="info-btn">
						
						</div>
					</div>
				</div>
				<!--底部-->
				@endsection