<?php

namespace App\Http\Controllers\home\person;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class personController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //个人中心主页
    public function index()

    {     $id = session('adminuser')->id ;
        $point = DB::table('point')
                ->where('uid', $id)
                ->orderBy('time', 'desc')
                ->first();
             
        $usermes = DB::table('usermes')->where('uid',$id)->first();
   
        $goods = DB::table('goods')->where(['status'=>3,'mid'=>session('adminuser')->id])->paginate(3);
        $shop = DB::table('goods')->where('hot','1')->paginate(4);
        return view('home.person.index',['point'=>$point ,'usermes'=>$usermes,'goods'=>$goods, 'shop'=>$shop]);
    }
    public function information()
    {   

        $id = session('adminuser');
        $res = DB::table('usermes')->where('uid',$id->id)->get();
    	return view('home.person.information',['res'=>$res]);
    }
    //信息修改
     public function update(Request $request)
    {
        $id = session('adminuser')->id;
        $arr = $request->except('_token');
        $arr['uid'] = session('adminuser')->id;
        
        //dd($id);
        $list = DB::table('usermes')->where('uid',$id)->first();
        if($list){
        $res = DB::table('usermes')->where('uid',$id)->update($arr);
           //加积分操作
        $users = DB::table('point')
                ->where('uid', $id)
                ->orderBy('time', 'desc')
                ->first();
        $point['jifen'] = $users->jifen;
        $point['jifen'] += 10;
        $point['time'] = time();
        $point['uid'] = $id;
        $point['event'] = '完善信息';
        $point['point'] = '+10';

       $p = DB::table('point')->insert($point);
        return redirect('/home/information')->with('msg','信息修改成功');
        }else{
           $a = DB::table('usermes')->insert($arr);
            return redirect('/home/information')->with('msg','信息修改成功');
        }

    }

    public function address()
    {
        
        //$res = DB::table('district')->get();
      
        $id = session('adminuser');
        $res = DB::table('site')->where('uid',$id->id)->get();
      
               return view('home.person.address',['res'=>$res]);
    }
    public function idcard()
    {
    //判断用户权限是否注册过
        
        return view('home.person.idcard');
    }
//用户注册审核
    public function doIdcard(Request $request)
    {
  
    $messages = array(
            'pername.required' => '用户名必须填写',
            'pername.unique'  => '用户已存在',
             'pernumber.required' => '身份证号码必须填写',
             'pername.unique'  => '身份证号码填写错误',
             'content.required' => '用途必须填写',
             
        );
        $this->validate($request, [
       'pername' => 'required|unique:user',
        'pernumber' => 'required|unique:user',
        'content' => 'required'
    ],$messages);

        $arr = $request->except('_token');

        $number = $request->input('pernumber');
       if( !preg_match("/^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/",$number)){
          return back()->with('shenfen', '身份证错误');
       }
         if($request->hasFile('perphoto')){
        if ($request->file('perphoto')->isValid()) {
             
       $file =  $request->file('perphoto');
       //获取后缀名
    $name = $file->getClientOriginalName();
    $name = explode('.',$name);
            $photoName = time().rand(1000,999).'.'.$name[1];
            $request->file('perphoto')->move('./home/uplodas', $photoName);
            $arr['perphoto'] = $photoName;
            $arr['shops'] = 1;
        
         $id = session('adminuser')->id;

     $idd = DB::table('user')->where('id',$id)->update($arr);
        if($idd > 0){
            return redirect('home/idcards')->with('msg', '添加成功');
        }
              }
         }  
        return redirect('home/idcard')->with('msg', '没有上传身份证照片');
    }

    public function showIdcard()
    {
        return view('home.person.idcards');
    }
    //审核进度查询
    public function jindu()
    {
        return view('home.person.idcards');
    }
    //地址管理
      public function doAddress(Request $request)
    {
        
        $uid = session('adminuser')->id;
       // dd($request);

        $arr = $request->only('name','phone','hotadd');
        $arr['uid']=$uid;
      //  dd($arr);
        $ob = DB::table('site')->insert($arr);

       // $res = DB::table('usermes')->where('uid',$uid);
       if($ob){
        return redirect('home/address')->with('msg', '保存成功');
    }
        //return 11111;
        //dd($request);
    }
    
}
