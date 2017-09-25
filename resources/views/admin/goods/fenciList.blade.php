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
                    <a href="#">分词表</a>
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
                    分词列表

                </h1>
            </div><!-- /.page-header -->
            <form name='myform' action="" style='display:none' method='post'>
                {{ csrf_field() }}
            </form><br>
            <a href="javascript:doFenci()" style='color:#FFF;'>
                <button class="btn btn-xs btn-info">
                    开始分词<br>
                </button></a><br>
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif
            @if (session('msg'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div><br>
            @endif



            <br><div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="widget-main">
                        <form class="form-search" action='{{ url("admin/goodsFenci") }}'>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control search-query" placeholder="请输入需要搜索的商品名称" name='word'>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-purple btn-sm">
                                                                            搜索
                                            <i class="icon-search icon-on-right bigger-110"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>

                                        <th>商品id</th>
                                        <th>分词名</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($list as $v)
                                        <tr>

                                            <td>
                                                <a href="#">{{ $v->goods_id }}</a>
                                            </td>
                                            <td>
                                                <a href="#">{{ $v->word }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                {!! $list->render() !!}
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
    <script>
        function doFenci()
        {
            if(confirm('你确定要重新分词吗？')){
                var form = document.myform;
                var url = "{{ url('admin/goodsFenci') }}";
                form.action = url;
                form.submit();
            }
        }
    </script>

@endsection