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
						
					    <div class="alert alert-success">
					     
					    </div>
				
					
					    <div class="alert alert-danger">
					       
					    </div>
				
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
								账单详情查询
								
							</h1>
							<form action="{{ url('/admin/see')}}" >
							<div class="input-group">
											<input type="text" class="form-control search-query" placeholder="详情" name="event"/>
											<span class="input-group-btn">
											<input type="submit" class="btn btn-purple btn-sm" value="查询">
																			
											<i class="icon-search icon-on-right bigger-110"></i>
		
											</span>
										</div>
							</form>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														
														<th>id</th>
														<th>用户名</th>
														<th class="hidden-480">详情</th>

														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															创建时间
														</th>
														<th class="hidden-480">金额</th>
														<th>余额</th>
														<th>操作</th>
														
													</tr>
												</thead>
										@foreach($list as $v)
											
												<tbody>
												
														
													<tr>
														<td>
															<span class="lbl">{{$v->uid}}</span>
														</td>
														
														<td>{{$v->name}}</td>
													
														<td class="hidden-480">{{$v->event}}</td>
														<td>{{ date("Y-m-d H:i:s",$v->ctime) }} </td>

														<td class="hidden-480">
															<span class="label label-sm label-warning">{{ $v->money }}
															</span>
														</td>
														<form  style='display:none' method="post">
																
																
														</form>
														
																<td>{{ $v->ye }}
																</td>
																<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																
																<a href="">
																
																	<a href='javascript:doDel()'>
																<button class="btn btn-xs btn-danger">
																	<a href="{{ url('/admin/delzd').'/'.$v->id}}">删除账单</a></i>
																</button></a>

																
															</div>
														
															
																</div>
																</td>

														</td>

													</tr>
													
													@endforeach
														
						<script>
						function doDel(id)
                	{
                		if(confirm('你确定要删除吗？')){
                			var myform = document.getElementById('myform');
                			//document.myform;  可能版本有问题？？
                			var url = "{{ url('admin/delzd') }}";
                			myform.action = url+'/'+id;
                			


                			//alert(id);
                		//console.log(myform);

                			myform.submit();

                		}
                	}
						</script>

											

										
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
													
					</div><!-- /.page-content -->
				</div>
 {!! $list->render() !!}
@endsection
