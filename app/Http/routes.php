<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requeste|
d.
*/
//前台主页
Route::get('/', function () {
    //查询类型数据库
    $list = DB::table('type')->get();
    $shops = DB::table('goods')->where('status','=','1')->paginate(3);
     $shop = DB::table('goods')->where('status','=','1')->paginate(50);
    $config = DB::table('config')->first();
     $carousel = DB::table('carousel')->get();
    //$fenci = DB::table('fenci')->get();
    $fenci = DB::table('fenci')->get();
    $news = DB::table('news')->paginate(6);

    //dd($fenci);
    //带参显示前台主页
    return view('home.index', ['list'=>$list, 'shops'=>$shops, 'config'=>$config, 'carousel'=>$carousel, 'fenci'=>$fenci,'news'=>$news,'shop'=>$shop]);

    //带参显示前台主页
    
});

//退出登录
Route::get('/over','home\LoginController@over');
Route::get('/ajax', 'home\AjaxController@doGet');
Route::get('/ajaxdemo/get', 'AjaxController@doGets');



//前台路由群组
Route::group(['prefix' => 'home','middleware' => 'home'], function () {
//新闻
Route::get('/news','home\person\shopsController@news');
Route::get('/news/{id}','home\person\shopsController@newss');
//个人中心
Route::get('/person', 'home\person\personController@index');
//个人信息
Route::get('/information', 'home\person\personController@information');
//修改个人信息
Route::post('/information','home\person\personController@update');
//安全设置
Route::get('/safety', 'home\person\safetyController@index');
//修改密码
Route::get('/password', 'home\person\passwordController@index');
//修改密码操作
Route::post('/password', 'home\person\passwordController@pass');
//设置问题
Route::get('/question', 'home\person\questionController@index');
//设置问题
Route::post('/question','home\person\questionController@answer');
//地址管理
Route::get('/address', 'home\person\personController@address');
//删除地址
Route::get('/del','home\person\delController@del');
//头像上传
Route::post('/img','home\person\delController@images');
//Route::match(['get','post'],'/img','delController@images');
//地址管理
Route::post('/addre','home\person\personController@doAddress');
//选择地址
Route::get('/xuan/{id}','home\person\delController@xuan');
//商店注册
Route::get('/idcard', 'home\person\personController@idcard');
//注册上传处理
Route::post('/idcard', 'home\person\personController@doIdcard');
//商店提交
Route::get('/idcards', 'home\person\personController@showIdcard');
//商店管理
Route::resource('/shops', 'home\person\shopsController');
//未审核的商品
Route::get('/shopsNo/{id}', 'home\person\shopsController@shopsNo');
//商品内容查看
Route::get('/shops/show/{id}', 'home\person\shopsController@showShops');
Route::resource('/details', 'home\person\detailsController');
//以卖出商品查看
Route::get('/sale', 'home\person\shopsController@Sale');
Route::get('/goushops', 'home\person\shopsController@goushops');
//需要发货的商品
Route::get('/fahuo', 'home\person\shopsController@fahuo');
//确认发货
Route::get('/fahuo/{id}', 'home\person\shopsController@queren');
//
//商家大联盟
Route::get('/lianmeng', 'home\person\shopsController@lianMeng');
//注册用户商店查看
Route::get('/showUsers/{id}', 'home\person\shopsController@showUsers');
//商品点赞
Route::get('/goodshops/{id}', 'home\person\shopsController@goodShop');
//搜索路由
Route::post('/fenci', 'home\fenci\fenciController@showIndex');
Route::post('/fenci/{id}', 'home\fenci\fenciController@search');
//积分路由
Route::resource('/points', 'home\assets\pointsController');

Route::get('/wallet', 'home\assets\walletController@index');
//账单详情查询
Route::get('/sele', 'home\assets\walletController@select');
//充值
Route::post('/money', 'home\assets\walletController@doMoney');

Route::get('/walletList', 'home\assets\walletController@walletList');
//购物车
Route::resource('/shopcat', 'home\shopcat\shopcatController');
//收藏夹
Route::get('/shoucang', 'home\shopcat\shopcatController@shoucang');
//订单页面;
Route::resource('/indent', 'home\indent\indentController');
Route::get('/shou', 'home\indent\indentController@shou');
Route::get('/queren/{id}','home\indent\indentController@queren');
Route::get('/wancheng', 'home\indent\indentController@wancheng');
//立即购买
Route::get('/goumai/{id}','home\indent\indentController@goumai');

//留言回复显示
Route::get('/huifu', 'home\person\shopsController@huifu');
//留言回复
Route::post('/huif', 'home\person\shopsController@huif');
//留言
Route::post('/liuyan', 'home\person\shopsController@liuyan');
//商品反馈
Route::post('/suggest', 'home\consultation\consultationController@suggest');
//商品咨询
Route::get('/consultation', 'home\consultation\consultationController@index');

});








//Route::('/login', 'home\LoginController@login')
//登录、注册
Route::post('/login', 'home\LoginController@login');
Route::get('/login', 'home\LoginController@index');
// 验证码
Route::get('home/code', 'home\LoginController@code');
Route::get('home/code/{tmp}', 'home\LoginController@code');
//显示注册页面
Route::get('/register', 'home\RegisterController@index');
//注册方法
Route::post('/register', 'home\RegisterController@doRegister');

//================================================================================================================



Route::group(['prefix' => 'admin', 'middleware' => 'login'], function(){
    //显示后台页面
    Route::get('/demo', 'admin\AdminController@index');

    
    //清除session
    Route::get('/over', 'admin\LoginController@over');
    Route::get('demo', 'admin\adminController@index');
    Route::resource('/user', 'admin\user\userController');
    //用户商店注册提交信息
    Route::get('/users', 'admin\user\userController@Users');
    Route::get('/showUsers/{id}', 'admin\user\userController@showUsers');
    Route::get('/usersOK/{id}', 'admin\user\userController@OKUsers');
    Route::get('/usersNO/{id}', 'admin\user\userController@NOUsers');

    //mzm
    Route::resource('/demo/type', 'admin\type\TypeController');
    Route::get('/demo/typeSon/{id}', 'admin\type\TypeController@createSon');
    Route::post('/demo/typeSon', 'admin\type\TypeController@storeSon');

    //删除商品
    Route::get('/shopsDele/{id}', 'admin\user\userController@shopsDele');
    //头条新闻
    Route::resource('/news', 'admin\news\newsController');

    //创建资源路由 商品管理
    Route::resource('/goods', 'admin\goods\GoodsController');
    //商品加精路由
    Route::post('/goodsHot/{id}', 'admin\goods\GoodsController@doHot');
    //商品未审核路由
    Route::get('/goodsAuditing', 'admin\goods\GoodsController@indexAuditing');
    //审核商品路由
    Route::post('/goodsAuditing/{id}', 'admin\goods\GoodsController@doAuditing');
    //拒绝审核路由
    Route::post('/destroyAuditing/{id}', 'admin\goods\GoodsController@destroyAuditing');
    //商品详情路由
    Route::get('/indexShop/{id}', 'admin\goods\GoodsController@show');
    Route::get('/ajaxAdmin', 'AjaxController@doAdmin');

    Route::get('/ajaxGoods', 'AjaxController@doGoods');

    //用户账单明细
    Route::get('/zd', 'admin\zd\zdController@index');
    //详情查询
    Route::get('/see', 'admin\zd\zdController@select');
    //删除账单
    Route::get('/delzd/{id}', 'admin\zd\zdController@dodelzd');
    //删除反馈问题
    Route::get('/suggest/{id}','admin\adminController@del');
    //反馈问题查询
    Route::get('/sug','admin\adminController@select');
    //站点配置路由
    Route::resource('/config', 'admin\config\configController');
    //友情链接路由
    Route::resource('/link', 'admin\config\linkController');

    Route::resource('/carousel', 'admin\config\carouselController');
    Route::get('/ajaxAdmin', 'AjaxController@doAdmin');

    Route::get('/ajaxGoods', 'AjaxController@doGoods');
    //显示分词列表路由
    Route::get('/goodsFenci', 'admin\goods\GoodsController@fenciList');
    //执行分词路由
    Route::post('/goodsFenci', 'admin\goods\GoodsController@fenci');
});


    //显示后台登录页面
    Route::get('admin/login', 'admin\LoginController@index');
    //后台登录
    Route::post('admin/login', 'admin\LoginController@doLogin');

//验证码
// Route::get('admin/capth/{tmp}', 'admin\LoginController@capth');
Route::get('admin/code', 'admin\LoginController@code');
Route::get('admin/code/{tmp}', 'admin\LoginController@code');