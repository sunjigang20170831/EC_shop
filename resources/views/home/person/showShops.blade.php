@extends('home.person')
	@section('centent')
	<div class="main-wrap">
	 
					@if (session('msg'))
					    <div class="alert alert-success" style="color:red">
					        {{ session('msg') }}
					    </div>
					@endif

					@if (count($errors) > 0)
					    <div class="alert alert-danger" style="color:red">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li color="red">{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
					<!--标题 -->
					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">商品修改</strong> / <small>Commodity&nbsp;Consultation</small></div>
					</div>
					<hr/>
					<div class="suggestmain">
						<p>商品分类：</p>
						<div class="suggestlist">
						<form action="{{ url('/home/shops').'/'.$arr->id }}" method="post" enctype="multipart/form-data" name="form">
							{{ csrf_field() }}
						{{ method_field('PUT') }}
							<select data-am-selected name="pid">
								<option selected>请选择类型</option>
								@foreach($list as $v)

								<option value="{{$v->pid}}">{{$v->name}}</option>
								@endforeach
								
								
							</select></br>

							<div class="suggestmain">
							<br/>
								<div class="suggestlist">
									商品名称：<input type="tel" id="user-IDcard" placeholder="{{$arr->shopname}}" name="shopname"></div>
									<div class="suggestlist">
									商品原价：<input type="tel" id="user-IDcard" placeholder="{{$arr->reprice}}" name="reprice"></div>
									<div class="suggestlist">
									商品现价：<input type="tel" id="user-IDcard" placeholder="{{$arr->price}}" name="price"></div>
									
									商品成色：<input type="radio" name="color" value="红">红
									<input type="radio" name="color" value="黄">黄
									<input type="radio" name="color" value="蓝">蓝
									<input type="radio" name="color"  value="绿">绿
									<div class="suggestlist">
									<p>商品图片：</p>

									<input type="file" name="image"></div>
									</div>
									<p>商品描述：</p><br><br>
							<script id="editor" type="text/plain" style="width:90%;height:500px; margin:10px 0 0 20px" name = 'content'></script>
					</div>
							
    
							<input class="am-btn am-btn-danger anniu" type="submit" value="提交审核">
						</form>
						
						<p class="suggestTel"><i class="am-icon-phone"></i>客服电话：400-007-1234</p>
					</div>
				</div>
<script type="text/javascript" charset="utf-8" src="{{url('ueditor/ueditor.config.js')}}"></script>
   <script type="text/javascript" charset="utf-8" src="{{url('ueditor/ueditor.all.min.js')}}"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
   <script type="text/javascript" charset="utf-8" src="{{url('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
   <script type="text/javascript">
      var ue = UE.getEditor('editor');
   </script>
				<!--底部-->
				@endsection