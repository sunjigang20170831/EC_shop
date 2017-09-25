@extends('admin.parent')
    @section('centent')

		<div class="main-content">
                    <div class="breadcrumbs" id="breadcrumbs">

                        <ul class="breadcrumb">
                            <li>
                                <i class="icon-home home-icon"></i>
                                <a href="#">控制台</a>
                            </li>

                            <li>
                                <a href="#">商品审核表</a>
                            </li>
                            
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
                                商品审核列表
                                
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
                                        
                    <form name="myform" action="" style="display:none" method="post">
                        {{ csrf_field() }}
                        
                    </form>

                    <form id='form' action="" method='post' style="display:none">
                        {{ csrf_field() }}
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
                                                        <th>商品名</th>
                                                        <th>商品价格</th>
                                                        <th>商品发布时间</th>
                                                        <th>商品所属版块</th>
                                                        <th>商品发布用户</th>
                                                        <th>商品浏览次数</th>
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
                                                            <a href="#">{{ $v->shopname }}</a>
                                                        </td>
                                                        <td>{{ $v->price }}</td>
                                                        <td>{{ $v->time }}</td>
                                                        <td>{{ $v->pid }}</td>
                                                        <td>{{ $v->uid }}</td>
                                                        <td>{{ $v->cishu }}</td>
                                                        <td>
                                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                           
                                                                <button type='submit' class="btn btn-xs btn-info">
                                                                    <a href="javascript:doAuditing({{ $v->id }})" style="color:#FFF;">通过</a> 
                                                                </button>
                                                            
                                                                <button class="btn btn-xs btn-success">
                                                                    <a href="javascript:destroyAuditing({{ $v->id }})" style="color:#FFF;">不通过</a>
                                                                </button>

                                                                <button class="btn btn-xs btn-info">
                                                                    <a href="{{ url('admin/indexShop').'/'.$v->id }}" style="color:#FFF;">商品详情</a>
                                                                </button>

                                                            </div>

                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
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
                    function destroyAuditing(id)
                    {
                        if(confirm('你确定要拒绝审核吗？')){
                            var form = document.myform;
                            //alert(form);
                            var url = "{{ url('admin/destroyAuditing') }}";
                            form.action = url+'/'+id;
                            form.submit();
                        }
                    }

                    function doAuditing(id)
                    {
                        if(confirm('你确定要通过审核吗？')){
                            var form = document.getElementById('form');
                            //alert(form);

                            var url = "{{ url('admin/goodsAuditing') }}";
                            form.action = url+'/'+id;
                            form.submit();
                        }
                    }
                    
                </script>

@endsection