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
                                <a href="#">分类配置</a>
                            </li>
                            <li class="active">修改站点</li>
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
                                站点管理
                                <small>
                                    <i class="icon-double-angle-right"></i>
                                    修改站点
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

                                <form class="form-horizontal" role="form" action="{{ url('admin/config/1') }}" method='post' enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 网站标题： </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name='title' placeholder="{{ $list->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 网站关键字： </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1" placeholder="{{ $list->keywords }}" class="col-xs-10 col-sm-5" name="keywords">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 网站描述： </label>
                                        <div class="col-sm-9">
                                            <input type="text" id="form-field-1" placeholder="{{ $list->des }}" class="col-xs-10 col-sm-5" name="des">
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 网站开关： </label>&nbsp;
                                        <label>
                                        @if($list->open == 1)
                                            <input name="open" type="radio" class="ace" value='1' checked>
                                        @else
                                            <input name="open" type="radio" class="ace" value='1'>
                                        @endif    
                                            <span class="lbl"> 开</span>
                                        </label>&nbsp;
                                        <label>
                                        @if($list->open == 0)
                                            <input name="open" type="radio" class="ace" value='0' checked>
                                        @else
                                            <input name="open" type="radio" class="ace" value='0'>
                                        @endif
                                            <span class="lbl"> 关</span>
                                        </label>
                                    </div>
                                    <div class="form-group"><br>
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 预览： </label>&nbsp;&nbsp;
                                        <img src="{{ asset('home/uplodas').'/'.$list->logo }}" width=200 /><br>
                                    </div>
                                    <div class="form-group"><br>
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> LOGO选择： </label>
                                        <div class="col-sm-9">
                                            <input type="file" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name="logo">
                                        </div>
                                    </div>
                                    

                                    <div class="clearfix form-actions" style="background:#fff">
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