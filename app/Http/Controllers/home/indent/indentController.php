<?php

namespace App\Http\Controllers\home\indent;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class indentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //订单表
    public function index()
    {

 
        $uid = session('adminuser')->id ;
      $list = DB::table('indent')->where(['uid'=>$uid, 'status'=>0])->paginate(3);

    //查询地址为1的默认地址
  
    $dizhi = DB::table('site')->where(['uid'=>$uid, 'status'=>1])->first();
   
   if($dizhi){
     return view('home.indent.indent', ['list'=>$list, 'dizhi'=>$dizhi]);
 }else{
        return redirect('/home/address')->with('msg','您未设定地址');
 }
        
    
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //待发货
    public function create()
    {
         $uid = session('adminuser')->id ;
       $list = DB::table('indent')->where(['uid'=>$uid, 'status'=>1])->paginate(3);
    
       //查询地址为1的默认地址
    $dizhi = DB::table('site')->where(['uid'=>$uid, 'status'=>1])->first();
    // if($dizhi > 0){
         return view('home.indent.daifa',['list'=>$list,'dizhi'=>$dizhi]);
    // // }else{
    //     return redirect('/home/indent')->with('msg','你没有支付成功的订单');
    // // }    
        
    //   }else{
    //   return redirect('/home/indent')->with('msg','你没有支付成功的订单');
    //   }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //购买的操作
    public function goumai($id)
    {
        $ob = DB::table('goods')->where('id',$id)->first();
        $money = $ob->price;

      $order = rand('10000','99999').time();
       $arr = ['uid'=>session('adminuser')->id,'sid'=>$id, 'time'=>time(), 'order'=>$order, 'money'=>$money];
        $ob = DB::table('indent')->insert($arr);
         return redirect('/home/address');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //订单详情
    public function show($id)

    {
       $val = explode(',',$id);

        foreach($val as $v){

           $ob[] = DB::table('goods')->where('id',$v)->first();
        }
     
       return view('home.indent.xiangqing',['ob'=>$ob]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除订单
    public function edit($id)
    {
      $ob = DB::table('indent')->where('id',$id)->delete();
      if($ob){
        return redirect('/home/indent')->with('msg','删除成功');
    }else{
        return back()->with('msg','删除失败');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //订单支付
    public function update(Request $request, $id)
    {
        $uid = session('adminuser')->id ;
        //查询用户表拿出money
        $usermes = DB::table('usermes')->where('uid',$uid)->first();
       $umoney = $usermes->money;
       //查出订单表总价钱
         $list = DB::table('indent')->where('id',$id)->first();
        $money = $list->money;
        //余额
       $yue = $umoney - $money;
        
       if($yue < 0){
        return back()->with('msg','余额不足支付失败');
       }
    //插入账单表
        DB::table('zd')->insert(['uid'=>$uid,'ctime'=>time(),'money'=>'-'.$money,'ye'=>$yue]);
        DB::table('usermes')->where('uid',$uid)->update(['money'=>$yue]);
        DB::table('point')->insert(['uid'=>$uid,'point'=>20,'time'=>time(),'event'=>'购买商品','jifen'=>100]);
        //修改订单权限
        
     $ob = DB::table('indent')->where('id',$id)->update(['status'=>1]);
     if($ob){
        $gid = $list->sid;
     $gid = explode(',',$gid);
     foreach ($gid as $value) {
        DB::table('goods')->where('id',$value)->update(['mid'=>$uid,'mtime'=>time(),'status'=>2]);
      }
      
        return back()->with('msg','支付成功');
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    //确认收货卖家加钱
    public function queren($id)
    {
        $ob = DB::table('goods')->where('id',$id)->update(['status'=>4]);
        $good = DB::table('goods')->where('id',$id)->first();
       $money =  $good->price;
       $uid = $good->uid;
      $user=  DB::table('usermes')->where('uid',$uid)->first();
      $umoney = $user->money;
      $jg = $umoney+$money;
      DB::table('usermes')->where('uid',$uid)->update(['money'=>$jg]);

        DB::table('zd')->insert(['uid'=>$uid,'ctime'=>time(),'money'=>$money,'event'=>'卖出商品','ye'=>$jg]);
        return redirect('/home/wancheng');

    }
    //完成订单
    public function wancheng()
    {
         $uid = session('adminuser')->id ;
       $list = DB::table('goods')->where(['uid'=>$uid,'status'=>4])->get();
       if($list > 0){
        return view('home.indent.wancheng' ,['list'=>$list]);
       }else{
        return view('home.indent.wancheng');
       }
    }
    
}
