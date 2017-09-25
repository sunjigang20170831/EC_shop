<?php

namespace App\Http\Controllers\home\person;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class shopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $list = DB::table('type')->where('pid','>','0')->get();

       return view('home.person.shops',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 111;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //商品发布操作
    public function store(Request $request)
    {
       //验证字段，是否有值
       $messages = array(
            'shopname.required' => '商品名称必须填写',
            'price.unique'  => '商品价格未填写',
             'reprice.required' => '商品原价格未填写',
             'color.required'  => '商品颜色未填写',
             'content.required' => '商品描述未填写',
              'pid.required' => '未分类',
             
        );
        $this->validate($request, [
       'shopname' => 'required',
        'price' => 'required|integer',
        'reprice' => 'required|integer',
        'color' => 'required',
        'content' => 'required',
        'pid' => 'required'
    ],$messages);
        //去除token
        $arr = $request->except('_token');
// 判断是否有图片上传
         if($request->hasFile('image')){
            // 判断图片是否符合
        if ($request->file('image')->isValid()) {
             //获取图片资源
       $file =  $request->file('image');
       //获取后缀名
    $name = $file->getClientOriginalName();
    //截取后缀名
    $name = explode('.',$name);
    //数据库存信息
             $id = session('adminuser')->id;
             //拼接路径
            $photoName = time().rand(1000,999).'.'.$name[1];
            //上传移动图片
            $request->file('image')->move('./home/uplodas', $photoName);
            $arr['image'] = $photoName;
            $arr['time'] = time();
            $arr['uid'] = $id;
        //加表
     $idd = DB::table('goods')->insertGetId($arr);
     
        if($idd > 0){
            return redirect('home/shops')->with('msg', '添加成功,请耐心等待审核，审核时间为一个工作日！！');
        }
              }
         }  
        return redirect('home/shops')->with('msg', '没有上传商品图片');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  //商品管理查表，已审核过
    public function show($id)
    {
        $list = DB::table('goods')->where(['uid'=>$id,'status'=>1])->paginate(3);
       return view('home.person.manage',['list'=>$list]);
    }
//未审核的商品
    public function shopsNo($id)
    {
        $list = DB::table('goods')->where(['uid'=>$id,'status'=>0])->paginate(3);
       return view('home.person.manage',['list'=>$list]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改商品页面显示
    public function edit($id)
    {
         $list = DB::table('type')->where('pid','>','0')->get();
         $arr = DB::table('goods')->where('id',$id)->first();
        return view('home.person.showShops', ['list'=>$list, 'arr'=>$arr]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //修改商品信息
    public function update(Request $request, $id)
    {
        
          $arr = $request->except('_token','_method');


               if($request->hasFile('image')){
        if ($request->file('image')->isValid()) {
         $file =  $request->file('image');
       //获取后缀名
       
     $name = $file->getClientOriginalName();
     $name = explode('.',$name);

             // $uid = session('adminuser')->id;
                
            $photoName = time().rand(1000,999).'.'.$name[1];
            $request->file('image')->move('./home/uplodas', $photoName);
            $arr['image'] = $photoName;
            $arr['time'] = time();
        }}
        
     $idd = DB::table('goods')->where('id',$id)->update($arr);
     
        if($idd > 0){
            return back()->with('msg', '修改成功！！');
        }else{
                return back()->with('msg', '修改失败!!!');
        }
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除图片
    public function destroy($id)
    {
        $id = DB::table('goods')->where('id',$id)->delete();
        if($id){
             return back()->with('msg', '删除成功！');
        }else{
             return back()->with('msg', '删除失败！');
        }
    }
//查看商品内容详情
    public function showShops($id)
    {
      $ob = DB::table('goods')->where('id',$id);
         $list = $ob->first();
        // var_dump($list);
        return view('home.person.manages',['list'=>$list]);
    }
    //需要发货的商品
    public function fahuo()
    { 
        $uid = session('adminuser')->id ;
     $ob = DB::table('goods')->where(['uid'=>$uid,'status'=>2])->get();
//查询去除用户表地址信息
   foreach ($ob as $key =>$value) {
    $ob[$key]->xinxi =  DB::table('usermes')->where('uid',$value->mid)->first();

   }
 
   
        return view('home.person.fahuo',['ob'=>$ob]);
    }
    //确认发货
    public function queren($id)
    {
         $ob = DB::table('goods')->where('id',$id)->update(['status'=>3]);
        $good = DB::table('goods')->where('id',$id)->first();
       $money =  $good->price;
       $uid = $good->uid;
      $user=  DB::table('usermes')->where('uid',$uid)->first();
      $umoney = $user->money;
      $jg = $umoney+$money;
      DB::table('usermes')->where('uid',$uid)->update(['money'=>$jg]);

        DB::table('zd')->insert(['uid'=>$uid,'ctime'=>time(),'money'=>$money,'event'=>'卖出商品','ye'=>$jg]);
        
      
        if($ob){
            return back()->with('msg','发货成功');
        }
    }
//已卖出的商品
    public function Sale()
    {
            $uid = session('adminuser')->id ;
            //用户卖出的产品uid status 4为以卖出
        $list = DB::table('goods')->where(['status'=>'3','uid'=>$uid])->get();

        return view('home.person.sale', ['list'=>$list]);
    }
// 商家大联盟
  public function lianMeng()
  {
    $list = DB::table('user')->where('status','1')->paginate(6);
    return view('home.person.lianmeng',['list'=>$list]);
  }
//查看注册商店的用户详情
  public function showUsers($id)
  {
    //uid查找一条信息
    $list = DB::table('goods')->where(['uid'=>$id, 'status'=>1])->first();
     $arr = DB::table('goods')->where(['uid'=>$id, 'status'=>1])->get();
     $hot = DB::table('goods')->where(['hot'=>1,'status'=>1])->get();
     //$res = DB::table('goods')->where(['uid'=>$id, 'status'=>1])->value('id');
      //$li = DB::table('liuyan')->where('sid', $res)->get();
      $li = DB::table('liuyan')->get();
    $hi = DB::table('huifu')->get();
    
    if($list){
        return view('home.usershop.shops', ['list'=>$list,'arr'=>$arr, 'hot'=>$hot, 'li'=>$li, 'hi'=>$hi]);
    }else{
        return back()->with('msg', '商品已下架，暂无消息！');
    }
   
  }

  //商品点赞
  public function goodShop($id)
  {
    $list = DB::table('goods')->where('id',$id)->first();
    $good = $list->good;
    
          $good += 1;
     $idd = DB::table('goods')->where('id',$id)->update(['good'=>$good]);
    if($idd){
         return back()->with('msg', '点赞成功！');
    }
  }
//留言
  public function liuyan(Request $request)
  {
    $res = $request->only('byliuyan');
    $arr = $request->except('_token');
    $sid = $request->only('sid');
   // dd($sid);
   // dd($res);
   //dd($arr);
    $id = session('adminuser')->id;
    $name = session('adminuser')->name;
    
    //dd($name);
    $ar=['uid'=>$id];
    $na=['name'=>$name];
    $arr=$ar+$arr+$na;
    //dd($arr);
    //dd($arr);
   if($res['byliuyan'] == ""){
       return redirect('/home/showUsers/{id}')->with('msg','留言内容不能为空');
        }else{
         DB::table('liuyan')->insert($arr);
        // DB::table('liuyan')->where('sid',$sid)->get();
         return redirect('/home/showUsers/{id}');
        }
    
    }
    //回复页面
    public function huifu()
    {
        $id = session('adminuser')->id;

        //dd($arr);
        // $res = DB::table('goods')->where(['uid'=>$id, 'status'=>1])->value('id');
        //查找留言表里有没有登录者的留言
        $li = DB::table('liuyan')->where('fid',$id)->get();
        //dd($li);
        //dd($fid);
        // if($fid){
        //取出留言表留言者的留言的商品ID
        //$sid = DB::table('liuyan')->where('uid',$id)->value('sid');
        // dd($res);
        // 取出留言表商品的所有留言信息
        //$li = DB::table('liuyan')->where('fid',$fid)->get();
        //dd($li);
        if($li){
            return view('home.huifu.huifu',['li'=>$li]); 
        }else{
            return view('home.huifu.hui'); 
        }
         
        //}else{
            //return view('home.huifu.hui');
       // }
       
    }
    //回复
   public function huif(Request $request)
   {    
        //回复内容
        //$res = $request->only('reply');
        $arr = $request->except('_token');
       // dd($arr);
        //商品ID
        //dd($arr);
      $lid = $request->only('uid');
      //dd($lid);

    // dd($sid);
    // dd($res);
    //取出回复者ID
    $id = session('adminuser')->id;
    //dd($id);
    //取出回复人昵称
    $name = session('adminuser')->name;
    //dd($lid);
    //dd($name);
    //$ab=['lid'=>$lid];
   // dd($ab);
    $a=$lid['uid'];
    $ab=['lid'=>$a];
    $ar=['uid'=>$id];
    $na=['name'=>$name];
    $arr=$ar+$arr+$na+$ab;
    //dd($arr);
    //dd($arr);
   if($arr['reply'] == ""){
       return redirect('/home/huifu')->with('msg','回复内容不能为空');
        }else{
         DB::table('huifu')->insert($arr);
       
        //dd(111111111111);
         return redirect('/home/huifu');
        }
   }
//购买过的物品
   public function goushops()
   {
   $list = DB::table('goods')->where(['status'=>3,'mid'=>session('adminuser')->id])->get();

    return view('home.person.goushops',['list'=>$list]);
   }
   //新闻列表
   public function news()
   {
     $news = DB::table('news')->paginate(6);
    return view('home.person.news',['news'=>$news]);
   }
   //新闻内容
    public function newss($id)
    {
         $ob = DB::table('news')->where('id',$id);
         $list = $ob->first();
        
        return view('home.person.newss',['list'=>$list]);
    }
}
