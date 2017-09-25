@extends('admin.parent')
	@section('centent')
										<div class="main-content">
								

											<div class="tab-content  padding-24">
												<div id="home" class="tab-pane in active">
													<div class="row">
													

														<div class="col-xs-12 col-sm-9">
															<h4 class="blue">
																<span class="middle">Alex M. Doe</span>

																<span class="label label-purple arrowed-in-right">
																	<i class="icon-circle smaller-80 align-middle"></i>
																	online
																</span>
															</h4>

															<div class="profile-user-info">
																<div class="profile-info-row">
													<div class="profile-info-name"><b> 昵称</b> </div>

													<div class="profile-info-value">
														<span class="editable" id="username">{{$list->nickname}}</span>
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
													<div class="profile-info-name"> 收货地址 </div>

													<div class="profile-info-value">
														<span class="editable" id="about">{{$list->shipadd}}</span>
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
																		自我介绍
																	</h4>
																</div>

																<div class="widget-body">
																	<div class="widget-main">
																		<p>
																			{{$list->test}}
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
																		商品展示
																	</h4>
																</div>
																

																				

																<div class="widget-body">
																	<div class="widget-main padding-16">
																		<div class="clearfix">
																		 @foreach($goods as $v)
																			<ul class="ace-thumbnails">
														<li>
															<a href="#" data-rel="colorbox">
																<img alt="150x150" src="{{asset('uploads/image'). '/' . $v->image}}" />
																<div class="text">
																	<div class="inner">{{$v->shopname}}</div>
																</div>
															</a>

															<div class="tools tools-bottom">
																

																<!-- {{asset('admin/shopsDele/') .'/'. $v->id}} -->

																<a href="{{asset('admin/shopsDele/') .'/'. $v->id}}">
																	<i class="icon-remove red"></i>
																</a>
															</div>
														</li>

														

														
													</ul>
													@endforeach
												
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