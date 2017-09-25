<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/4 0004
 * Time: 下午 19:44
 */




namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('home.register');
    }


    public function doregister(Request $request)
    {


        // DD($request->except('_token','utime'));

        $input = $request->except('_token');

        $rule=[
        'name' => ['regex:/^([a-z0-9A-Z]+[-|\\.]?)+[a-z0-9A-Z]@([a-z0-9A-Z]+(-[a-z0-9A-Z]+)?\\.)+[a-zA-Z]{2,}$/'],
        'pass' => ['regex:/^[0-9A-Za-z]{5,20}$/']
        ];

        $msg = [
                'name.regex'=>'邮箱不正确，请重新输入',
                'pass.regex'=>'密码长度不对'
                ];

        //登录表单验证  只允许数字和字母 不能以数字开头
        $validator = Validator::make($input, $rule,$msg);

         //表单验证失败提示
         if ($validator->fails())
             {
             return redirect('/register')->withErrors($validator)
             ->withInput();
             }

        if ($input['name']=='')
            {
            return back()->with('errors', '请填写邮箱');
            }


        if ($input['pass']=='')
        {
       return back()->with('errors', '请填写密码');
        }
    if ($input['repass']=='')
    {
     return back()->with('errors', '请填写确认密码');

    }
    if ($input['repass']!=$input['pass'])
    {
     return back()->with('errors', '两次密码不一致');
    }
    //获取表单的值
    $name = $request->input('name');
    $pass = $request->input('pass');
    $utime = $request->input('utime');

  $info=DB::table('user') ->insert( ['name'=>$name,'pass'=>$pass,'utime'=>$utime]);
   if($info){
    return view('home/login')->with('errors', '恭喜注册成功');
   }

   }
}
