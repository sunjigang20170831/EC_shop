@extends('admin.parent')
	@section('centent')
										<div class="main-content">
								
@if (session('msg'))
					    <div class="alert alert-success">
					        {{ session('msg') }}
					    </div>
					@endif
											<div class="tab-content  padding-24">
												<div id="home" class="tab-pane in active">
													<div class="row">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="{{asset('admin/avatars/').'/' . $list->photos}}"/>
															</span>

															<div class="space space-4"></div>

															<a href="#" class="btn btn-sm btn-block btn-success">
																<i class="icon-plus-sign bigger-120"></i>
																<span class="bigger-110"><b>详情</b></span>
															</a>

															<a href="#" class="btn btn-sm btn-block btn-primary">
																<i class="icon-envelope-alt bigger-110"></i>
																<span class="bigger-110">头像</span>
															</a>
														</div><!-- /span -->

														<div class="col-xs-12 col-sm-9">
															

															<div class="profile-user-info">
																<div class="profile-info-row">
													<div class="profile-info-name"><b> 真实姓名</b> </div>

													<div class="profile-info-value">
														<span class="editable" id="username">{{$user->pername}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"><b> 性别</b> </div>

													<div class="profile-info-value">
														<span class="editable" id="username">{{($list->sex) ? '男' : '女'}}
																
														</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"> <b>地址 </b></div>

													<div class="profile-info-value">
														<i class="icon-map-marker light-orange bigger-110"></i>
														
														<span class="editable" id="city">{{$list->hotadd}}</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"><b> 年龄 </b></div>

													<div class="profile-info-value">
														<span class="editable" id="age">{{$list->age}}</span>
													</div>
												</div>

												
												

												<div class="profile-info-row">
													<div class="profile-info-name"> <b>联系电话 </b></div>

													<div class="profile-info-value">
														<span class="editable" id="login">{{$list->phone}}</span>
													</div>
												</div>

												<div class="profile-info-row">
													<div class="profile-info-name"><b> 邮箱 </b></div>

													<div class="profile-info-value">
														<span class="editable" id="about">{{$list->email}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name">身份证信息 </div>

													<div class="profile-info-value">
														<span class="editable" id="about">{{$user->pernumber}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> <b>账户余额 </b></div>

													<div class="profile-info-value">
														<span class="editable" id="about">{{$list->money}} RMB</span>
													</div>
												</div>
															</div>
														</div><!-- /span -->
													</div><!-- /row-fluid -->

													<div class="space-20"></div>

													<div class="row">
														<div class="col-xs-12 col-sm-6">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small">
																	<h4 class="smaller">
																		<i class="icon-check bigger-110"></i>
																		商店描述
																	</h4>
																</div>

																<div class="widget-body">
																	<div class="widget-main">
																		<p>
																			{{$user->content}}
																		</p>
																	</div>
																</div>
															</div>
														</div>

														<div class="col-xs-12 col-sm-6">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small header-color-blue2">
																	<h4 class="smaller">
																		<i class="icon-lightbulb bigger-120"></i>
																		身份证
																	</h4>
																</div>
																

																				

																<div class="widget-body">
																	<div class="widget-main padding-16">
																		<div class="clearfix">
																		
																			<ul class="ace-thumbnails">
														<li>
															
																<img id="shenfen" src="{{asset('home/uplodas'). '/' . $user->perphoto}}" height="300" width="500"/>
																<div class="text">
													
																</div>
														

															<div class="tools tools-bottom">
																

																

																
															</div>
														</li>

														

														
													</ul>
											
												
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div><!-- #home -->


												
											</div>
										</div></div>
										
				@endsection