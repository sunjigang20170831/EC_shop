<?php

namespace App\Http\Controllers\home\person;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

class passwordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.person.password');
    }

    public function pass(Request $request)
    {
       $arr = $request->only('pass');
       //dd($arr);
       $password = $request->password;
       $pass = $request->pass;
       $repass = $request->repass;
        // dd($pass);
       $id = session('adminuser');
       //dd($id);
       if($password == ($id->pass)){
            if($pass == $repass){
              DB::table('user')->where('id',$id->id)->update($arr);
              session()->flush();
            return redirect('/');//->with('msg','密码修改成功,请重新登录');
            }else{
                return redirect('/home/password')->with('msg','两次密码输入不一致');
            }
            }else{
                return redirect('/home/password')->with('msg','原密码输入错误');
            }
     }
    
       
}


