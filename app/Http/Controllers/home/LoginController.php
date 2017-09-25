<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
require_once  app_path()."/Org/code/Code.class.php";
use App\Http\Org\code\Code;

use Illuminate\Support\Facades\Validator;

use DB;


class LoginController extends Controller
{    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.login');

    }
    //前台登录
    //   生成验证码
    public function code()
    {
        $code = new Code();
        return $code->make();
    }

    //前台登录
    public function login(Request $request)
    {
        //  接收表单提交数据
        $input = $request->except('_token');

        //  做表单验证
        $rule=[
            'name' => 'required|between:5,20',
            'pass' => 'required|between:5,18',
            'code' => 'required|between:4,4',
        ];

        $msg=[
            'name.required' => '邮箱必须输入',
            'name.between' => '邮箱必须在5-20位之间',
            'pass.required' => '密码必须输入',
            'pass.between' => '密码必须在5-18位之间',
            'code.required'=>'验证码必须输入',
            'code.between'=>'验证码必须是4位',
        ];

        $validator = Validator::make($input,$rule,$msg);
        //验证失败
        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }

        //  做逻辑判断 用户名是否存在 密码是否正确
        $user = user::where('name',$input['name'])->first();
        // dd($user);
        if(!$user) {
            return back()->with('errors', '无此用户，请注册');
        }

        if($input['pass']!=$user->pass) {
            return back()->with('errors', '密码错误，请重新输入');
        }

        //        判断验证码
        if(session('code') != $input['code']){
            return back()->with('errors','验证码错误');
        }

        //验证通过后，将用户信息写入session
        session(['adminuser'=>$user]);
        // $aaa = session()->all();
        // $aaa = session('user');
        // dd($aaa);

        //跳转到前台主页
        return redirect('/');

    }

    public function over()
    {
        session()->flush();
        return redirect('/');
    }
    	

    
    

    


   }
 