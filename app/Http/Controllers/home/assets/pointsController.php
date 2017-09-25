<?php

namespace App\Http\Controllers\home\assets;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class pointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //签到页面显示
    public function index()
    {
        //
        $uid = session('adminuser')->id;
         $users = DB::table('point')
                ->where('uid', $uid)
                ->orderBy('time', 'desc')
                ->first();
               
        $ob = DB::table('point')->where('uid',$uid)->orderBy('time', 'desc');
        $list = $ob->paginate(5);

        return view('home.assets.points',['list'=>$list,'users'=>$users]);
    }

    //签到操作
    public function store(Request $request)
    {

         $id = session('adminuser')->id;
        $arr = $request->except('_token');
        $arr['uid'] = $id;
         $lasttime = $request->input('time');
        //先查表看取出上一次的签到时间
        
        $users = DB::table('point')
                ->where('uid', $id)
                ->orderBy('time', 'desc')
                ->first();
       $arr['jifen'] = $users->jifen;
        //判断表里有没有数据，如果有则判断上次时间和今天签到时间是否相隔24小时
       if($users){
            $time = $users->time;
            if(($lasttime-$time) < 86400){
                return redirect('home/points')->with('msg', '今天已经签到过了,请24小时后再签到！');
            }else{
                $arr['jifen'] += 5;
            $id = DB::table('point')->insert($arr);
            return redirect('home/points')->with('msg', '签到成功');
            }
            
       }else{
          return back()->with('msg', '今天已经签到过了,请24小时后再签到！');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
