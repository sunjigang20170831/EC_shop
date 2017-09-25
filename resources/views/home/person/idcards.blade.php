@extends('home.person')
	@section('centent')

<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">提交审核</strong> / <small>提交审核时间为1——2个工作日请耐心等待！！！！</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">提交审核中</p>
                            </span>
                            @if(session('adminuser')->status)
							<span class="step-1 step">
							@else
							<span class="step-2 step">
							@endif
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>

                             @if(session('adminuser')->shops == '3')
								 <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">对不起您提交的信息未通过审核，请你核对身份再次提交，感谢您的配合！</strong> </div>
								 @endif
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					

				</div>
				<!--底部-->
				@endsection