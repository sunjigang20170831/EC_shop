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
                                <a href="#">友情链接表</a>
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
                                友情链接列表
                                
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

                    <form name='myform' action="" style='display:none' method='post'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                    
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
                                                        <th>友情链接名</th>
                                                        <th>跳转地址</th>
                                                        <th class="hidden-480">权限</th>

                                                        
                                                    </tr>
                                                </thead>
                                                
                                            
                                                <tbody>
                                                @foreach($list as $v)
                                                    <tr>

                                                        <td>
                                                            <a href="#">{{ $v->id }}</a>
                                                        </td>
                                                        <td>
                                                            <a href="#">{{ $v->name }}</a>
                                                        </td>
                                                        <td>{{ $v->address }}</td>
                                                        
                                                        <td>
                                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                            <a href="{{ url('admin/link').'/'.$v->id }}/edit" style='color:#FFF;'>
                                                                <button class="btn btn-xs btn-info">
                                                                    修改
                                                                </button></a>
                                                                <a href="javascript:doDel({{ $v->id }})" style='color:#FFF;'>
                                                                <button class="btn btn-xs btn-success">
                                                                    删除
                                                                </button></a>

                                                            </div>

                                                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                                <div class="inline position-relative">
                                                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                                        <i class="icon-cog icon-only bigger-110"></i>
                                                                    </button>

                                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                                        <li>
                                                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                                <span class="blue">
                                                                                    <i class="icon-zoom-in bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                                <span class="green">
                                                                                    <i class="icon-edit bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                                <span class="red">
                                                                                    <i class="icon-trash bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            
                                            </table>
                                            
                                        </div><!-- /.table-responsive -->
                                    </div><!-- /span -->
                                </div><!-- /row -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
                <script>
                    function doDel(id)
                    {
                        if(confirm('你确定要删除吗？')){
                            var form = document.myform;
                            var url = "{{ url('admin/link') }}";
                            form.action = url+'/'+id;
                            form.submit();
                        }
                    }
                </script>

@endsection