<?php

namespace App\Http\Controllers\home\assets;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class walletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //充值显示
    public function index()
    {
        //
        //echo 111;die;
        $id = session('adminuser')->id;
        //dd($id);
        $list = DB::table('usermes')->where('uid',$id)->first();

       
        return view('home.assets.wallet', ['list'=>$list]);
    }
   //遍历账单明细
   public function walletList()
   {
    ///echo 111;die;
    $id = session('adminuser')->id;
    // $users = DB::table('zd')->where('uid',$id)->paginate(5);
    $list = DB::table('zd')->where('uid',$id)->orderBy('ctime','desc')->paginate(5);
    $li = DB::table('usermes')->where('uid',$id)->first();
    return view('home.assets.walletlist',['list'=>$list],['li'=>$li]);
   }
   //充值操作
   public function doMoney(Request $request)
   {
   
    $arr = $request->except('_token');
    //dd($arr);
    //$arr = $request->only('money');
    $a = $arr['money'];
   // dd($a);
   // 获取id
    //$arr['money'] = ($arr['money']);  
    

    $id = session('adminuser');
    $name=session('adminuser')->name;
    $users = DB::table('usermes')->where('uid',$id->id)->get();
    //dd($aa);
    foreach($users as $user){
         $bb = $user->money;   
    }

    //存款加要充值的钱
    $z = $bb+$a;
    $cc=['money'=>$z];
    $ss=['ye'=>$z];
    $zz=['name'=>$name];
    $arr=$arr+$ss+$zz;
    $res = DB::table('usermes')->where('uid',$id->id)->update($cc);
    if($res){
         DB::table('zd')->insert($arr);
            
        return redirect('/home/wallet')->with('msg','充值成功');

    }else{
        return redirect('/home/wallet')->with('msg','没有输入充值金额');
    }

    
   }
//详情查询
   public function select(Request $request)
   {
      $arr = $request->input('event');
     // dd($arr);
     $id = session('adminuser')->id;
     $list =  DB::table('zd')->where(['uid'=>$id,'event'=>$arr])->orderBy('ctime','desc')->paginate(5);
     $li = DB::table('usermes')->where('uid',$id)->first();
     return view('home.assets.walletlist',['list'=>$list],['li'=>$li]);
   }

}
