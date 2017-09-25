@extends('admin.parent')
	@section('centent')

<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">后台控制器</a>
							</li>

							<li>
								<a href="#">用户表</a>
							</li>
							
						</ul><!-- .breadcrumb -->

						<!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								用户列表
								
							</h1>
						</div><!-- /.page-header -->
						<div class="col-xs-12">
							
						@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" role="form" action="{{url('/admin/user')}}" method="post">
								{{ csrf_field() }}
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 账号</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="name" class="col-xs-10 col-sm-5" name="name"/>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 密码</label>

										<div class="col-sm-9">
											<input type="password" id="form-field-2" placeholder="Password" class="col-xs-10 col-sm-5" name="pass"/>
											<span class="help-inline col-xs-12 col-sm-7">
											
											</span>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 账号</label>

										<div class="col-sm-9">
														<select id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" name="status">
												<option value="0">普通用户</option>
																<option value="1">管理员</option>
																<option value="2">超级用户</option></select>
										</div>
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit" value="提交">
												<i class="icon-ok bigger-110"></i>
												提交
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
											</form>
										</div>
									</div>

									<div class="hr hr-24"></div>

											

@endsection