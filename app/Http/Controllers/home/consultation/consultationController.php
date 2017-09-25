<?php

namespace App\Http\Controllers\home\consultation;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class consultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('home.consultation.consultation');
    }
    //反馈信息
    public function suggest(Request $request)
    {
        $arr = $request->only('content','problem','time');
        //dd($arr);
        $content = $request->only('content');
        $uid = session('adminuser')->id;
        $value = $request->only('problem');
        //dd($uid);
        //dd($value);
        $a=['uid'=>$uid];
        $b = DB::table('user')->where('id',$uid)->value('name');
        $c=['name'=>$b];
        $arr=$arr+$a+$c;
        if(in_array('a',$value,true)||in_array('',$content,true)){
             return redirect('/home/consultation')->with('msg','您没有选择问题或填写反馈信息'); 
            }else{
             DB::table('suggest')->insert($arr);
           return redirect('/home/consultation')->with('msg','您的反馈信息已提交我们会提供更好的服务! ! !');
            }    
    }


}
