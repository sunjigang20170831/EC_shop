<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;

use App\Models\Admin;
require_once app_path()."/Org/code/Code.class.php";
use App\Http\Org\code\Code;
class LoginController extends Controller
{
    /**     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    //生成验证码
    public function code()
    {
        $code = new Code();
        return $code->make();


    }


    //执行后台登录
    public function doLogin(Request $request)
    {

        //接受表单数据
        $input=$request->except('_token');

        //做表单验证
        $rule=[
            'name' => 'required|between:5,20',
            'pass' => 'required|between:5,20',
            'code' =>'required|between:4,4'
        ];

        $msg=[
            'name.required' => '用户名必须输入',
            'name.between' => '用户名必须在5-20位之间',
            'pass.required' => '密码必须输入',
            'pass.between' => '密码必须在5-20位之间',
            'code.required' => '验证码必须输入',
            'code.between' => '验证码必须是4位'
        ];
//             

        $validator = Validator::make($input,$rule,$msg);
        //验证失败
        if ($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        //做逻辑判断 验证用户名 密码 验证码是否正确

        $user = user::where('name',$input['name'])->first();
        if(!$user)
        {
            return back()->with('errors', '无此用户，请注册');
        }
        // $pass = user::where('pass',$input['pass']);

        if($input['pass']!=$user->pass)
        {
            return back()->with('errors', '密码错误，请重新输入');
        }


        if(session('code')!=$input['code'])
        {
            return back()->with('errors', '验证码错误');
        }

        if($user-> status!=2)
        {
            return back()->with('errors', '无权后台登录');
        }


        //验证通过后，将用户信息写入session
        session(['user'=>$user]);
        return redirect('admin/demo');
        // //跳转到后台主页
        // return redirect('admin/index');
//        // 获取session中的验证码
//        $code = session('code');
//        //dd($code);
//        //判断session中的验证码和用户输入的验证码是否一致
//        if($code != $request->input('code')){
//            //不一致则跳转回上一页
//            return back()->with('msg', '登录失败：验证码错误');
//        }
//        //实例化一个模型
//        $user = new Admin();
//
//        //调用模型中的index验证用户登录
//        $ob = $user->index($request);
//        if($ob){
//            //如果用户登录成功，保存用户登录信息
//            session(['adminuser'=>$ob]);
//            //跳转到后台首页
//            return redirect('admin/');
//        }else{
//            //登录失败则跳转回上一页
//            return back()->with('msg', '登录失败：用户名或密码错误');



    }

}
