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
								<a href="#">分类管理</a>
							</li>
							<li class="active">添加子分区</li>
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
								分区管理
								<small>
									<i class="icon-double-angle-right"></i>
									添加子分区
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<form class="form-horizontal" role="form" action='{{ url("admin/demo/typeSon") }}' method='post'>
									{{ csrf_field() }}
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 子分区名 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name='name'>
										</div>
										
										<div class="col-sm-9">
											<input type="hidden" id="form-field-1" value='{{ $ob->id }}' class="col-xs-10 col-sm-5" value='0' name='pid'>
										</div>
									</div>

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="icon-ok bigger-110"></i>
												Submit
											</button>
											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>
								</form>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
	
@endsection