@extends('home.person')
	@section('centent')
			<div class="main-wrap">
					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>
     <!-- <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">-->
						<!--头像 -->
						<div class="user-infoPic"  width="50" height="50">
                                    @foreach($res as $v)
                                       <div style="width:150px;">         
                                   <img class="am-circle am-img-thumbnail" src="{{asset('home/uplodas/')}}/{{$v->photos}}" width="50px" height="50" />
                                   </div>
							<p class="am-form-help">头像</p>
							<div class="info-m">
								<div><b>用户名：<i>{{ $v->name }}</i></b></div>
                                                 @endforeach
								<div class="vip">
                                      <span></span><a href="#">会员专享</a>
								</div>
							</div>
						</div>
						@if (session('msg'))
					    <div  style="color:red;font-size:30px;" class="alert alert-success">

					        				{{ session('msg') }}
					   						</div>
											@endif
						<!--个人信息 -->
						<div class="info-main">
                                      <div class="am-form-content">                     
                                    <form action="{{url('/home/img')}}" method="post"  enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    文件名：<input type="file" name="photos" /><br />
                                     <input type="submit" value="上传" />
                                     </form>
                                       </div> 
							<form class="am-form am-form-horizontal" id="myform" action="{{ url('/home/information')}}" method="post">
							{{ csrf_field() }}

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="id" name="nickname" placeholder="nickname">
                                          <small>昵称长度不能超过40个汉字</small>
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" name="name" id="nid" placeholder="name">
                                         
									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1" data-am-ucheck> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="0" data-am-ucheck> 女
										</label>
										
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select">
											<select name="year">
												<option value="1940"  >1940</option>
                                                             <option value="1940"  >1940</option>
                                                            <option value="1941"  >1941</option>
                                                            <option value="1942"  >1942</option>
                                                            <option value="1943"  >1943</option>
                                                            <option value="1944"  >1944</option>
                                                            <option value="1945"  >1945</option>
                                                            <option value="1946"  >1946</option>
                                                            <option value="1947"  >1947</option>
                                                            <option value="1948"  >1948</option>
                                                            <option value="1949"  >1949</option>
                                                            <option value="1950"  >1950</option>
                                                            <option value="1951"  >1951</option>
                                                            <option value="1952"  >1952</option>
                                                            <option value="1953"  >1953</option>
                                                            <option value="1954"  >1954</option>
                                                            <option value="1955"  >1955</option>
                                                            <option value="1956"  >1956</option>
                                                            <option value="1957"  >1957</option>
                                                            <option value="1958"  >1958</option>
                                                            <option value="1959"  >1959</option>
                                                            <option value="1960"  >1960</option>
                                                            <option value="1961"  >1961</option>
                                                            <option value="1962"  >1962</option>
                                                            <option value="1963"  >1963</option>
                                                            <option value="1964"  >1964</option>
                                                            <option value="1965"  >1965</option>
                                                            <option value="1966"  >1966</option>
                                                            <option value="1967"  >1967</option>
                                                            <option value="1968"  >1968</option>
                                                            <option value="1969"  >1969</option>
                                                            <option value="1970"  >1970</option>
                                                            <option value="1971"  >1971</option>
                                                            <option value="1972"  >1972</option>
                                                            <option value="1973"  >1973</option>
                                                            <option value="1974"  >1974</option>
                                                            <option value="1975"  >1975</option>
                                                            <option value="1976"  >1976</option>
                                                            <option value="1977"  >1977</option>
                                                            <option value="1978"  >1978</option>
                                                            <option value="1979"  >1979</option>
                                                            <option value="1980"  >1980</option>
                                                            <option value="1981"  >1981</option>
                                                            <option value="1982"  >1982</option>
                                                            <option value="1983"  >1983</option>
                                                            <option value="1984"  >1984</option>
                                                            <option value="1985"  >1985</option>
                                                            <option value="1986"  >1986</option>
                                                            <option value="1987"  >1987</option>
                                                            <option value="1988"  >1988</option>
                                                            <option value="1989"  >1989</option>
                                                            <option value="1990"  >1990</option>
                                                            <option value="1991"  >1991</option>
                                                            <option value="1992"  >1992</option>
                                                            <option value="1993"  >1993</option>
                                                            <option value="1994"  >1994</option>
                                                            <option value="1995"  >1995</option>
                                                            <option value="1996"  >1996</option>
                                                            <option value="1997"  >1997</option>
                                                            <option value="1998"  >1998</option>
                                                            <option value="1999"  >1999</option>
                                                            <option value="2000"  >2000</option>
                                                            <option value="2001"  >2001</option>
                                                            <option value="2002"  >2002</option>
                                                            <option value="2003"  >2003</option>
                                                            <option value="2004"  >2004</option>
                                                            <option value="2005"  >2005</option>
                                                            <option value="2006"  >2006</option>
                                                            <option value="2007"  >2007</option>
                                                            <option value="2008"  >2008</option>
                                                            <option value="2009"  >2009</option>
                                                            <option value="2010"  >2010</option>
                                                            <option value="2011"  >2011</option>
                                                            <option value="2012"  >2012</option>
                                                            <option value="2013"  >2013</option>
                                                            <option value="2014"  >2014</option>
                                                            <option value="2015"  >2015</option>
                                                            <option value="2016"  >2016</option>
                                                            <option value="2017"  >2017</option>                                                            
											</select>
											<em>年</em>
										</div>
										<div class="birth-select2">
											<select name="month">
												
                                                             <option value="1"  >1</option>
                                                            <option value="2"  >2</option>
                                                            <option value="3"  >3</option>
                                                            <option value="4"  >4</option>
                                                            <option value="5"  >5</option>
                                                            <option value="6"  >6</option>
                                                            <option value="7"  >7</option>
                                                            <option value="8"  >8</option>
                                                            <option value="9"  >9</option>
                                                            <option value="10"  >10</option>
                                                            <option value="11"  >11</option>
                                                            <option value="12"  >12</option>
                                                            
											</select>
											<em>月</em></div>
										<div class="birth-select2">
											<select name="day">
												            <option value="1" >1</option>
                                                            <option value="2"  >2</option>
                                                            <option value="3"  >3</option>
                                                            <option value="4"  >4</option>
                                                            <option value="5"  >5</option>
                                                            <option value="6"  >6</option>
                                                            <option value="7"  >7</option>
                                                            <option value="8"  >8</option>
                                                            <option value="9"  >9</option>
                                                            <option value="10" >10</option>
                                                            <option value="11" >11</option>
                                                            <option value="12" >12</option>
                                                            <option value="13" >13</option>
                                                            <option value="14" >14</option>
                                                            <option value="15" >15</option>
                                                            <option value="16" >16</option>
                                                            <option value="17"  >17</option>
                                                            <option value="18"  >18</option>
                                                            <option value="19"  >19</option>
                                                            <option value="20"  >20</option>
                                                            <option value="21"  >21</option>
                                                            <option value="22"  >22</option>
                                                            <option value="23"  >23</option>
                                                            <option value="24"  >24</option>
                                                            <option value="25"  >25</option>
                                                            <option value="26"  >26</option>
                                                            <option value="27"  >27</option>
                                                            <option value="28"  >28</option>
                                                            <option value="29"  >29</option>
                                                            <option value="30"  >30</option>
                                                            <option value="31"  >31</option>        
											</select>
											<em>日</em></div>
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label" name="phone">电话</label>
									<div class="am-form-content">
										<input id="phone" name="phone" placeholder="telephonenumber" type="tel">
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email"  class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" name="email" placeholder="Email" type="email">

									</div>
								</div>
                                                <div class="am-form-group">
                                                      <label for="user-email"  class="am-form-label">地址</label>
                                                      <div class="am-form-content">
                                                            <input id="did" name="shipadd" placeholder="详细地址" type="text">

                                                      </div>
                                                </div>

								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">
											<span class="am-icon-angle-right"></span>
										</a>
									</div>
								</div>
								<div class="info-btn">
								</div>
                                           
							</form>
                                          <form action="" >

                                          </form>

                                              <div style="margin-left:300px">
                                          <a href="javascript:faa()"><button type="submit" onclick="dosubmit(id)" value="">提交</button></a>
                                          </div>
						</div>

					</div>


				</div>
                        <script>
                       
                        
                       function dosubmit(id){
                         var id = document.getElementById('id');
                        var nid = document.getElementById('nid');
                        var email = document.getElementById('user_email');
                        var did = document.getElementById('did');
                        var form = document.getElementById('myform');

                        if(id.value|| nid.value || email.value.length || did.value.length){
                        form.submit();

                        }else{
                              alert('信息不能为空');
                              
                           }
                       }
                       function faa()
                       { 
                        var id = document.getElementById('id');
                        var nid = document.getElementById('nid');
                        var email = document.getElementById('user_email');
                        var did = document.getElementById('did');                       
                        var form = document.getElementById('myform');
                        if(!id.value|| !nid.value || !email.value.length || !did.value.length){
                        alert('信息不能为空');

                        }
                       }
                        </script>
                       
				<!--底部-->
				@endsection