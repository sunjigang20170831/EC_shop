@extends('admin.parent')
	@section('centent')

		<div class="row">
		@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
									<div class="col-sm-6">
										<h4 class="header blue">新闻发布</h4>
										<div class="col-sm-12">
										<form action="{{ url('admin/news').'/'.$list->id }}" method="post">
										{{ csrf_field() }}
								{{ method_field('PUT') }}
										<div class="col-sm-12">
										<caption><b>标题</b></caption><br/>
										<input id="inputWarning" type="text" name="title" class="width-100" placeholder="{{$list->title}}" /></br></br>

										<caption><b>发布人</b></caption><br/>
										<input id="inputWarning" type="text" name="name" class="width-100" placeholder="{{$list->name}}"/></br></br></div>



										<div class="col-sm-12">
										<caption><b>消息内容</b></caption><br/>
										<textarea rows="20" cols='50' name="content" placeholder="{{$list->title}}"></textarea></div></br>
										<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>
										</form>
										</div>
												
									</div>
</div>
									


@endsection
