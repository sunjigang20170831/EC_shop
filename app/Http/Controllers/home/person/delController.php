<?php

namespace App\Http\Controllers\home\person;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class delController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function del()
    {
        $id = session('adminuser');
       //$arr = DB::table('site')->();
       //dd($arr);
       $ad = DB::table('site')->where('uid', $id->id)->value('id');
       // dd($ad);
       DB::table('site')->where('id',$ad)->delete();

        //dd($res);
        
        return redirect('home/address');
    }

    public function  images(Request $request)

    {
           //dd($request);
           //去除token
           $arr = $request->except('_token');
            // 判断是否有图片上传
           if($request->hasFile('photos')){
            // 判断图片是否符合
           if ($request->file('photos')->isValid()) {
             //获取图片资源
             $file =  $request->file('photos');
           //获取后缀名
            $name = $file->getClientOriginalName();
            //截取后缀名
            $name = explode('.',$name);
             //数据库存信息
             $id = session('adminuser')->id;
             //拼接路径
            $photoName = time().rand(1000,999).'.'.$name[1];
            //上传移动图片
            $request->file('photos')->move('./home/uplodas', $photoName);
            $arr['photos'] = $photoName;
            //$arr['time'] = time();
            //$arr['uid'] = $id;
            //加表
            $idd = DB::table('usermes')->update($arr);
     
            if($idd > 0){
             // return 11111;
              //die;
            return redirect('home/information')->with('msg', '上传成功！！');
            }
              }
            }  
           

    }

  //选择地址
    public function xuan($id)
    {

       // return 111;
        //echo json_encode($list);
      //die;
        $arr = ['status'=>1];
        $uid = session('adminuser')->id;
        $ab = ['status'=>0];

        DB::table('site')->where('uid',$uid)->update($ab);
        //dd($a);
        DB::table('site')->where('id',$id)->update($arr);

       
       return redirect('home/address');
    }



       


}
