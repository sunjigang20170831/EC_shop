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
                                <a href="#">商品管理</a>
                            </li>
                            <li class="active">商品详情</li>
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
                                商品管理
                                <small>
                                    <i class="icon-double-angle-right"></i>
                                    商品详情
                                </small>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->

                                

                                <div class="hr dotted"></div>

                                <div>
                                    <div id="user-profile-1" class="user-profile row">
                                        <div class="col-xs-12 col-sm-3 center">
                                            <div>
                                                <span class="profile-picture">
                                                    <img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" src="{{ asset('home/uploads').'/'.$list->image }}">
                                                </span>

                                                <div class="space-4"></div>

                                                <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                    <div class="inline position-relative">
                                                        <a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
                                                            <i class="icon-circle light-green middle"></i>
                                                            &nbsp;
                                                            <span class="white">Alex M. Doe</span>
                                                        </a>

                                                        <ul class="align-left dropdown-menu dropdown-caret dropdown-lighter">
                                                            <li class="dropdown-header"> Change Status </li>

                                                            <li>
                                                                <a href="#">
                                                                    <i class="icon-circle green"></i>
                                                                    &nbsp;
                                                                    <span class="green">Available</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#">
                                                                    <i class="icon-circle red"></i>
                                                                    &nbsp;
                                                                    <span class="red">Busy</span>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="#">
                                                                    <i class="icon-circle grey"></i>
                                                                    &nbsp;
                                                                    <span class="grey">Invisible</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-6"></div>

                                            <div class="profile-contact-info">

                                                <div class="space-6"></div>

                                                <div class="profile-social-links center">
                                                    <a href="#" class="tooltip-info" title="" data-original-title="Visit my Facebook">
                                                        <i class="middle icon-facebook-sign icon-2x blue"></i>
                                                    </a>

                                                    <a href="#" class="tooltip-info" title="" data-original-title="Visit my Twitter">
                                                        <i class="middle icon-twitter-sign icon-2x light-blue"></i>
                                                    </a>

                                                    <a href="#" class="tooltip-error" title="" data-original-title="Visit my Pinterest">
                                                        <i class="middle icon-pinterest-sign icon-2x red"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="hr hr12 dotted"></div>

                                            <div class="clearfix">
                                                <div class="grid2">
                                                    <span class="bigger-175 blue">25</span>

                                                    <br>
                                                    Followers
                                                </div>

                                                <div class="grid2">
                                                    <span class="bigger-175 blue">{{ $list->good }}</span>

                                                    <br>
                                                    点赞量
                                                </div>
                                            </div>

                                            <div class="hr hr16 dotted"></div>
                                        </div>

                                        <div class="col-xs-12 col-sm-9">
                                            

                                            <div class="space-12"></div>

                                            <div class="profile-user-info profile-user-info-striped">
                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> 商品名称 </div>

                                                    <div class="profile-info-value">
                                                        <span class="editable editable-click" id="username">{{ $list->shopname }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> 产地 </div>

                                                    <div class="profile-info-value">
                                                        <i class="icon-map-marker light-orange bigger-110"></i>
                                                        <span class="editable editable-click" id="country">{{ $list->site }}</span>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> 商品价格 </div>

                                                    <div class="profile-info-value">
                                                        <span class="editable editable-click" id="age">{{ $list->price }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> 商品发布时间 </div>

                                                    <div class="profile-info-value">
                                                        <span class="editable editable-click" id="signup">{{ $list->time }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> 商品所属分类 </div>

                                                    <div class="profile-info-value">
                                                        <span class="editable editable-click" id="login">{{ $list->pid }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> 商品发布用户 </div>

                                                    <div class="profile-info-value">
                                                        <span class="editable editable-click" id="about">{{ $user->name }}</span>
                                                    </div>
                                                </div>

                                                <div class="profile-info-row">
                                                    <div class="profile-info-name"> 商品介绍 </div>

                                                    <div class="profile-info-value">
                                                        <span class="editable editable-click" id="login">{{ $list->content }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="space-20"></div>

                                           

                                            <div class="hr hr2 hr-double"></div>

                                            
                                    </div>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>

@endsection