<?php

namespace App\Http\Controllers\home\shopcat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class shopcatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //购物车页面
    public function index()
    {
         $uid = session('adminuser')->id ;
    $shop = DB::table('shopcat')->where('uid',$uid)->get();

    if($shop){
        //循环查询，循环存储
   for($i=0;$i<count($shop);$i++){

        $goods[$i] = DB::table('goods')->where('id', $shop[$i]->id)->first();


   }
       
   return view('home.shopcat.index',['goods'=>$goods]);
    }else{
       
        return redirect('/')->with('msg','你还未有加入购物车的商品尽快添加吧');
    }
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //购物车提交账单
    public function store(Request $request)
    {
     if ( $request->has('qian')){
       $arr = $request->input('qian');
 // 循环分割取出来的数组取出总价钱
      foreach($arr as $v)
      {
        $o = explode(',', $v);
        $a[] = $o[1];
        $b[] = $o[0];
      }
      //获取订单总价钱
      $money = 0;
      foreach($b as $m){
        $money+= $m;
      }
      
        $ssid = '';
      //把商品id合成字符串并删除购物车数据
      foreach($a as $sid){
            $ssid .= $sid.',';
            DB::table('shopcat')->where('id',$sid)->delete();
      }
        $ssid = rtrim($ssid,',');

       
      //生成订单号
      $order = rand('10000','99999').time();
     
        $arr = ['uid'=>session('adminuser')->id,'sid'=>$ssid, 'time'=>time(), 'order'=>$order, 'money'=>$money];
   
        $ob = DB::table('indent')->insert($arr);
      
       
     
      return redirect('/home/indent');
  }else{
    return back()->with('msg','你未选中订单');
  }
     //  //去除表里商品信息钱的和
     //   foreach($goods as $money){
     //      $mm +=  $money->price;
     //    }
     // dd($mm);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //加入购物车操作
    //判断购物车是否有加入的信息，如果有则提示，如果没有则加入
    public function show($id)
    {
        $uid = session('adminuser')->id ;
        $arr['id'] = $id;
        $arr['uid'] = $uid;
        $shop = DB::table('shopcat')->where(['id'=>$id, 'uid'=>$uid])->get();
        if($shop){
             return back()->with('msg','此商品已经加入了');
        }else{
             $list = DB::table('shopcat')->insert($arr);
             if($list){
                return back()->with('msg','已加入购物车');
        }else{
             return back()->with('msg','加入失败');
        }
        }
        
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除购物车数据
    public function edit($id)
    {
       $ob = DB::table('shopcat')->where('id',$id)->delete();
      if($ob){
        return redirect('/home/shopcat')->with('msg', '删除成功');
      }else{
        return redirect('/home/shopcat')->with('msg', '删除失败');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除购物车数据
    public function destroy($id)
    {
     
    }
    //收藏
    public function shoucang()
    {
        $uid = session('adminuser')->id ;
        $ob = DB::table('shoucang')->where('uid',$uid)->get();
        if($ob){
           
        //循环查询，循环存储
            for($i=0;$i<count($ob);$i++)
            {

            $list[$i] = DB::table('goods')->where('id', $ob[$i]->id)->first();

            }
            return view('home.shopcat.shoucang',['list'=>$list]);
         
        }else{
            return back()->with('msg','还未收藏商品');
        }
        
    }
}
