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
								<a href="#">商店注册审核</a>
							</li>
							
						</ul><!-- .breadcrumb -->
				
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								商店注册审核
								
							</h1>
							
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											@if (session('msg'))
					    <div class="alert alert-success">
					        {{ session('msg') }}
					    </div>
					@endif
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>id</th>
														<th>账号</th>
														<th class="hidden-480">创建时间</th>

														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															密码
														</th>
														<th class="hidden-480">权限</th>

														<th>操作</th>
													</tr>
												</thead>
												@foreach($list as $v)
												<tbody>
													<tr>
														<td>
															<span class="lbl">{{ $v->id }}</span>
														</td>
														<td>{{ $v->name }}</td>
														<td class="hidden-480">{{date('Y-m-d H:i:s', ($v->utime))}}</td>
														<td>{{ $v->pass }}</td>

														<td class="hidden-480">
															<span class="label label-sm label-warning">@if ($v->status == 0)
																普通用户
																@elseif ($v->status == 1)
																管理员
																@elseif ($v->status == 2)
																超级管理员
																@endif
															</span>
														</td>
														
														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																	<a href='{{ url("admin/showUsers")."/".$v->id }}'><button class="btn btn-xs btn-success">
																	<i class="icon-ok bigger-120">查看用户详情</i>
																</button></a>
																<a href=''>
																<a href='{{ url("admin/usersOK")."/".$v->id }}'>
																<button class="btn btn-xs btn-info">
																	<i class="icon-edit bigger-120">通过审核</i>
																</button>
																</a>
																<a href='{{ url("admin/usersNO")."/".$v->id }}'>
																<button class="btn btn-xs btn-info">
																	<i class="icon-edit bigger-120">不通过审核</i>
																</button></a>
																

																
															</div>
											
																@endforeach
																</div></td>
								

														</td>

													</tr>
					

											

										
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
													
					</div><!-- /.page-content -->
				</div>
{!! $list->render() !!}
@endsection
