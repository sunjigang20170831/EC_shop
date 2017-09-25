@extends('home.person')
	@section('centent')
<div class="main-wrap">

					<!--标题 -->
					<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
							@foreach($res as $v)
								<img class="am-circle am-img-thumbnail" src="{{asset('home/uplodas/')}}/{{$v->photos}}" width="170px" alt="" />
							
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>{{ $v->name }}</i></b></div>
								@endforeach
                                <div class="safeText">
                                  	<a href="safety.html">账户安全:<em style="margin-left:20px ;">60</em>分</a>
									<div class="progressBar"><span style="left: -95px;" class="progress"></span></div>
								</div>
							</div>
						</div>

						<div class="check">
							<ul>
								<li>
									<i class="i-safety-lock"></i>
									<div class="m-left">
										<div class="fore1">登录密码</div>
										<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
									</div>
									<div class="fore3">
										<a href="{{ url('/home/password')}}">
											<div class="am-btn am-btn-secondary">修改</div>
										</a>
									</div>
								</li>
								
							
								
								<li>
									<i class="i-safety-security"></i>
									<div class="m-left">
										<div class="fore1">安全问题</div>
										<div class="fore2"><small>保护账户安全，验证您身份的工具之一。</small></div>
									</div>
									<div class="fore3">
										<a href="{{ url('/home/question')}}">
											<div class="am-btn am-btn-secondary">认证</div>
										</a>
									</div>
								</li>
							</ul>
						</div>

					</div>
				</div>
				<!--底部-->
				@endsection