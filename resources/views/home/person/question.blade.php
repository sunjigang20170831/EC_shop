@extends('home.person')
	@section('centent')
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">设置安全问题</strong> / <small>Set&nbsp;Safety&nbsp;Question</small></div>
					</div>
					<hr/>
						@if (session('msg'))
					    <div style = "color:red" class="alert alert-success">
					        {{ session('msg') }}
					    </div>
					@endif
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">设置安全问题</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal" action="{{url('/home/question')}}" method="post">
						{{ csrf_field() }}
						<div class="am-form-group select">
							<label for="user-question1" class="am-form-label">问题一</label>
							<div class="am-form-content">
								<select name="wenti">
									
									<option value="b">您最喜欢的颜色是什么？</option>
									<option value="c">您的故乡在哪里？</option>
								</select>
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-answer1" class="am-form-label">答案</label>
							<div class="am-form-content">
								<input type="text" id="user-answer1"  name="answer" placeholder="请输入安全问题答案">
							</div>
						</div>
						<div class="am-form-group select">
							<label for="user-question2" class="am-form-label">问题二</label>
							<div class="am-form-content">
								<select name="wenti1">
									
									<option value="b">您最喜欢的颜色是什么？</option>
									<option value="c">您的故乡在哪里？</option>
								</select>
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-answer2" class="am-form-label">答案</label>
							<div class="am-form-content">
								<input type="text" id="user-answer2" name="answer1" placeholder="请输入安全问题答案">
							</div>
						</div>
						<div class="info-btn">
						<button>保存修改</button>
						</div>

					</form>

				</div>
				<!--底部-->
	@endsection			