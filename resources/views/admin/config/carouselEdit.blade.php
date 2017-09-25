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
								<a href="#">控制台</a>
							</li>

							<li>
								<a href="#">轮播管理</a>
							</li>
							<li class="active">修改轮播</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off">
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								轮播管理
								<small>
									<i class="icon-double-angle-right"></i>
									修改轮播
								</small>
							</h1>
						</div><!-- /.page-header -->
					@if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                        </div>
                    @endif
                    @if (session('msg'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" role="form" action='{{ url("admin/carousel")."/".$list->id }}' method='post' enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('PUT') }}
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 图片名 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" placeholder="{{ $list->photoname }}" class="col-xs-10 col-sm-5" name='photoname'>
										</div>
										
										
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 预览 </label>

										<div class="col-sm-9">
											<img src="{{ $list->address }}" height='200' width='200'>
										</div>
										
										
									</div>
									<div class="form-group"><br>
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 图片选择 </label>
                                        <div class="col-sm-9">
                                            <input type="file" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name='address'>
                                        </div>
                                    </div>

									<div class="clearfix form-actions" style='background:#fff'>
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

								<div id="modal-form" class="modal" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">×</button>
												<h4 class="blue bigger">Please fill the following form fields</h4>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
	
@endsection