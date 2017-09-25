@extends('admin.parent')
	@section('centent')


<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">首页</a>
							</li>
							<li class="active">控制台</li>
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
								控制台
								<small>
									<i class="icon-double-angle-right"></i>
									 查看
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>

									<i class="icon-ok green"></i>

									欢迎使用
									<strong class="green">
										兄弟连二手商城后台管理系统
										
									</strong>
									,轻量级好用的二手商城后台管理系统模版.	
								</div>

								<div class="row">
									<div class="space-6"></div>

									<div class="col-sm-12 infobox-container">
										<div class="infobox infobox-green  ">
											<div class="infobox-icon">
												<i class="icon-comments"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number" id='liuyan'>32</span>
												<div class="infobox-content">评论</div>
											</div>
											<div class="stat stat-success">8%</div>
										</div>

										<div class="infobox infobox-blue  ">
											<div class="infobox-icon">
												<i class="icon-twitter"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number" id='user'>11</span>
												<div class="infobox-content">新用户</div>
											</div>

											<div class="badge badge-success">
												+32%
												<i class="icon-arrow-up"></i>
											</div>
										</div>

										<div class="infobox infobox-pink  ">
											<div class="infobox-icon">
												<i class="icon-shopping-cart"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number" id='list'>8</span>
												<div class="infobox-content">成交量</div>
											</div>
											<div class="stat stat-important">4%</div>
										</div>

										<div class="infobox infobox-red  ">
											<div class="infobox-icon">
												<i class="icon-beaker"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number" id='link'>7</span>
												<div class="infobox-content">合作伙伴</div>
											</div>
										</div>

										

										

										<div class="space-6"></div>

										<div class="infobox infobox-green infobox-small infobox-dark">
											<div class="infobox-progress">
												<div class="easy-pie-chart percentage" data-percent="61" data-size="39">
													<span class="percent">61</span>%
												</div>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">任务</div>
												<div class="infobox-content">完成</div>
											</div>
										</div>

										<div class="infobox infobox-blue infobox-small infobox-dark">
											<div class="infobox-chart">
												<span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
											</div>

											<div class="infobox-data">
												<div class="infobox-content">获得</div>
												<div class="infobox-content" id='ob'>$32,000</div>
											</div>
										</div>

										
									</div>

									<div class="vspace-sm"></div>

								</div><!-- /row -->

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-sm-12">
										<div class="widget-box transparent">
											<div class="widget-header widget-header-flat">
												<h4 class="lighter">
													<i class="icon-star orange"></i>
													热门商品
												</h4>

												<div class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main no-padding">
													<table class="table table-bordered table-striped">
														<thead class="thin-border-bottom">
															<tr>
																<th>
																	<i class="icon-caret-right blue"></i>
																	名称
																</th>

																<th>
																	<i class="icon-caret-right blue"></i>
																	价格
																</th>

																<th class="hidden-480">
																	<i class="icon-caret-right blue"></i>
																	状态
																</th>
															</tr>
														</thead>

														<tbody>
															@foreach($list as $li)
															<tr>
																<td>{{ $li->shopname }}</td>

																<td>
																	<small>
																		<s class="red">${{ $li->reprice }}</s>
																	</small>
																	<b class="green">${{ $li->price }}</b>
																</td>

																<td class="hidden-480">
																	<span class="label label-info arrowed-right arrowed-in">销售中</span>
																</td>
															</tr>
															@endforeach
														</tbody>
													</table>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->
										</div><!-- /widget-box -->
									</div>
								</div>

								<div class="hr hr32 hr-dotted"></div>
									<div class="page-content">
						<div class="page-header">
							<h1>
								反馈信息查询
								
							</h1>
							<form action="{{ url('/admin/sug')}}" >
							<div class="input-group">
											<input type="text" class="form-control search-query" placeholder="输入查询的问题类型" name="problem"/>
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
														
														<th>反馈人id</th>
														<th>用户名</th>
														<th class="hidden-480">反馈问题</th>

														
														<th class="hidden-480">反馈内容</th>
														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															创建时间
														</th>
														
														<th>操作</th>
														
													</tr>
												</thead>
										
											
												<tbody>
												
														@foreach($res as $re)
													<tr>
														<td>
															<span class="lbl">{{$re->uid}}</span>
														</td>
														<td>{{$re->name}}</td>
													
														<td class="hidden-480">{{$re->problem}}</td>
														<td>{{$re->content}} </td>

														<td class="hidden-480">
															<span class="label label-sm label-warning">
															{{date('Y-m-d H:i:s',$re->time)}}
															</span>
														</td>
														<form  style='display:none' method="post">
																
																
														</form>
														
																
																<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
																
																<a href="">
																
																	<a href='javascript:doDel()'>
																<button class="btn btn-xs btn-danger">
																	<a href="{{ url('admin/suggest').'/'.$re->id}}">删除反馈信息</a></i>
																</button></a>
													@endforeach
																
															</div>
														
															
																</div>

																</td>

														</td>

													</tr>
						{!! $res->render() !!}
								<script>
							        var url = "{{ url('admin/ajaxAdmin') }}";
							        $.ajax({
							        url:url,
							        type:'get',
							        dataType:'json',
							        data:{upid:0},
							        success:function(data){
							            console.log(data);
							            $('#liuyan').html(data[1]);
							            $('#user').html(data[2]);
							            $('#list').html(data[0]);
							            $('#link').html(data[3]);
							            //alert(data);
							            
							        },
							        error:function(){
							            alert('ajax请求失败');
							        }
							    });

							    var url = "{{ url('admin/ajaxGoods') }}";
							        $.ajax({
							        url:url,
							        type:'get',
							        dataType:'json',
							        data:{upid:0},
							        success:function(data){
							           console.log(data);
							           $('#ob').html('￥'+data);
							            
							        },
							        error:function(){
							            alert('ajax请求失败');
							        }
							    });

							    </script> 

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->
			@endsection